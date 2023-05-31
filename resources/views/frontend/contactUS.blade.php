@extends('layouts.front')
@section('content')
    <section>
        <div class="container contact-form">
            <form method="post">
                <h3>Drop Us a Message</h3>
                <div>
                    <div class="form-group mt-3">
                        <input type="text" name="txtName" class="form-control inputBox" placeholder="Your Name *"
                               value=""/>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" name="txtEmail" class="form-control inputBox" placeholder="Your Email *"
                               value=""/>
                    </div>
                    <div class="form-group mt-3">
                            <textarea name="txtMsg" class="form-control inputBox" placeholder="Your Message *"
                                      style="width: 100%; height: 150px;"></textarea>
                    </div>
                    <div class="form-group mt-3 text-center">
                        <input type="button" name="btnSubmit" class="btnContact saveButton " value="Send Message"
                               style="background-color: #859e4f;"/>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('css')
    <style>
        .inputBox {
            /* border-radius: 20px; */
            width: 100%;
            background: black;
            padding: 0 15px;
            height: 42px
        }

        .saveButton {
            display: inline-block;
            /* border: 3px solid transparent; */
            border-radius: 20px;
            padding: 0px 30px;
            font-size: 14px;
            height: 40px;
            background: #5b5b5b;
            text-align: center;
            margin-top: 10px;
            color: white;
            font-weight: 600;
            border: none;

        }

    </style>
@stop
