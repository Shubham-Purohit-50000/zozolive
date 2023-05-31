@extends('layouts.front')
@section('content')
    <section>
        <h2 class="text-center">Broadcast Center</h2>
        <p class="text-center">Pears Of Wisdom</p>
        <h5 class="text-center">Set different access levels for different content you have</h5>
    </section>

    <section class="broadcast__wrapper" style="width: 80%;margin:auto;">
        <div class="container broadcast">
            <div class="row">
                <div class="col-md-12">
                    <section class="d-flex justify-space-between">
                        <div style="width: 12%;" class="icon_wrapper">
                            <div class="icon_div">
                                <i class="bi bi-person-fill"></i>
                            </div>
                        </div>
                        <div style="width: 88%;" class="icon_detail_wrapper">
                            <div class="content">
                                <p style="margin-bottom: 0px;">Profile complete: 5/9 steps done</p>
                                <p style="font-size: 20px;font-weight: 500;margin-bottom: 0px;">56%</p>
                            </div>
                            <div class="progress" style="height: 10px;margin-top: 8px;">
                                <div class="progress-bar" role="progressbar" style="width: 25%;background: #a2262e;"
                                     aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;gap: 1rem">
                <div class="col-md-4 col-6">
                    <div class="d-flex justify-content-space-around">
                        <div class="icon_child">
                            <i class="bi bi-bar-chart-fill"></i>
                        </div>
                        <div>
                            <span>StripScore</span>
                            <b style="display: block;font-size: 21px;">577</b>
                        </div>
                        <div class="info_icon">
                            <span>i</span>
                        </div>
                    </div>
                    <p style="margin-bottom:0px;text-align:right;margin-top:25px;">1000+</p>
                    <div class="progress" style="height: 8px;margin-top: 8px;margin-bottom:10px">
                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col-md-4 col-6">
                    <div class="d-flex justify-content-space-around">
                        <div class="icon_child">
                            <i class="bi bi-heart-fill"></i>
                        </div>
                        <div>
                            <span>Favorited By</span>
                            <b style="display: block;font-size: 21px;">43,222</b>
                        </div>
                        <div class="info_icon">
                            <span>i</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6">
                    <div class="d-flex justify-content-space-around">
                        <div class="icon_child">
                            <i class="bi bi-bar-chart-fill"></i>
                        </div>
                        <div>
                            <span>Fan Club</span>
                            <b style="display: block;font-size: 21px;">0 <sub>tk / mo</sub></b>
                        </div>
                        <div class="info_icon">
                            <span>i</span>
                        </div>
                    </div>
                    <p style="margin-bottom:0px;text-align:left;margin-top:40px;">from <b style="font-size:17px">0</b>
                        subscribers</p>

                </div>
                <div class="col-md-4 col-6">
                    <div class="d-flex justify-content-space-around">
                        <div class="icon_child">
                            <i class="bi bi-camera-video-fill"></i>
                        </div>
                        <div>
                            <span>Pvt Show Rating</span>
                            <b style="display: block;font-size: 21px;">2.8 / 5</b>
                        </div>
                        <div class="info_icon">
                            <span>i</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6">
                    <div class="d-flex justify-content-space-around">
                        <div class="icon_child">
                            <i class="bi bi-funnel"></i>
                        </div>
                        <div>
                            <span>Income Per Hour</span>
                            <b style="display: block;font-size: 21px;">$22.05</b>
                        </div>
                        <div class="info_icon">
                            <span>i</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6">
                    <div class="d-flex justify-content-space-around">
                        <div class="icon_child">
                            <i class="bi bi-wallet-fill"></i>
                        </div>
                        <div>
                            <span>Next Payout</span>
                            <b style="display: block;font-size: 21px;">8591 tk</b>
                        </div>
                        <div class="info_icon">
                            <span>i</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container be__careful" style="margin-top:100px;">
            <div class="row align-items-center">
                <div class="col-md-4" style="padding: 18px;">
                    <img src="https://cdn.pixabay.com/photo/2021/07/09/23/56/secure-6400216__340.jpg"
                         class="img-responsive" style="height: 120px;border-radius: 7px;box-shadow: 0px 0px 4px;">
                </div>
                <div class="col-md-8">
                    <b style="font-size: 20px;font-weight: 400;">Be careful</b>
                    <div class="listbox" style="margin-top: 15px;">
                        <ul class="list">
                            <li>Avoid any offers of manipulations with tokens</li>
                            <li>Official Stripchat admin accounts have only blue nicknames</li>
                            <li>Dont't share your personal details with anyone</li>
                        </ul>
                        <button>More security advise</button>
                    </div>
                </div>
            </div>
            <div class="row second_box">
                <div class="col-md-12 text-center mt30">
                    <p>Make sure you follow the Rules for Models.</p>
                    <p>By starting to broadcast, you agree to our Terms Of Use.</p>
                </div>
            </div>
            <div class="row mt30">
                <div class="col-md-12 jumbotron">
                    <form action="{{ route('streaming.start') }}" method="post" class="jumbotron">
                        @csrf
                        <div class="col-md-12 d-flex">
                            <div>
                                <input type="checkbox" style="height:20px;width:20px;" class="" name="">
                            </div>
                            <div style="padding-left:10px;">
                                By checking the box, you agree to follow our rules, otherwise your account may be
                                temporarily or permanently banned.
                            </div>
                        </div>
                        <div class="d-flex" style="justify-content:center;">
                            <button class="green_button">Set Up & Start Broadcast</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop
@section('css')
    <style type="text/css">
        .broadcast .col-md-12 {
            background: rgba(255, 255, 255, .05);
            padding: 10px;
            border-radius: 10px;
        }

        .icon_div {
            margin: auto;
            text-align: center;
            height: 60px;
            width: 60px;
            border-radius: 50%;
            background: #3a3737;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
        }

        .content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .broadcast .col-md-4 {
            min-height: 144px;
            background: #0d0d0d;
            padding: 10px;
            border-radius: 11px;
            width: 31%;
        }

        @media screen and (max-width: 750px) {
            .broadcast .col-6 {
                width: 48% !important;
            }
            .broadcast__wrapper{
                width: 90% !important;
            }
            .icon_wrapper .icon_div{
                width: 50px;
                height: 50px;
            }
            .icon_wrapper .icon_div i{
                font-size: 1.5rem;
            }
            .icon_detail_wrapper{
                margin-left: 1rem;
            }
        }
        @media screen and (max-width: 576px){
            .broadcast__wrapper .container{
                width: 100% !important;
            }
        }
        @media screen and (max-width: 538px){
            .broadcast .col-md-4{
                width: 47% !important;
            }
        }
        @media screen and (max-width: 470px) {
            .broadcast .col-6 {
                width: 47% !important;
            }
            .broadcast__wrapper{
                width: 100% !important;
            }
            .listbox .list li{
                font-size: 0.8rem;
            }
        }
        @media screen and (max-width: 410px) {
            .broadcast .col-6 {
                width: 100% !important;
            }
            .be__careful{
                margin-top: 1.5rem !important;
            }
            .icon_wrapper .icon_div{
                width: 40px;
                height: 40px;
            }
        }

        .icon_child {
            height: 45px;
            width: 45px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #3a3737;
            border-radius: 50%;
            font-size: 18px;
        }

        .info_icon {
            height: 17px;
            width: 17px;
            border: 1px solid;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;

        }

        .justify-content-space-around {
            justify-content: space-around;
        }

        /*.align-items-center{justify-content:space-around;}*/
        .list {
            padding-inline-start: 15px;
        }

        .list li {
            font-weight: 300;
            font-size: 15px;
            margin-bottom: 6px;
        }

        .listbox button {
            padding: 7px 15px;
            border-radius: 25px;
            background: #3a3737;
            color: #fff;
        }

        .second_box p {
            margin-bottom: 2px;
            font-size: 15px;
            font-weight: 300;
        }

        .mt30 {
            margin-top: 30px;
        }

        .jumbotron {
            margin: auto;
            background: #3a3737;
            padding: 15px;
            border-radius: 7px;
            box-shadow: 0px 0px 5px #3a3737;
        }

        .green_button {
            padding: 9px 18px;
            border-radius: 25px;
            background: #8dbd25;
            border: 0px;
            color: #fff;
            margin-top: 30px;
        }
    </style>
@stop
