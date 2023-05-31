@extends('layouts.front')
@section('content')
<section>
    <div style="margin-bottom: 1rem;">
        <h4>
            Payment Settings
        </h4>
    </div>

    <div class="backColor">
        <h6>Payment</h6>
        <div class="row mt-3">
            <div class="col-md-3 ">
                Payment Method
            </div>
            <div class="col-md-9" >
                <select class="inputBox2" style="color: #888; ">
                    <option value="option1">Please, select......</option>
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3 ">
                Payment Currency
            </div>
            <div class="col-md-9 " >
                <select class="inputBox2" style="color: #888; ">
                    <option value="option1">Please, select......</option>
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3 ">
               Minimum Payment
            </div>
            <div class="col-md-9" >
                <select class="inputBox2" style="color: #888; ">
                    <option value="option1">Please, select......</option>
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                </select>
            </div>
        </div>

    </div>
    <div class="backColor mt-3">
        <h6>Details</h6>
        <div class="row mt-3">
            <div class="col-md-3 ">
               Crypto Wallet address
            </div>
            <div class="col-md-9" >
                <select class="inputBox2" style="color: #888; ">
                    <option value="option1">Please, select......</option>
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3 ">
               Wallet owner
            </div>
            <div class="col-md-9 " >
                <select class="inputBox2" style="color: #888; ">
                    <option value="option1">Please, select......</option>
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                </select>
            </div>
        </div>

        <div class="row mt-4">
            <p style="font-size: 11px;">The rest of your details are hidden for security reasons <br/>
            To view all the details and change (or clear) any setting, use the button below. we will send and email with  a link to your verified email address  <br>
            The link will allow you to view all and changes or clear </p>
        </div>
                    <button class="emailButton">View & Change Details</button>
        <div class=" mt-4"></div>
    </div>

</section>


@endsection
@section('css')
<style>
    .backColor {
        background-color: #26272b;
        /* width: 50%; */
        /* padding: 1rem 1rem; */
        padding: 1rem 1rem;

    }
    
    .inputBox2 {
        /* align-items: right; */
        border-radius: 20px;
        width: 100%;
        background: black;
        padding: 0 10px;
        height: 38px
    }
    .emailButton {
        display: inline-block;
        /* border: 3px solid transparent; */
        border-radius: 20px;
        padding: 0px 30px;
        font-size: 14px;
        height: 40px;
        background: #5b5b5b;
        /* text-align: center; */
        margin-top: 10px;
        color: white;
        font-weight: 400;
        border: none;
        /* margin-left: 18rem; */
    }
</style>
@stop