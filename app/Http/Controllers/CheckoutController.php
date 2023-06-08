<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Models\Recharge;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\StripeClient;

class CheckoutController extends Controller
{
    public $stripe;

    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $this->stripe = new StripeClient(config('services.stripe.secret'));
    }

    // public function showCheckoutPage()
    // {
    //     return view('frontend.checkout', [
    //         'amount' => 100
    //     ]);
    // }

    public function createCheckoutSession(Request $request)
    {
        $request->validate([
            'coin_plan' => 'required'
        ], [
            'coin_plan.required' => 'Please select a plan'
        ]);
        $plan = Coin::where('uuid', $request->coin_plan)->first();

        $session = Session::create([
            'payment_method_types'    => ['card'],
            'line_items'              => [[
                // 'name'        => 'T-shirt',
                // 'description' => 'Comfortable cotton t-shirt',
                // 'images'      => ['https://example.com/t-shirt.png'],
                // 'amount'      => 2000,
                // 'currency'    => 'inr',
                'price_data'  => [
                    'currency'     => 'inr',
                    'unit_amount'  => $plan->amount * 100,
                    'product_data' => [
                        'name'        => 'Recharge',
                        'description' => 'New Recharge',
                        // 'images'      => ['https://example.com/t-shirt.png'],
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode'                => 'payment',
            'success_url'         => url('/checkout/success?session_id={CHECKOUT_SESSION_ID}'),
            'cancel_url'          => url('/checkout/cancel?session_id={CHECKOUT_SESSION_ID}'),
            // 'payment_intent_data' => [
            //     'google_pay' => [
            //         'transaction_id' => uniqid(), // Unique identifier for Google Pay transaction
            //     ],
            // ],
        ]);
        Recharge::create([
            'order_id'          => $session->id,
            'user_id'           => auth()->id(),
            'coin_id'           => $plan->uuid,
            'amount'            => $plan->amount,
            'coin'              => $plan->coin,
            'status'            => 'pending',
            'currency'          => 'inr',
            'payment_gateway'   => 'stripe',

        ]);
        return redirect()->away($session->url);
    }

     public function handleSuccess(Request $request)
     {
         $session = $this->stripe->checkout->sessions->retrieve($request->session_id);
         $recharge = Recharge::where('order_id', $request->session_id)->first();
         $recharge->update([
             'status'      => $session->payment_status,
             'amount_paid' => $session->amount_total / 100
         ]);
         if ($session->payment_status == 'paid') {
             $user = auth()->user();
             $user->update([
                 'token' => $recharge->coin + $user->token ?? 0
             ]);
         }
         return redirect('/');
         //  return view('success');
     }

    public function handleCancel(Request $request)
    {
        $session = $this->stripe->checkout->sessions->retrieve($request->session_id);
        $recharge = Recharge::where('order_id', $request->session_id)->first();
        $recharge->update([
            'status'     => $session->payment_status,
            'amount_due' => $session->amount_total / 100
        ]);

        return redirect('/');

        // return view('cancel');
    }
}
