<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentGatewayDetailRequest;
use App\Models\PaymentGatewayDetail;

class PaymentGatewayDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.payment-gateway-details.list',[
            'payment_gateway_details' => PaymentGatewayDetail::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.payment-gateway-details.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PaymentGatewayDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentGatewayDetailRequest $request)
    {
        PaymentGatewayDetail::create($request->validated());
        return redirectUser(route('payment-gateway-details.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentGatewayDetail  $paymentGatewayDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentGatewayDetail $paymentGatewayDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentGatewayDetail  $paymentGatewayDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentGatewayDetail $paymentGatewayDetail)
    {
        return view('admin.payment-gateway-details.edit',compact('paymentGatewayDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PaymentGatewayDetailRequest  $request
     * @param  \App\Models\PaymentGatewayDetail  $paymentGatewayDetail
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentGatewayDetailRequest $request, PaymentGatewayDetail $paymentGatewayDetail)
    {
        $paymentGatewayDetail->update($request->validated());
        return redirectUser(route('payment-gateway-details.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentGatewayDetail  $paymentGatewayDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentGatewayDetail $paymentGatewayDetail)
    {
        $paymentGatewayDetail->delete();
        return redirectBack();
    }
}
