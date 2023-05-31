@extends('layouts.front')
@section('subheader')
    @include('layouts.sub-header')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
@endsection
@section('content')
    <section class="section">
        <div class="row align-items-top">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body" style="padding:0px;">
                        <video style="width:100%;height:500px;" controls>
                            <source src="assets/img/videofile.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <div class="card chat_card">
                    <div class="card-header chat_card--header">
                        <div class="row">
                            <ul class="nav nav-tabs chat_card--tabs d-flex" id="chat_box"
                                role="tablist">
                                <li class="nav-item flex-fill" role="presentation">
                                    <button class="nav-link w-100 chat_card--btn active" id="home-tab"
                                            data-bs-toggle="tab"
                                            data-bs-target="#bordered-justified-home" type="button" role="tab"
                                            aria-controls="home" aria-selected="true">
                                        <i class="bi bi-chat-fill"></i> &nbsp;&nbsp; Public
                                    </button>
                                </li>
                                <li class="nav-item flex-fill" role="presentation">
                                    <button class="nav-link w-100 chat_card--btn" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#bordered-justified-profile" type="button" role="tab"
                                            aria-controls="profile" aria-selected="false"><i
                                                class="bi bi-chat-heart-fill"></i>
                                        &nbsp;&nbsp; Private
                                    </button>
                                </li>
                                <li class="nav-item flex-fill" role="presentation">
                                    <button class="nav-link w-100 chat_card--btn" id="contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#bordered-justified-contact" type="button" role="tab"
                                            aria-controls="contact" aria-selected="false"><i
                                                class="bi bi-people-fill"></i>
                                        &nbsp;&nbsp; 2100
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body position-relative" style="height:500px;">
                        <div class="tab-content pt-2 mt-20" id="chat_boxContent">
                            <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel"
                                 aria-labelledby="home-tab">
                                <div>
                                    <ul class="messages__box">
                                        <li class="messages__box--message left"><span class="messages__box--user_name">xyz</span>Message
                                            from user
                                        </li>
                                        <li class="messages__box--message right"><span class="messages__box--user_name">abc</span>Message
                                            from host
                                        </li>
                                        <li class="messages__box--message left">Message from user</li>
                                        <li class="messages__box--message right">Message from host</li>
                                    </ul>
                                </div>
                                <div class="input-group mb-3 chat__box">
                                    <input type="text" class="form-control chat__box--input"
                                           placeholder="Public message" aria-label="Public message"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn input-group-text chat__box--btn" id="basic-addon2">
                                            <i class="bi bi-send"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel"
                                 aria-labelledby="profile-tab">
                                <div>
                                    <ul>
                                        <li>Message from user</li>
                                        <li>Message from host</li>
                                    </ul>
                                </div>
                                <div class="input-group mb-3 chat__box">
                                    <input type="text" class="form-control chat__box--input"
                                           placeholder="Public message" aria-label="Public message"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn input-group-text chat__box--btn" id="basic-addon2">
                                            <i class="bi bi-send"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="bordered-justified-contact" role="tabpanel"
                                 aria-labelledby="contact-tab">
                                <div>
                                    <ul class="messages__box">
                                        <li>Message from user</li>
                                        <li>Message from host</li>
                                    </ul>
                                </div>
                                <div class="input-group mb-3 chat__box">
                                    <input type="text" class="form-control chat__box--input"
                                           placeholder="Public message" aria-label="Public message"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn input-group-text chat__box--btn" id="basic-addon2">
                                            <i class="bi bi-send"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </section>
    <section class="section">
        <div class="row align-items-top">

            <div class="col-lg-2 col-6">
                <a href="#" class="card list">
                    <img src="{{ asset('img/messages-1.jpg') }}" class="card-img-top" alt="...">
                    <div class="caption">
                        <span>Abhay-sexy</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-2 col-6">
                <a href="#" class="card list">
                    <img src="{{ asset('img/messages-1.jpg') }}" class="card-img-top" alt="...">
                    <div class="caption">
                        <span>Abhay-sexy</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-2 col-6">
                <a href="#" class="card list">
                    <img src="{{ asset('img/messages-1.jpg') }}" class="card-img-top" alt="...">
                    <div class="caption">
                        <span>Abhay-sexy</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-2 col-6">
                <a href="#" class="card list">
                    <img src="{{ asset('img/messages-1.jpg') }}" class="card-img-top" alt="...">
                    <div class="caption">
                        <span>Abhay-sexy</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-2 col-6">
                <a href="#" class="card list">
                    <img src="{{ asset('img/messages-1.jpg') }}" class="card-img-top" alt="...">
                    <div class="caption">
                        <span>Abhay-sexy</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-2 col-6">
                <a href="#" class="card list">
                    <img src="{{ asset('img/messages-1.jpg') }}" class="card-img-top" alt="...">
                    <div class="caption">
                        <span>Abhay-sexy</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-2 col-6">
                <a href="#" class="card list">
                    <img src="{{ asset('img/messages-1.jpg') }}" class="card-img-top" alt="...">
                    <div class="caption">
                        <span>Abhay-sexy</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-2 col-6">
                <a href="#" class="card list">
                    <img src="{{ asset('img/messages-1.jpg') }}" class="card-img-top" alt="...">
                    <div class="caption">
                        <span>Abhay-sexy</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-2 col-6">
                <a href="#" class="card list">
                    <img src="{{ asset('img/messages-1.jpg') }}" class="card-img-top" alt="...">
                    <div class="caption">
                        <span>Abhay-sexy</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-2 col-6">
                <a href="#" class="card list">
                    <img src="{{ asset('img/messages-1.jpg') }}" class="card-img-top" alt="...">
                    <div class="caption">
                        <span>Abhay-sexy</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-2 col-6">
                <a href="#" class="card list">
                    <img src="{{ asset('img/messages-1.jpg') }}" class="card-img-top" alt="...">
                    <div class="caption">
                        <span>Abhay-sexy</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-2 col-6">
                <a href="#" class="card list">
                    <img src="{{ asset('img/messages-1.jpg') }}" class="card-img-top" alt="...">
                    <div class="caption">
                        <span>Abhay-sexy</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-2 col-6">
                <a href="#" class="card list">
                    <img src="{{ asset('img/messages-1.jpg') }}" class="card-img-top" alt="...">
                    <div class="caption">
                        <span>Abhay-sexy</span>
                    </div>
                </a>
            </div>

        </div>
        <div class="row alignitem_center">
            <div class="col-md-5 border_botton"></div>
            <div class="col-md-2 text-center">
                <button class="btn btn-default see-more-button">See More</button>
            </div>
            <div class="col-md-5 border_botton"></div>
        </div>
    </section>

    <div>
        <p style="font-size: 20px">
            <strong>yoursuneta's</strong>
            <span class="chip-text"> Categories</span>
        </p>
        <div style="display: flex ;flex-direction: row">
            <div style="margin-top: 6px ; padding: 0 8px">
                <p class="font-size-cips" style="margin-left:2px">
                    My Specifics:
                </p>
            </div>

            <div class="chip" style="margin-right: 10px">
                <div class="chip-content" style="padding: 0 8px">
                    Mobile
                </div>
                <div class="chip-close"></div>
            </div>
            <div class="chip" style="margin-right: 10px">
                <div class="chip-content">Young 22+</div>
                <div class="chip-close"></div>
            </div>
            <div class="chip" style="margin-right: 10px">
                <div class="chip-content">Chip Content</div>
                <div class="chip-close"></div>
            </div>
            <div class="chip" style="margin-right: 10px">
                <div class="chip-content">Chip Content</div>
                <div class="chip-close"></div>
            </div>
            <div class="chip" style="margin-right:10px">
                <div class="chip-content">Chip Content</div>
                <div class="chip-close"></div>
            </div>
        </div>

        <div style="display: flex; flex-direction: row">
            <div style="margin-top: 6px; padding: 0 8px">
                <p class="font-size-cips" style="margin-left: 2px">
                    I Do In My Shows:
                </p>
            </div>

            <div class="chip" style="margin-right: 10px">
                <div class="chip-content" style="padding: 0 8px">
                    Chip Content
                </div>
                <div class="chip-close"></div>
            </div>
            <div class="chip" style="margin-right: 10px">
                <div class="chip-content">Chip Content</div>
                <div class="chip-close"></div>
            </div>
            <div class="chip" style="margin-right: 10px">
                <div class="chip-content">Chip Content</div>
                <div class="chip-close"></div>
            </div>
            <div class="chip" style="margin-right: 10px">
                <div class="chip-content">Chip Content</div>
                <div class="chip-close"></div>
            </div>
            <div class="chip" style="margin-right: 10px">
                <div class="chip-content">Chip Content</div>
                <div class="chip-close"></div>
            </div>
        </div>

        <div style="display: flex;flex-direction: row">
            <div style="margin-top: 6px; padding: 0 8px">
                <p class="font-size-cips" style="margin-left: 2px">
                    I Exclusively Do in Private:
                </p>
            </div>

            <div class="chip" style="margin-right: 10px">
                <div class="chip-content" style="padding: 0 8px">
                    Chip Content
                </div>
                <div class="chip-close"></div>
            </div>
            <div class="chip" style="margin-right: 10px">
                <div class="chip-content">Chip Content</div>
                <div class="chip-close"></div>
            </div>
            <div class="chip" style="margin-right: 10px">
                <div class="chip-content">Chip Content</div>
                <div class="chip-close"></div>
            </div>
            <div class="chip" style=" margin-right: 10px">
                <div class="chip-content">Chip Content</div>
                <div class="chip-close"></div>
            </div>
            <div class="chip" style=" margin-right: 10px">
                <div class="chip-content">Chip Content</div>
                <div class="chip-close"></div>
            </div>
        </div>

        <p class="chip-text" style=" font-size: 20px">
            Related Mixed Categories
        </p>
        <div style=" display: flex; flex-direction: row">
            <div style=" margin-top: 6px; padding: 0 8px">
                <p class="font-size-cips" style=" margin-left: 2px">
                    My Specifics :
                </p>
            </div>

            <div class="chip" style=" margin-right: 10px">
                <div class="chip-content" style=" padding: 0 8px">
                    Chip Content
                </div>
                <div class="chip-close"></div>
            </div>
            <div class="chip" style=" margin-right: 10px">
                <div class="chip-content">Chip Content</div>
                <div class="chip-close"></div>
            </div>
            <div class="chip" style=" margin-right: 10px">
                <div class="chip-content">Chip Content</div>
                <div class="chip-close"></div>
            </div>
            <div class="chip" style=" margin-right: 10px">
                <div class="chip-content">Chip Content</div>
                <div class="chip-close"></div>
            </div>
            <div class="chip" style=" margin-right: 10px">
                <div class="chip-content">Chip Content</div>
                <div class="chip-close"></div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://unpkg.com/vue-emoji-picker/dist/vue-emoji-picker.js"></script>
@endsection
