@extends('layouts.front')
@section('content')
        <section class="section mt-4">
            <div class="row align-items-top">
                <div class="col-lg-6">
                    <div class="card">
                        <div
                            class="card-body"
                            style="padding: 0px; background: #3b3b3b"
                        >
                            <video
                                style="width: 100%; height: 495px"
                                controls=""
                            >
                                <source
                                    src="/assets/img/videofile.mp4"
                                    type="video/mp4"
                                />
                            </video>
                        </div>
                        <div class="action_box">
                            <div class="like">
                                <i
                                    v-if="isLike <= 0"
                                    class="bi bi-heart"
                                ></i>
                                <i
                                    v-else
                                    class="bi bi-heart-fill"
                                ></i>

                                {{-- {{ this.totalLikes }} --}}
                            </div>
                            <div class="private">
                                <button>Start Private</button>
                            </div>
                            <div class="tip"><button>Send Tip</button></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card chat_card">
                        <div class="card-header chat_card--header">
                            <div class="row">
                                <ul
                                    class="nav nav-tabs chat_card--tabs d-flex"
                                    id="chat_box"
                                    role="tablist"
                                >
                                    <li
                                        class="nav-item flex-fill"
                                        role="presentation"
                                    >
                                        <button
                                            class="nav-link w-100 chat_card--btn active"
                                            id="home-tab"
                                            data-bs-toggle="tab"
                                            data-bs-target="#bordered-justified-home"
                                            type="button"
                                            role="tab"
                                            aria-controls="home"
                                            aria-selected="true"
                                        >
                                            <i class="bi bi-chat-fill"></i>
                                            &nbsp;&nbsp; Public
                                        </button>
                                    </li>
                                    <li
                                        class="nav-item flex-fill"
                                        role="presentation"
                                    >
                                        <button
                                            class="nav-link w-100 chat_card--btn"
                                            id="profile-tab"
                                            data-bs-toggle="tab"
                                            data-bs-target="#bordered-justified-profile"
                                            type="button"
                                            role="tab"
                                            aria-controls="profile"
                                            aria-selected="false"
                                        >
                                            <i
                                                class="bi bi-chat-heart-fill"
                                            ></i>
                                            &nbsp;&nbsp; Private
                                        </button>
                                    </li>
                                    <li
                                        class="nav-item flex-fill"
                                        role="presentation"
                                    >
                                        <button
                                            class="nav-link w-100 chat_card--btn"
                                            id="contact-tab"
                                            data-bs-toggle="tab"
                                            data-bs-target="#bordered-justified-contact"
                                            type="button"
                                            role="tab"
                                            aria-controls="contact"
                                            aria-selected="false"
                                        >
                                            <i class="bi bi-people-fill"></i>
                                            &nbsp;&nbsp; 2100
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div
                            class="card-body position-relative chat_card--body"
                            style="height: 500px"
                        >
                            <div
                                class="tab-content pt-2 mt-20 h-100"
                                id="chat_boxContent"
                            >
                                {{-- <PublicChhat /> --}}
                                <div
                                    class="tab-pane fade px-3"
                                    id="bordered-justified-contact"
                                    role="tabpanel"
                                    aria-labelledby="contact-tab"
                                >
                                    <h6>30 Watching Now</h6>
                                    <div>
                                        <span class="text-gray"
                                            >Users with tokens:
                                        </span>
                                        <span>10</span>
                                    </div>
                                    <div>
                                        <span class="text-gray">Others: </span>
                                        <span>20</span>
                                    </div>
                                    {{-- <div
                                        class="mt-3 stream__user"
                                        v-for="n in 7"
                                    >
                                        <span class="stream__user--level">
                                            <span>{{ n }}</span>
                                        </span>
                                        <span class="text-gray font-bold"
                                            >&nbsp;abhay sexy</span
                                        >
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<section>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title" style="display: flex; justify-content: space-between; padding: 20px 0 0px 0 !important;">
                        <span>
                            <h6 style="color: #f8f8f8 !important;">Goal</h6>
                        </span>
                        <span>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked />
                            </div>
                        </span>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-8">
                            <input class="inputBox" placeholder="I love sex baby I'm full body show" type="text" quoted_printable_decode />
                        </div>
                        <div class="col-md-4">
                            <input class="inputBox" placeholder="1104" type="text" style="width: 100%;" />
                        </div>
                        <div>
                            <button class="emailButton" style="height: 30px;">+ Add Goal</button>
                        </div>
                    </div>
                    <div class="row" style="display: flex;">
                        <div class="col-md-6">
                            <button class="saveButton" style="background-color: #859e4f; width: 30%; height: 30px;">Save</button>
                            <button class="saveButton" style="background-color: #5b5b5b; width: 40%; height: 30px;">Cancel</button>
                        </div>

                        <div class="announce col-md-6"><i class="bi bi-send-fill"></i>Announce in chat</div>
                    </div>
                    <hr />
                    <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                        Motivate users in your chat room to tip by announcing a special public performance once the desired number of tokens is reached. You can add upto 5 goals.
                        <a href="#">
                            <u style="color: #5b5b5b;">Show More</u>
                        </a>
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-title" style="display: flex; justify-content: space-between; padding: 20px 0 0px 0 !important;">
                        <span>
                            <h6 style="color: #f8f8f8 !important;"><i class="bi bi-joystick"></i> Interactive Toys</h6>
                        </span>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-8">
                            <span>
                                <p style="color: #f8f8f8 !important;">Lovense</p>
                                <p class="p-text" style="color: #5b5b5b;">Your lovnese is not cancelled</p>
                            </span>
                        </div>

                        <div class="col-md-4" style="display: flex; justify-content: end;">
                            <button style="height: 27px; width: 35px; background: #5b5b5b; color: white;"><i class="bi bi-info-circle"></i></button>
                        </div>
                        <!-- <div>
                                                        <button class="emailButton" style="height: 30px;">+ Add Goal</button>
                                                </div> -->
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-8">
                            <span>
                                <p style="color: #f8f8f8 !important;">Kiiroo</p>
                                <p class="p-text" style="color: #5b5b5b;">Your Kiiroo is not cancelled</p>
                            </span>
                        </div>

                        <div class="col-md-4" style="display: flex; justify-content: end;">
                            <button style="height: 27px; width: 35px; background: #5b5b5b; color: white;"><i class="bi bi-gear-fill"></i></button>
                        </div>
                        <!-- <div>
                                                        <button class="emailButton" style="height: 30px;">+ Add Goal</button>
                                                </div> -->
                    </div>
                    <hr />

                    <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                        Motivate users in your chat room to tip by announcing a special public performance once the desired number of tokens is reached. You can add upto 5 goals.
                        <a href="#">
                            <u style="color: #5b5b5b;">Show More</u>
                        </a>
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-title" style="display: flex; justify-content: space-between; padding: 20px 0 0px 0 !important;">
                        <span>
                            <h6 style="color: #f8f8f8 !important;"><i class="bi bi-twitter"></i>Twitter Autopost</h6>
                        </span>
                        <span>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked />
                            </div>
                        </span>
                    </div>
                    <hr />

                    <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                        This massage will be automatically posted to your Twitter when you go live
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title" style="display: flex; justify-content: space-between; padding: 20px 0 0px 0 !important;">
                        <span>
                            <h6 style="color: #f8f8f8 !important;"><i class="bi bi-megaphone"></i> Topic of today show</h6>
                        </span>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <input class="inputBox" placeholder="I love sex baby I'm full body show" type="text" />
                        </div>
                    </div>
                    <div class="row" style="display: flex;">
                        <div class="col-md-6">
                            <button class="saveButton" style="background-color: #859e4f; width: 30%; height: 30px;">Save</button>
                            <button class="saveButton" style="background-color: #5b5b5b; width: 40%; height: 30px;">Cancel</button>
                        </div>
                    </div>
                    <hr />
                    <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                        Describe your chat room and everything that happens in it. Share the type of activities you will perform in the chat room and announce shows. Keep it show/profile related.
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-title" style="display: flex; justify-content: space-between; padding: 20px 0 0px 0 !important;">
                        <span>
                            <h6 style="color: #f8f8f8 !important;"><i class="bi bi-camera-reels"></i>Record Show</h6>
                        </span>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-9">
                            <span>
                                <p style="color: #f8f8f8 !important;">Allow recording public Shows</p>
                                <p class="p-text" style="color: #5b5b5b;">Set the price for users to record your public shows. Users' recordings go to their collections. By allowing to record public shows, you agree to our Terms ol Use</p>
                            </span>
                        </div>

                        <div class="col-md-3" style="display: flex; justify-content: end;">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked />
                            </div>
                        </div>
                        <!-- <div>
                                                        <button class="emailButton" style="height: 30px;">+ Add Goal</button>
                                                </div> -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <span>
                                <p style="color: #f8f8f8 !important;">Price, tk/min</p>
                                <select class="inputBox" style="width: 16%; font-size: small;">
                                    <option value="volvo" style="font-size: small;">150 tk</option>
                                    <option value="saab" style="font-size: small;">150 tk</option>
                                    <option value="opel" style="font-size: small;">150 tk</option>
                                    <option value="audi" style="font-size: small;">150 tk</option>
                                </select>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                            If you start a Private show, the recording of your public show stops for evervone,
                        </p>
                        <div class="row" style="display: flex;">
                            <div class="col-md-6">
                                <button class="saveButton" style="background-color: #859e4f; width: 30%; height: 30px;">Save</button>
                                <button class="saveButton" style="background-color: #5b5b5b; width: 40%; height: 30px;">Cancel</button>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-top: 1rem;" />
                    <div class="row">
                        <div class="col-md-9">
                            <span>
                                <p style="color: #f8f8f8 !important;">Allow recording public Shows</p>
                            </span>
                        </div>

                        <div class="col-md-3" style="display: flex; justify-content: end;">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked />
                            </div>
                        </div>

                    </div>

                    <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                        Your viewers can save recorded shows to their collection. You also get the recording and can make it available for tokens in you profile <br />
                        NOTE: Exclusive Private show recordings are available only to the user
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-title" style="display: flex; justify-content: space-between; padding: 20px 0 0px 0 !important;">
                        <span>
                            <h6 style="color: #f8f8f8 !important;"><i class="bi bi-chat-left-quote"></i>who can chat</h6>
                        </span>
                    </div>
                    <hr />
                    <div class="col-md-12">
                        <select class="inputBox" style="font-size: small;">
                            <option value="volvo" style="font-size: small;">REgistered users with verified emails</option>
                            <option value="saab" style="font-size: small;">150 tk</option>
                            <option value="opel" style="font-size: small;">150 tk</option>
                            <option value="audi" style="font-size: small;">150 tk</option>
                        </select>
                    </div>
                    <div class="row" style="display: flex;">
                        <div class="col-md-6">
                            <button class="saveButton" style="background-color: #859e4f; width: 30%; height: 30px;">Save</button>
                            <button class="saveButton" style="background-color: #5b5b5b; width: 40%; height: 30px;">Cancel</button>
                        </div>
                    </div>
                    <hr />
                    <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                        With this setting, you decide if your room chat is for everyone, or only for - select few. Show more
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title" style="display: flex; justify-content: space-between; padding: 20px 0 0px 0 !important;">
                        <span>
                            <h6 style="color: #f8f8f8 !important;"><i class="bi bi-list"></i>Tip menu</h6>
                        </span>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <select class="inputBox" style="font-size: small;">
                                <option value="volvo" style="font-size: small;">Love</option>
                                <option value="saab" style="font-size: small;">Mood</option>
                                <option value="opel" style="font-size: small;">Kiss</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-6">
                                <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                                    Activity
                                </p>
                            </div>
                            <div class="col-md-4">
                                <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                                    PRICE , tk
                                </p>
                            </div>
                            <div class="col-md-1">

                            </div>



                        </div>
                        <div class="row">
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-6">
                                <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                                    <input class="inputBox" type="text" />

                                </p>
                            </div>
                            <div class="col-md-4">
                                <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                                    <input class="inputBox" type="text" />

                                </p>
                            </div>
                            <div class="col-md-1">
                                <h3> <i class="bi bi-x"></i></h3>
                            </div>



                        </div>
                        <div class="row">
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-6">
                                <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                                    <input class="inputBox" type="text" />

                                </p>
                            </div>
                            <div class="col-md-4">
                                <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                                    <input class="inputBox" type="text" />

                                </p>
                            </div>
                            <div class="col-md-1">
                                <h3> <i class="bi bi-x"></i></h3>
                            </div>



                        </div>
                        <div class="row">
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-6">
                                <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                                    <input class="inputBox" type="text" />

                                </p>
                            </div>
                            <div class="col-md-4">
                                <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                                    <input class="inputBox" type="text" />

                                </p>
                            </div>
                            <div class="col-md-1">
                                <h3> <i class="bi bi-x"></i></h3>
                            </div>



                        </div>
                        <div class="row">
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-6">
                                <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                                    <input class="inputBox" type="text" />

                                </p>
                            </div>
                            <div class="col-md-4">
                                <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                                    <input class="inputBox" type="text" />

                                </p>
                            </div>
                            <div class="col-md-1">
                                <h3> <i class="bi bi-x"></i></h3>
                            </div>



                        </div>
                        <div class="row">
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-6">
                                <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                                    <input class="inputBox" type="text" />

                                </p>
                            </div>
                            <div class="col-md-4">
                                <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                                    <input class="inputBox" type="text" />

                                </p>
                            </div>
                            <div class="col-md-1">
                                <h3> <i class="bi bi-x"></i></h3>
                            </div>



                        </div>

                        <div class="row">
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-6">
                                <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                                    <input class="inputBox" type="text" />

                                </p>
                            </div>
                            <div class="col-md-4">
                                <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                                    <input class="inputBox" type="text" />

                                </p>
                            </div>
                            <div class="col-md-1">
                                <h3> <i class="bi bi-x"></i></h3>
                            </div>



                        </div>
                        <div class="row">
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-6">
                                <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                                    <input class="inputBox" type="text" />

                                </p>
                            </div>
                            <div class="col-md-4">
                                <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                                    <input class="inputBox" type="text" />

                                </p>
                            </div>
                            <div class="col-md-1">
                                <h3> <i class="bi bi-x"></i></h3>
                            </div>



                        </div>
                        <div class="row">
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-6">
                                <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                                    <input class="inputBox" type="text" />

                                </p>
                            </div>
                            <div class="col-md-4">
                                <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                                    <input class="inputBox" type="text" />

                                </p>
                            </div>
                            <div class="col-md-1">
                                <h3> <i class="bi bi-x"></i></h3>
                            </div>



                        </div>
                        <div class="row">
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-6">
                                <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                                    <input class="inputBox" type="text" />

                                </p>
                            </div>
                            <div class="col-md-4">
                                <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                                    <input class="inputBox" type="text" />

                                </p>
                            </div>
                            <div class="col-md-1">
                                <h3> <i class="bi bi-x"></i></h3>
                            </div>



                        </div>
                        <div class="row">
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-6">
                                <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                                    <input class="inputBox" type="text" />

                                </p>
                            </div>
                            <div class="col-md-4">
                                <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                                    <input class="inputBox" type="text" />

                                </p>
                            </div>
                            <div class="col-md-1">
                                <h3> <i class="bi bi-x"></i></h3>
                            </div>



                        </div>


                        <div class="row">
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-6">
                                <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                                    <input class="inputBox" type="text" />

                                </p>
                            </div>
                            <div class="col-md-4">
                                <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                                    <input class="inputBox" type="text" />

                                </p>
                            </div>
                            <div class="col-md-1">
                                <h3> <i class="bi bi-x"></i></h3>
                            </div>
                            <div>
                                <button class="emailButton" style="height: 30px;">+ Add Activity</button>
                            </div>


                        </div>
                    </div>
                    <div class="row" style="display: flex;">
                        <div class="col-md-6">
                            <button class="saveButton" style="background-color: #859e4f; width: 58%; height: 30px;">Save & active</button>
                            <button class="saveButton" style="background-color: #5b5b5b; width: 40%; height: 30px;">Cancel</button>
                        </div>
                    </div>
                    <hr />
                    <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                        Viewers in your room pay for activities they want to see you perform. Save
                        time by creating several presets fre different occasions. Show more </p>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="card-title" style="display: flex; justify-content: space-between; padding: 20px 0 0px 0 !important;">
                        <span>
                            <h6 style="color: #f8f8f8 !important;"><i class="bi bi-crown"></i>King of the room</h6>
                        </span>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <select class="inputBox" style="font-size: small;">
                                <option value="volvo" style="font-size: small;">Coustom Amount</option>
                                <option value="saab" style="font-size: small;">150 tk</option>
                                <option value="opel" style="font-size: small;">150 tk</option>
                                <option value="audi" style="font-size: small;">150 tk</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-10" style="margin-top:1rem ">
                        <div class="col-md-6">
                            <input class="inputBox" style="width: 100%;" />
                        </div>
                    </div>
                    <div class="row " style="display: flex; ">
                        <div class="col-md-6">
                            <button class="saveButton" style="background-color: #859e4f; width: 30%; height: 30px;">Save</button>
                            <button class="saveButton" style="background-color: #5b5b5b; width: 40%; height: 30px;">Cancel</button>
                        </div>
                    </div>
                    <hr />
                    <p class="card-text" style="color: #5b5b5b; font-size: 13px;">
                        With this setting, you decide if your room chat is for everyone, or only for - select few. Show more
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>



@endsection


@section('css')
<style>
    
    .card {
        background-color: #26272b !important;
    }

    .announce {
        display: flex;
        align-items: end;
        text-align: right;
        justify-content: end;

        @media (min-width:320px) and (max-width:420px) {
            display:inline;
            font-size: 50px !important;
        }
    }

    .saveButton {
        display: inline-block;
        /* border: 3px solid transparent; */
        border-radius: 20px;
        padding: 0px 10px;
        font-size: 14px;
        height: 38px;
        background: #5b5b5b;
        text-align: center;
        margin-top: 10px;
        color: white;
        font-weight: 600;
        border: none;
        width: 30%;

    }

    .inputBox {
        color: white;
        width: 100%;
        height: 30px;
        border: 0;
    }

    /* ::-webkit-input-placeholder {
color:white;
                } */


    .emailButton {
        height: 25px;
        width: 100%;

        @media only screen and (min-width : 320px) and (max-width : 480px) {


     color: red;


        }
    }

    .p-text {
        margin-top: -12px;
    }


</style>
@stop