<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function generateToken(Request $request)
    {
        $stripe = new \Stripe\StripeClient(
            'sk_test_0CaAJrFqtvoLO3pfWUayDGgK'
        );
        $stripe->tokens->create([
            'card' => [
                'number'    => '4242424242424242',
                'exp_month' => 2,
                'exp_year'  => 2023,
                'cvc'       => '314',
            ],
        ]);
    }

    public function createCharge(Request $request)
    {
        $stripe = new \Stripe\StripeClient(
            'sk_test_0CaAJrFqtvoLO3pfWUayDGgK'
        );
        $stripe->charges->create([
            'amount'      => 2000,
            'currency'    => 'usd',
            'source'      => 'tok_mastercard',
            'description' => 'My First Test Charge',
        ]);
    }
}
