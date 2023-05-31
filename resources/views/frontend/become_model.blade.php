@extends('layouts.front')
@section('content')
    <section class="primaryBack">
        <div class="container">
            <section class="section error-404 d-flex flex-column align-items-center justify-content-top">
                <h1 class="mainHead">Zozolive</h1>
                <h2 class="text-center subHead">Show your talent.<br>
                    Make money. Fulfill dreams.</h2>
                <a class="btn customBtn" href="#"><i class="bi bi-funnel"></i> &nbsp; Become a Model</a>
            </section>

        </div>

    </section>
    <div class="container-fluid topSection">
        <div class="text-center videoBox">
            <video width="75%" playsinline="" loop="" class="video-player__video"
                   src="https://cdn.strpst.com/assets/common/components/aboutPageComponents/aboutPageSections/ModelStripchatSection/video/video.mp4"></video>
        </div>
    </div>
    {{-- <div class="container-fluid">
        <div class="welcomeBox col-md-7">
            <div class="left">
                <img src="https://cdn.strpst.com/assets/common/components/aboutPageComponents/aboutPageSections/SexualFreedomSection/images/bird.png"
                     alt="">
            </div>
            <div class="right-box">
                <div class="first">
                    <span class="">Welcome to the world of erotic livestreaming and sexual freedom.</span>
                </div>
                <div class="second">
                    <button class="btn btn-info">Learn More &nbsp;&nbsp;<i class="bi bi-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container-fluid text-center incomeBox">
        <h2 class="text-center secondHead">Your potential income</h2>
        <h3 class="text-center sectionsubHead">Based on average data in your region</h3>

        <div class="incomeBoxdata col-md-8">
            <div class="incomeleft">
                <p class="lefttitle">Favorited by: <span>2,500</span></p>
                <input type="range" class="form-range" min="0" max="5" step="0.5" id="customRange2"
                       style="   width: 85%;">
                <p class="leftcontent">The more you broadcast, the more viewers add you to Favorites!</p>
            </div>
            <div class="incomeright">
                <div class="sum">
                    <span class="firstC">Per hour</span>
                    <p><span class="secC">₹</span> 1000</p>

                </div>
            </div>
        </div>

    </div>


    <section class="mt-150">
        <div class="container">
            <div class="row">
                <div class="col-md-5 p-relative">
                    <h1 class="sectionsubHead">With our<br> recommendation<br> system</h1>
                    <h2 class="secondHead">We make sure your audience finds you</h2>
                </div>
                <div class="col-md-7 p-relative text-center">
                    <img height="300px" alt="avatars" class="billion-section__avatars-img" loading="lazy"
                         src="https://cdn.strpst.com/assets/common/components/aboutPageComponents/aboutPageSections/BillionSection/images/avatars.png">
                    <span class="billion-section__billion p-relative text-center">
        <span class="">
          <span class="billion-section__billion-big">1 Billion</span><br>
          <span class="billion-section__billion-small">monthly visits</span>
        </span>
      </span>
                </div>
                <img alt="" class="billion-section__wave-img mt-m190" loading="lazy"
                     src="https://cdn.strpst.com/assets/common/components/aboutPageComponents/aboutPageSections/BillionSection/images/wave.svg">
            </div>
        </div>
    </section>

    <section class="mt-150">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="secondHead">Easy way in</h1><br>
                    <h2 class="sectionsubHead">Super quick registration</h2><br>
                    <h2 class="sectionsubHead">2-week traffic boost<br> since first stream</h2><br>
                    <h2 class="sectionsubHead">No extra equipment or <br>software</h2>
                </div>
                <div class="col-md-6">
                    <img src="https://cdn.strpst.com/assets/common/components/aboutPageComponents/aboutPageSections/EasyWaySection/images/easy-way.svg">
                </div>
            </div>
        </div>
    </section>

    <section class="mt-150">
        <div class="container">
            <div class="row justify-content-center text-center">
                <h1 class="secondHead mt-m10">Private &</h1>
                <h1 class="secondHead mt-m10">Exclusive Private</h1>
                <h1 class="secondHead mt-m10">shows</h1><br>
            </div>
        </div>
        <div class="container-fluid mt-50">
            <div class="text-center videoBox">
                <video width="75%" playsinline="" loop="" class="video-player__video"
                       src="https://cdn.strpst.com/assets/AboutStripchat/PrivateSection/c2c.mp4"></video>
            </div>
        </div>
        <div class="container mt-50 boxSection">
            <div class="row">
                <div class="col-md-3 boxLayout">
                    <div class="roundIconBack">
                        <i class="bi bi-funnel"></i>
                    </div>
                    <h3 class="boxHead">Receive Private tips</h3>
                </div>
                <div class="col-md-3 boxLayout">
                    <div class="roundIconBack">
                        <i class="bi bi-eye"></i>
                    </div>
                    <h3 class="boxHead">Earn with paid spying</h3>
                </div>
                <div class="col-md-3 boxLayout">
                    <div class="roundIconBack">
                        <i class="bi bi-files"></i>
                    </div>
                    <h3 class="boxHead">Sell recorded shows</h3>
                </div>
                <div class="col-md-3 boxLayout">
                    <div class="roundIconBack">
                        <i class="bi bi-lightning-charge-fill"></i>
                    </div>
                    <h3 class="boxHead">Get Private requests offline</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-150">
        <div class="container">
            <div class="row justify-content-center text-center">
                <h1 class="secondHead mt-m10">Earn with</h1>
                <h1 class="secondHead mt-m10">messages</h1>
            </div>
        </div>
        <div class="container mt-50">
            <div class="row">
                <ul class="nav nav-tabs nav-tabs-bordered d-flex borderBottom" id="borderedTabJustified" role="tablist">
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home"
                                aria-selected="true">
                            <i class="bi bi-funnel"></i> &nbsp;&nbsp; Contact sale
                        </button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#bordered-justified-profile" type="button" role="tab"
                                aria-controls="profile" aria-selected="false"><i class="bi bi-mic-fill"></i> &nbsp;&nbsp;
                            Voice messages
                        </button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab"
                                data-bs-target="#bordered-justified-contact" type="button" role="tab"
                                aria-controls="contact" aria-selected="false"><i class="bi bi-people-fill"></i> &nbsp;&nbsp;
                            Mass messages
                        </button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab"
                                data-bs-target="#bordered-justified-contact" type="button" role="tab"
                                aria-controls="contact" aria-selected="false"><i class="bi bi-camera-fill"></i> &nbsp;&nbsp;
                            Pay-to-send photos
                        </button>
                    </li>
                </ul>

                <div class="tab-content pt-2 mt-20" id="borderedTabJustifiedContent">
                    <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel"
                         aria-labelledby="home-tab">
                        Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non
                        est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit.
                        Fuga sequi sed ea saepe at unde.
                    </div>
                    <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel"
                         aria-labelledby="profile-tab">
                        Nesciunt totam et. Consequuntur magnam aliquid eos nulla dolor iure eos quia. Accusantium
                        distinctio omnis et atque fugiat. Itaque doloremque aliquid sint quasi quia distinctio
                        similique. Voluptate nihil recusandae mollitia dolores. Ut laboriosam voluptatum dicta.
                    </div>
                    <div class="tab-pane fade" id="bordered-justified-contact" role="tabpanel"
                         aria-labelledby="contact-tab">
                        Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium
                        quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum
                        veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
                    </div>
                </div>


            </div>
        </div>
    </section>

    <section class="pt-5 pb-5 mt-150">
        <h2 class="text-center secondHead">Sell photos & videos</h2>
        <h3 class="text-center sectionsubHead">Keep earning outside of streaming
        </h3>
        <div class="container-fluid">
            <div class="row">
                <section class="wiper">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide swiper-slide--one">
                                <div class="caption">
                                    <p>
                                        <i class="bi bi-funnel"></i>
                                        90tk
                                    </p>
                                    <button>Unlock Photo</button>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide--two">
                                <div class="caption">
                                    <p>
                                        <i class="bi bi-funnel"></i>
                                        90tk
                                    </p>
                                    <button>Unlock Photo</button>
                                </div>
                            </div>

                            <div class="swiper-slide swiper-slide--three">
                                <div class="caption">
                                    <p>
                                        <i class="bi bi-funnel"></i>
                                        90tk
                                    </p>
                                    <button>Unlock Photo</button>
                                </div>
                            </div>

                            <div class="swiper-slide swiper-slide--four">
                                <div class="caption">
                                    <p>
                                        <i class="bi bi-funnel"></i>
                                        90tk
                                    </p>
                                    <button>Unlock Photo</button>
                                </div>
                            </div>

                            <div class="swiper-slide swiper-slide--five">
                                <div class="caption">
                                    <p>
                                        <i class="bi bi-funnel"></i>
                                        90tk
                                    </p>
                                    <button>Unlock Photo</button>
                                </div>
                            </div>
                        </div>
                        <!-- Add Pagination -->

                    </div>
                </section>
            </div>
        </div>
    </section>


    <section class="mt-150">
        <div class="container">
            <div class="row justify-content-center text-center">
                <h1 class="secondHead mt-m10">Stream on the go.</h1>
                <h1 class="secondHead mt-m10">Stream on mobile.</h1>
            </div>
        </div>
        <div class="container-fluid mt-50">
            <div class="text-center videoBox">
                <img alt="" class="devices-section__desktop" loading="lazy"
                     src="https://cdn.strpst.com/assets/common/components/aboutPageComponents/aboutPageSections/DevicesSection/images/desktop-model.jpg"
                     width="75%">
            </div>
        </div>
    </section>

    <section class="mt-150 other_perks">
        <div class="container">
            <div class="row justify-content-center text-center">
                <h1 class="secondHead mt-m10">Other perks</h1>
            </div>
        </div>
        <div class="container mt-50" style="width:70%;">
            <div class="row">
                <div class="col-xxl-4 col-xl-12">
                    <div class="card info-card customers-card">
                        <div class="card-body firstBox">
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <img class="other-perks-section__icon other-perks-section__icon--big"
                                         src="https://cdn.strpst.com/assets/common/components/aboutPageComponents/aboutPageSections/OtherPerksSection/images/fan-club.svg"
                                         alt="">
                                </div>
                                <div class="ps-3">
                                    <h3 class="subHead">Fan Club</h3>
                                    <h4>Get your very own group of paying</h4>
                                    <h4>subscribers</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body other_perksCard">
                            <img class="other-perks-section__icon ps-3"
                                 src="https://cdn.strpst.com/assets/common/components/aboutPageComponents/aboutPageSections/OtherPerksSection/images/wallet.svg"
                                 alt="">
                            <div class="ps-3 mt-20">
                                <h3 class="subHead">Weekly payouts</h3>
                                <h4>Regular, secure,</h4>
                                <h4>transparent</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body other_perksCard">
                            <img class="other-perks-section__icon ps-3"
                                 src="https://cdn.strpst.com/assets/common/components/aboutPageComponents/aboutPageSections/OtherPerksSection/images/dollar-circle.svg"
                                 alt="">
                            <div class="ps-3 mt-20">
                                <h3 class="subHead">Multiple payout methods</h3>
                                <h4>Choose where you</h4>
                                <h4>prefer getting paid</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body other_perksCard">
                            <img class="other-perks-section__icon ps-3"
                                 src="https://cdn.strpst.com/assets/common/components/aboutPageComponents/aboutPageSections/OtherPerksSection/images/gift.svg"
                                 alt="">
                            <div class="ps-3 mt-20">
                                <h3 class="subHead">Referral Program</h3>
                                <h4>Earn an extra 20% with</h4>
                                <h4>referred users</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body other_perksCard">
                            <img class="other-perks-section__icon ps-3"
                                 src="https://cdn.strpst.com/assets/common/components/aboutPageComponents/aboutPageSections/OtherPerksSection/images/geo.svg"
                                 alt="">
                            <div class="ps-3 mt-20">
                                <h3 class="subHead">GEO-ban</h3>
                                <h4>Choose countries and</h4>
                                <h4>regions that cannot see you</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body other_perksCard">
                            <img class="other-perks-section__icon ps-3"
                                 src="https://cdn.strpst.com/assets/common/components/aboutPageComponents/aboutPageSections/OtherPerksSection/images/lock.svg"
                                 alt="">
                            <div class="ps-3 mt-20">
                                <h3 class="subHead">DMCA protection</h3>
                                <h4>We help models keep</h4>
                                <h4>their content safe</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body other_perksCard">
                            <img class="other-perks-section__icon ps-3"
                                 src="https://cdn.strpst.com/assets/common/components/aboutPageComponents/aboutPageSections/OtherPerksSection/images/shield-tick.svg"
                                 alt="">
                            <div class="ps-3 mt-20">
                                <h3 class="subHead">Chargeback protection</h3>
                                <h4>User refunds or not,</h4>
                                <h4>you keep your tips</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-150">
        <div class="container">
            <div class="row text-center">
                <img alt="" class="lgbt-section__rainbow" loading="lazy"
                     src="https://cdn.strpst.com/assets/common/components/aboutPageComponents/aboutPageSections/LgbtSection/images/rainbow.png"
                     style="height:180px;width:auto;margin: auto;">

                <h4 class="mt-20">LGBTQ+ friendly community</h4>
                <h1 class="secondHead mt-20">Be yourself.</h1>
                <h1 class="secondHead mt-m10">Be proud.</h1>
                <h4 class="">Male, female, trans — Stripchat celebrates this</h4>
                <h4 class="mt-m10">diverse and vibrant world we all live in.</h4>
            </div>
        </div>
    </section>

    <section class="mt-150 container freedomBox">
        <div class="row">
            <div class="col-md-10" style="margin:auto;">
                <div class="row text-left d-flex justify-content-center align-items-center">
                    <div class="col-md-4">
                        <img src="https://cdn.strpst.com/assets/common/components/aboutPageComponents/aboutPageSections/LgbtSection/images/megaphone.png">
                    </div>
                    <div class="col-md-8">
                        <h3 class="mt-20">A place of sexual</h3>
                        <h3 class="">freedom</h3>
                        <h4 class="mt-20">Sensuality is not a sin. Feel the freedom to bare it all</h4>
                        <h4 class="mt-m10">and reap the rewards.</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-150 container final">
        <div class="row">
            <div class="col-md-5">
                <h2 class="secondHead mt-m10">Start</h2>
                <h2 class="secondHead mt-m10">earning with</h2>
                <h2 class="secondHead mt-m10">Zozolive</h2>

                <a class="btn customBtn mt-50" href="#"><i class="bi bi-funnel"></i> &nbsp; Become a Model</a>
            </div>
            <h4 style="margin-left:-80px;text-align:center;margin-top:20px;font-size:20px;text-decoration:underline;">
                Models FAQ</h4>
        </div>
    </section>

    <section>
        <div class="join-section__shadow"></div>
    </section>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js"
            integrity="sha512-wdUM0BxMyMC/Yem1RWDiIiXA6ssXMoxypihVEwxDc+ftznGeRu4s9Fmxl8PthpxOh5CQ0eqjqw1Q8ScgNA1moQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        var swiper = new Swiper(".swiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 100,
                modifier: 2,
                slideShadows: true
            },
            spaceBetween: 60,
            loop: true,
            pagination: {
                el: ".swiper-pagination"
            }
        });

    </script>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.css"
          integrity="sha512-jxGmKjC/OykrTklkNK2NgnhNtKtUAADFY+rvSi3nA7dbaPRfjrSXYxHqX8iq5N6WTOntqEQZrEwW3L84sirfKQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style type="text/css">
        input[type=range].form-range::-webkit-slider-thumb {
            margin-top: -20px;
            width: 50px;
            height: 50px;
            background: url('https://i.pinimg.com/originals/17/d0/74/17d0747c12d59dd8fd244e90d91956b9.png');
            background-repeat: no-repeat;
            background-position: center;
            background-size: 50px;
            cursor: pointer;
            -webkit-appearance: none;
            -webkit-transition: -webkit-transform .5s ease-in-out;
            -ms-transition: -ms-transform .5s ease-in-out;
            transition: transform .5s ease-in-out;
        }

        .main {
            margin-top: 0px !important;
            padding-top: 0px !important;
        }

        .mt-m10 {
            margin-top: -10px;
            margin-bottom: 0px;
        }

        .mt-50 {
            margin-top: 50px;
        }

        .mt-20 {
            margin-top: 20px;
        }

        .mt-m190 {
            margin-top: -190px;
        }

        .customBtn {
            border-radius: 40px;
            padding: 15px 35px !important;
            font-size: 20px;
            color: var(--primary) !important;
            background: #fff !important;
            font-weight: 500;
        }

        .customBtn i {
            font-weight: 600;
        }

        .customBtn:hover {
            box-shadow: 0 4px 50px rgb(255 255 255 / 50%);
        }

        body {
            background: #111;
        }

        .videoBox {
            padding-top: 20px;
        }

        .mainHead {
            margin-bottom: 20px !important;
            color: #fff !important;
        }

        .subHead {
            font-size: 30px !important;
            color: #fff !important;
            font-weight: 500 !important;
        }

        .primaryBack {
            background: var(--primary) !important;
        }

        main {
            margin-left: 0px !important;
            margin-right: 0px;
            padding-left: 0px !important;
            padding-right: 0px !important;
            margin-top: 39px !important;
        }

        .topSection {
            background: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTQ0MCIgaGVpZ2h0PSIzMDMiIHZpZXdCb3g9IjAgMCAxNDQwIDMwMyIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTAgMEgxNDQwVjMwM0MxNDQwIDMwMyAxMTMwIDIwOS41IDcyMCAyMDkuNUMzMTAgMjA5LjUgMCAzMDMgMCAzMDNWMFoiIGZpbGw9IiNBMjI1MkQiLz4KPC9zdmc+Cg==) no-repeat 0 -1px/contain;
        }

        .welcomeBox {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 120px !important;
            border-radius: 80px;
            margin: auto;
            border: 3px solid #a2262e;
            padding: 13px;
            background: linear-gradient(0deg, #1c1c1c, #1c1c1c), linear-gradient(93.63deg, #e8e8e8 0%, #5f5f5f 100.39%);
        }

        .welcomeBox .left {
            position: relative;
            top: -40px;
        }

        .welcomeBox .left img {
            height: 100px;
        }

        .welcomeBox .right-box {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .welcomeBox .right-box .second button {
            font-weight: 600;
            font-size: 18px;
            background: rgba(255, 255, 255, .03);
            color: #fff;
            padding: 19px 25px;
            border: none;
            border-radius: 38px;
            display: flex;
        }

        .welcomeBox .right-box .first {
            width: 68%;
        }

        .welcomeBox .right-box .first span {
            font-size: 24px;
        }

        .secondHead {
            font-size: 60px !important;
        }

        .incomeBox {
            margin-top: 90px;
        }

        .sectionsubHead {
            font-size: 35px !important;
        }

        .incomeBoxdata {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 80px !important;
            border-radius: 60px;
            margin: auto;
            border: 3px solid #a2262e;
            padding: 25px 13px;
            background: linear-gradient(0deg, #1c1c1c, #1c1c1c), linear-gradient(93.63deg, #e8e8e8 0%, #5f5f5f 100.39%);
        }

        .incomeleft {
            width: 58%;
            padding-right: 40px;
        }

        .incomeleft p.lefttitle {
            font-size: 30px;
        }

        .incomeleft p span {
            font-size: 40px;
        }

        p.leftcontent {
            font-size: 25px;
            color: rgba(255, 255, 255, .3);
            margin-top: 15px;
        }

        .incomeright .sum {
            background: #a2262e;
            padding: 15px 108px;
            border-radius: 55px;
            box-shadow: 0 4px 250px #a2252d;
        }

        .incomeright .sum span.firstC {
            font-size: 24px;
        }

        .incomeright .sum p {
            font-size: 100px;
            font-weight: 500;
        }

        .incomeright .sum span.secC {
            font-size: 47px;
            font-weight: 500;
        }

        .mt-150 {
            margin-top: 150px;
        }

        .p-relative {
            position: relative;
        }

        .billion-section__billion {
            display: block;
            margin-top: 14px;
        }

        .billion-section__billion-big {
            font-size: 40px;
            margin-left: 35%;
            font-weight: 600;
        }

        .billion-section__billion-small {
            font-size: 25px;
            margin-left: 35%;
        }

        .boxSection .row {
            width: 92%;
            margin: auto;
        }

        .col-md-3.boxLayout {
            padding: 18px;
            width: 22%;
            margin: auto;
            text-align: center;
        }

        .roundIconBack {
            height: 70px;
            width: 70px;
            border-radius: 50%;
            margin: auto;
            align-items: center;
            display: flex;
            justify-content: center;
            background: #e0a850;
            font-size: 33px;
            color: #000;
            margin-bottom: 20px;
        }

        .boxHead {
            font-size: 27px !important;
        }

        .nav-tabs-bordered .nav-link.active {
            background-color: transparent;
            color: #fff;
            border-bottom: 5px solid #a2262e;
            font-size: 24px;
        }

        .nav-tabs-bordered .nav-link {
            margin-bottom: -2px;
            border: none;
            color: #ffffff33;
            font-size: 24px;
        }

        .borderBottom {
            margin: auto;
            padding-right: 0px;
        }

        #carouselExampleIndicators2 img {
            min-height: 300px;
        }

        .other_perks .card {
            background: rgba(255, 255, 255, .05);
            border-radius: 20px;
        }

        .other_perks .card .card-body.firstBox {
            align-items: center;
            justify-content: center;
            display: flex;
            padding: 20px;
        }

        h3.subHead {
            font-size: 35px;
            font-weight: 600;
        }

        .other_perksCard {
            padding: 30px 20px;
            min-height: 280px;
        }

        .other_perksCard h4 {
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .freedomBox .col-md-10 {
            background: url(https://cdn.strpst.com/assets/common/components/aboutPageComponents/aboutPageSections/LgbtSection/images/border.svg);
            background-size: 100%;
        }

        .freedomBox .col-md-4 {
            height: 435px;
            display: flex;
            align-items: center;
        }

        .freedomBox .col-md-8 h3 {
            font-size: 55px;
        }

        .freedomBox .col-md-4 img {
            width: auto;
            height: 341px;
            margin-left: -65px;
        }

        .final .col-md-5 {
            margin: auto;
            padding-left: 25px;
            border-left: 10px solid #a2262e;
        }

        .join-section__shadow {
            background: radial-gradient(50% 50% at 50% 50%, rgba(162, 37, 45, .8) 0%, rgba(162, 32, 39, 0) 100%);
            bottom: -483px;
            height: 966px;
            left: 0;
            opacity: .8;
            position: absolute;
            right: 0;
            z-index: -1;
        }


        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Roboto:wght@300;400;500&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        section.wiper {
            position: relative;
            width: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .swiper {
            width: 100%;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .swiper-slide {
            width: 300px;
            height: 400px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.2);
            filter: blur(1px);
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: end;
            align-items: self-start;
        }

        .swiper-slide-active {
            filter: blur(0px);
        }

        .swiper-slide span {
            text-transform: uppercase;
            color: #fff;
            background: #1b7402;
            padding: 7px 18px 7px 25px;
            display: inline-block;
            border-radius: 0 20px 20px 0px;
            letter-spacing: 2px;
            font-size: 0.8rem;
            font-family: "Open Sans", sans-serif;
        }

        .swiper-slide--one span {
            background: #62667f;
        }

        .swiper-slide--two span {
            background: #087ac4;
        }

        .swiper-slide--three span {
            background: #b45205;
        }

        .swiper-slide--four span {
            background: #087ac4;
        }

        .swiper-slide h2 {
            color: #fff;
            font-family: "Roboto", sans-serif;
            font-weight: 400;
            font-size: 1.3rem;
            line-height: 1.4;
            margin-bottom: 15px;
            padding: 25px 45px 0 25px;
        }

        .swiper-slide p {
            color: #fff;
            font-weight: 300;
            display: flex;
            align-items: center;
            padding: 0 25px 35px 25px;
        }

        .swiper-slide svg {
            color: #fff;
            width: 22px;
            height: 22px;
            margin-right: 7px;
        }

        .swiper-slide--one {
            background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
            url(https://images.unsplash.com/photo-1556206079-747a7a424d3d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=871&q=80) no-repeat 50% 50% / cover;
        }

        .swiper-slide--two {
            background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
            url("https://images.unsplash.com/photo-1571900670723-a317a66e3fb7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=423&q=80") no-repeat 50% 50% / cover;
        }

        .swiper-slide--three {
            background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
            url("https://images.unsplash.com/photo-1549144511-f099e773c147?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80") no-repeat 50% 50% / cover;
        }

        .swiper-slide--four {
            background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
            url("https://images.unsplash.com/photo-1650367310179-e1b5b8e453c3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80") no-repeat 50% 50% / cover;
        }

        .swiper-slide--five {
            background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
            url("https://images.unsplash.com/photo-1596521864207-13d46b1a0c78?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80") no-repeat 50% 50% / cover;
        }

        .swiper-3d .swiper-slide-shadow-left,
        .swiper-3d .swiper-slide-shadow-right {
            background-image: none;
        }

        .swiper .caption {
            display: block;
            justify-content: center;
            text-align: center;
            width: 100%;
            position: absolute;
            top: 65%;
        }

        .swiper .caption p {
            text-align: center;
            margin: auto;
            justify-content: center;
            font-size: 25px;
            padding: 15px;
        }

        .swiper .caption button {
            padding: 10px 20px;
            background: #67a52c;
            color: #fff;
            font-weight: 400;
            border-radius: 26px;
            border: none;
        }

        .swiper .caption p i {
            margin-right: 10px;
        }

        .swiper .caption {
            display: none;
        }

        .swiper-slide-active .caption {
            display: block;
        }
    </style>
@endsection
