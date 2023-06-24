<template>
    <div>
        <nav class="second-nav" style="margin-left: 4.3rem">
            
            <ul class="second-nav-ul">
                <li class="second-nav-li">
                    <div class="chip">
                        <div class="chip-head"></div>
                        <div class="chip-content">
                            {{ hostDetail?.user?.name }}
                        </div>
                    </div>
                </li>
                <li class="second-nav-li">
                    <a class="second-nav-a" href="javascript:void(0)"  data-bs-toggle="modal" data-bs-target="#profileModal"> Profile </a>
                </li>
                <li class="second-nav-li">
                    <a class="second-nav-a" data-bs-target="#profileModal"  href="javascript:void(0)"> Videos </a>
                </li>
                <li class="second-nav-li">
                    <a class="second-nav-a"  @click="showPhotos()"  href="#photo_album"> Photos </a>
                </li>
            </ul>
        </nav>
        
        <main id="main" class="main">
            <section class="section">
                <div class="row align-items-top">
                    <div class="col-lg-6">
                        <div class="card mb-1 h-100">
                            <div
                                class="card-body"
                                style="padding: 0; background: #3b3b3b"
                            >
                                <div class="video-group relative h-100" >
                                    <div id="remote-playerlist" :style="hostDetail.user.is_online ? 'background-image:url(/images/' +hostDetail.user.profile_image+')' : ''">
                                      
                                        <h4
                                            class="text-center stream__offline--text"
                                        >
                                           <span :class="[!hostDetail.user.is_online ? 'text-danger' : '']"> {{ hostDetail?.user?.name }} {{! hostDetail.user.is_online ? 'is offline' : '' }} </span>
                                        </h4>
                                    </div>
                                    <div
                                        class="full-screen"
                                        v-show="isStreamStarted"
                                    >

                                    <div class="ticket_show" v-if="hostDetail && hostDetail.ticket_show && hostDetail.ticket_show.status ===1  && !show_joined_by_user">
                                            <i class="bi bi-ticket-perforated"></i><br/>
                                            <h4
                                            class="text-center "
                                        >
                                        
                                            {{ hostDetail?.user?.name }} is
                                            in a ticket show
                                        </h4>
                                        <button
                                        v-if="authUser && parseInt(authUser.token) > 0"
                                        type="button"
                                        @click="joinShow"
                                        class="btn btn-warning btn-sm"
                                        >
                                        <i class="bi bi-check-circle-fill"></i> <br/>
                                        Join Now <span style="font-weight:bold">{{  hostDetail && hostDetail.ticket_show ? '/'+ hostDetail.ticket_show.token + ' tk': '' }} </span>
                                    </button>
                                    <a
                                        v-else-if="authUser && parseInt(authUser.token) <= 0"
                                        type="button"
                                        href="/buy-token"
                                        class="btn btn-warning btn-sm"
                                        >
                                        <i class="bi bi-check-circle-fill"></i> <br/>
                                       Buy Token
                                </a>
                                    <button
                                        v-else
                                        type="button"
                                        @click="showLoginModel"
                                        class="btn btn-warning btn-sm"
                                        >
                                        <i class="bi bi-check-circle-fill"></i> <br/>
                                       Login
                                    </button>
                                        </div>
                                <button
                                    type="button"
                                    id="full-screen-btn"
                                    class="btn btn-link btn-sm"
                                    data-bs-toggle="dropdown"
                                        >
                                        <i class="bi bi-gear"></i>
                                        <span class="me-2 font-size-14 dropdown-toggle d-none"></span>
                                    </button>
                                   
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile pt-0"
                                        data-popper-placement="bottom-end">
                                    <li> <a class="dropdown-item" href="#">Auto <span class="badge badge-pill">HD</span></a></li>
                                      <li>
                                     <hr class="dropdown-divider"></li>
                                     <li> <a class="dropdown-item" href="#" @click="setVideoQuality(1280,720,30)">720p <span class="badge badge-pill">HD</span></a></li>
                                     <li> <a class="dropdown-item" href="#" @click="setVideoQuality(480,480,30)">480p </a></li>
                                     <li> <a class="dropdown-item" href="#" @click="setVideoQuality(640,360,15)">360p </a></li>
                                    </ul>

                                    <i class="bi bi-volume-down font-size-16" @click="showVolme" v-if="displayVolume"></i>
                                        <i class="bi bi-volume-down font-size-16" @click="hideVolume" v-if="!displayVolume"></i>
                                        <span id="showVolumeBtn">
                                            <input
                                            type="range"
                                            min="0"
                                            id="localAudioVolume"
                                            max="100"
                                            value="100"
                                            class="transofrm"
                                            @input="setVolumn"
                                        />
                                        </span>
                                        <button
                                            @click="openFullscreen"
                                            type="button"
                                            id="full-screen-btn"
                                            class="btn btn-live btn-sm"
                                        >
                                            <i
                                                style="
                                                 transform: rotate(45deg);
                                                    font-size: 1.1rem;
                                                "
                                                id="full-screen-icon"
                                                class="bi bi-fullscreen"
                                            ></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="action_box">
                                    <div class="like">
                                        <i
                                            v-if="isLike <= 0"
                                            @click="mangeFavourite(1)"
                                            class="bi bi-heart"
                                        ></i>
                                        <i
                                            v-else
                                            class="bi bi-heart-fill"
                                            @click="mangeFavourite(0)"
                                        ></i>

                                        {{ this.totalLikes }}
                                    </div>
                                    <div class="private" v-if="isStreamStarted && !authUser">

                                        <button
                                            type="button"
                                            class="bg-dark ms-2"
                                            @click="showLoginModel()"
                                        >
                                            Join me free now
                                        </button>
                                    </div>
                                     <div class="private" v-if="isStreamStarted && authUser">

                                        <button
                                            v-if="authUser && parseInt(authUser.token) > 0"
                                            type="button"
                                            class="bg-dark ms-2"
                                            @click="placeCall()"
                                        >
                                            Private Call {{ '/'+private_call_token+'tk'}}
                                        </button>
                                        <button
                                            v-else
                                            type="button"
                                            class="bg-dark ms-2"
                                            @click="buyToken()"
                                        >
                                            Buy Token
                                        </button>
                                    </div>
                                    <div class="tip"  v-if="isStreamStarted">
                                        <button v-if="authUser"
                                        data-bs-toggle="modal"
                                        data-bs-target="#sendtipModal"
                                        @click="getHostTipMenu()"
                                        >
                                            Send Tip <i class="bi bi-geo-fill"></i>
                                        </button>  
                                        
                                        <button v-else
                                        data-bs-toggle="modal"
                                        data-bs-target="#basicModal"
                                      
                                        >
                                           Login 
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Display Goals-->
                        <div class="progress" v-if=" hostDetail.goal_token > 0 &&  hostDetail.goal">
                        <div class="progress-bar bg-progress" role="progressbar" 
                        :style="{'width': percentage +'%', 'aria-valuenow':percentage, 'aria-valuemin' : 0, 'aria-valuemax':100  }">
                        <!-- aria-valuenow="25" aria-valuemin="0" aria-valuemax="100 -->
                        <span class="ms-2 p-absolute"><i class="bi bi-bullseye"></i>  Goal: {{ hostDetail.goal_token + ' tk ' + hostDetail.goal }}</span> 
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card chat_card h-100 mt-3rem">
                            <div
                                class="modal fade"
                                id="sendtipModal"
                                tabindex="-1"
                                style="position: absolute"
                            >
                                <div
                                    class="modal-dialog modal-lg"
                                    style="margin-top: 0"
                                >
                                    <div
                                        class="modal-content"
                                        style="background: transparent"
                                    >
                                        <div class="modal-header">
                                            <span>Send Tip</span>
                                            <button
                                             ref="cancelButton" 
                                                type="button"
                                                class="customClose"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"
                                            >
                                                ×
                                            </button>
                                        </div>
                                        <div
                                            class="modal-body modal-body-all"
                                            style="border-radius: 1rem"
                                        >
                                            <div class="card chat_card">
                                                <div
                                                    class="card-header chat_card--header"
                                                >
                                                    <div class="row">
                                                        <ul
                                                            class="nav nav-tabs chat_card--tabs d-flex"
                                                            id="chat_box"
                                                            role="tablist"
                                                        >
                                                            <li
                                                                class="nav-item"
                                                                role="presentation"
                                                            >
                                                                <button
                                                                    class="nav-link w-100 chat_card--btn active"
                                                                    id="home-tab"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#tip_menu"
                                                                    type="button"
                                                                    role="tab"
                                                                    aria-controls="home"
                                                                    aria-selected="true"
                                                                >
                                                                    <i
                                                                        class="bi bi-chat-fill"
                                                                    ></i>
                                                                    &nbsp;&nbsp;
                                                                    Tip Menu
                                                                </button>
                                                            </li>
                                                            <li
                                                                class="nav-item"
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
                                                                    &nbsp;&nbsp;
                                                                    Lovense Toy
                                                                </button>
                                                            </li>
                                                            <li
                                                                class="nav-item"
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
                                                                    <i
                                                                        class="bi bi-people-fill"
                                                                    ></i>
                                                                    &nbsp;&nbsp;
                                                                    Games & Fun
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div
                                                    class="card-body position-relative chat_card--body"
                                                >
                                                    <div
                                                        class="tab-content pt-2 mt-20"
                                                        id="chat_boxContent"
                                                        style="height: 240px;
                                                            overflow-y: scroll;
                                                        "
                                                    >
                                                        <div
                                                            class="tab-pane active show px-3"
                                                            id="tip_menu"
                                                            role="tabpanel"
                                                            aria-labelledby="contact-tab"
                                                        >
                                                            <div
                                                                class="tip_box"
                                                            >
                                                                <table
                                                                    class="table"
                                                                >
                                                                    <thead>
                                                                        <tr>
                                                                            <th>
                                                                                ACTIVITY
                                                                            </th>
                                                                            <th
                                                                                style="
                                                                                    text-align: right;
                                                                                "
                                                                            >
                                                                                TOKENS
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr v-for="(value, index) in host_tip_menus" 
                                                                        :key="index">
                                                                            <td>
                                                                                {{ value.menu_title }}
                                                                            </td>
                                                                            <td style="text-align: right;"
                                                                            >
                                                                            <span class="badge badge-primary badge-pill">{{ value.token }}</span>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="token_box ms-2"
                                                        style=" height: 210px; background-color: #3b3b3b; "
                                                    >
                                                    <ul>
                                                            <li v-for="(value3, index3) in host_tip_menus" 
                                                              :key="index3">
                                                              
                                                                <label :class="[tip_menu_token_amount ? 'border-dark' : '']">
                                                                    <input
                                                                    :id="'token'+index3"
                                                                    v-model="tip_menu_token_amount"
                                                                    type="radio"
                                                                    name="token"
                                                                    :value="value3.token"
                                                                    class="d-none"
                                                                    />
                                                                    {{ value3.token }}
                                                                </label>
                                                            </li>
                                                        </ul>
                                                        <div>
                                                            <span
                                                                >Custom
                                                                Amount:</span
                                                            >
                                                            <input
                                                                v-model="tip_menu_token_amount"
                                                                type="text"
                                                            />
                                                        </div>

                                                        <div class="tip">
                                                            <button @click="sendUserTip">
                                                               {{ parseInt(authUser.token) > 0 ? 'Send Tip' : 'Buy Token' }} 
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                                @click="setActiveTab('public')"
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
                                                @click="setActiveTab('private')"
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
                                                <i
                                                    class="bi bi-people-fill"
                                                ></i>
                                                &nbsp;&nbsp; {{ total_watching }}
                                            </button>
                                        </li>
                                        <li
                                            class="nav-item flex-fill"
                                            role="presentation"
                                        > <button
                                                 id="contact-tab"
                                                class="nav-link w-100 chat_card--btn"
                                                type="button"
                                                data-bs-toggle="tab"
                                                data-bs-target="#videoCall"
                                                aria-controls="contact"
                                                role="tab"
                                            >
                                           
                                                <i class="bi bi-telephone-inbound-fill"></i>  {{  ' Call' }}
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
                                    <PublicChat
                                        :host-detail="hostDetail"
                                        :active-tab="activeTab"
                                    />
                                    <PrivateChat
                                        :auth-user="authUser"
                                        :host-detail="hostDetail"
                                        :active-tab="activeTab"
                                        @makeUserCall="makeUserCall"
                                    />
                                    <div
                                        class="tab-pane fade px-3"
                                        id="bordered-justified-contact"
                                        role="tabpanel"
                                        aria-labelledby="contact-tab"
                                    >
                                        <h6>{{  total_watching }} Watching Now</h6>
                                        <div>
                                            <span class="text-gray"
                                                >Users with tokens:
                                            </span>
                                            <span>10</span>
                                        </div>
                                        <div>
                                            <span class="text-gray"
                                                >Others:
                                            </span>
                                            <span>20</span>
                                        </div>
                                        <div
                                            class="mt-3 stream__user"
                                            v-for="n in 7"
                                            :key="n"
                                        >
                                            <span class="stream__user--level">
                                                <span>{{ n }}</span>
                                            </span>
                                            <span class="text-gray font-bold"
                                                >&nbsp;abhay sexy</span
                                            >
                                        </div>
                                    </div>

                                    <!-- video call-->
                                    <div
                                        class="tab-pane fade px-3 mt-5"
                                        id="videoCall"
                                        role="tabpanel"
                                        aria-labelledby="contact-tab"
                                    >
                                    <div class="text-center">
                                      
                                        <button
                                            v-if="authUser && parseInt(authUser.token) > 0"
                                            type="button"
                                            class="btn btn-success "
                                            @click="placeCall()"
                                        >
                                        <i class="bi bi-camera-video-fill " ></i>  Private Call {{ '/'+private_call_token+'tk'}}
                                        </button>
                                        <button
                                            v-else-if="authUser && parseInt(authUser.token) < 1"
                                            type="button"
                                            class="btn btn-primary "
                                            @click="buyToken()"
                                        >
                                        <i class="bi bi-coin"></i>  Buy Token
                                        </button>

                                        <button
                                            v-else
                                            type="button"
                                            class="btn btn-danger "
                                            @click="showLoginModel()"
                                        >
                                        <i class="bi bi-person-check"></i>  Login to make private call 
                                        </button>
                                    </div>
                                    
                                    </div>
                                    <!--End Here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="photo_album" class="mt-5 photo_album_area">
                <div class="row">
                    <div class="col-md-12">
                        My Photos
                    </div>
                    <div class="col-md-12">
                        <button type="button" class="customClose" data-bs-dismiss="modal" @click="hidePhotos" aria-label="Close" > × </button>
                        <div class="d-flex" >
                            
                                            <div v-for="(gallery,index) in host_gallery_array" :key="index">
                                                <a  href="javascript:void(0)"  data-bs-toggle="modal" :data-bs-target="'#album'+index">
                                                     <img  class="album_photo" :src="gallery.image"/> 
                                                    </a>

                                                    <div class="modal fade" :id="'album'+index" tabindex="-1">
                                                     <div class="modal-header ps-0">
                                                        <button
                                                            type="button"
                                                            class="customClose"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close"
                                                        >
                                                            ×
                                                        </button>
                                                     </div>
                                                    <div class="modal-dialog modal-xl w-100">
                                                        <div class="modal-content" style="background: transparent">
                                                            <img   :src="gallery.image"/> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                    </div>
                </div>
            </section>
            <section class="section mt-5">
                <ul
                    class="nav nav-tabs nav-tabs-bordered hostPageTabs"
                    id="borderedTab"
                    role="tablist"
                >
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link active"
                            id="home-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#bordered-home"
                            type="button"
                            role="tab"
                            aria-controls="home"
                            aria-selected="true"
                        >
                            Girl
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="profile-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#bordered-profile"
                            type="button"
                            role="tab"
                            aria-controls="profile"
                            aria-selected="false"
                            tabindex="-1"
                        >
                            Related Models
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="contact-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#bordered-contact"
                            type="button"
                            role="tab"
                            aria-controls="contact"
                            aria-selected="false"
                            tabindex="-1"
                        >
                            Recommended
                        </button>
                    </li>
                </ul>

                <div class="tab-content pt-2" id="borderedTabContent">
                    <div
                        class="tab-pane fade active show"
                        id="bordered-home"
                        role="tabpanel"
                        aria-labelledby="home-tab"
                    >
                        <div class="row align-items-top">
                            <HostItem
                                v-for="data in girls"
                                :key="data.uuid"
                                :host="data"
                            />
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="bordered-profile"
                        role="tabpanel"
                        aria-labelledby="profile-tab"
                    >
                        <div class="row align-items-top">
                            <HostItem
                                v-for="related in relateds"
                                :key="related.uuid"
                                :host="related"
                            />
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="bordered-contact"
                        role="tabpanel"
                        aria-labelledby="contact-tab"
                    >
                        <div class="row align-items-top">
                            <HostItem
                                v-for="reco in recommended"
                                :key="reco.uuid"
                                :host="reco"
                            />
                        </div>
                    </div>
                </div>
                <div class="row alignitem_center">
                    <div class="col-md-5 border_botton"></div>
                    <div class="col-md-2 text-center">
                        <button class="btn btn-default see-more-button">
                            See More
                        </button>
                    </div>
                    <div class="col-md-5 border_botton"></div>
                </div>
            </section>
            <OutgoingCallModal
                :outgoing-caller="outgoingCaller"
                :outgoing-call="outgoingCall"
                @decline="endCall"
            />

            <SignupModal />
            <LoginModal />
        </main>

        <div class="modal fade" id="profileModal" tabindex="-1">
            <div class="modal-dialog modal-xl w-100">
                <div class="modal-content" style="background: transparent">
                    <div class="modal-header ps-0">
                        <button
                            type="button"
                            class="customClose"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        >
                            ×
                        </button>
                    </div>

                    <div class="modal-body modal-body-all">
                        <section>
                            <div class="profilebackgroundImage" style="background-image: url('/img/host_cover.jpg')">
                                <div class="header-content">
                                    <div class="circleModal">
                                        <img
                                            class="user__avatar"
                                            v-if="hostDetail?.user.avatar"
                                            :src="hostDetail ? '/images/' + hostDetail.user.profile_image : ''"
                                            alt=""
                                        />
                                        <h1
                                            v-else
                                            class="d-flex justify-content-center align-items-center h-100"
                                        >
                                            <!-- {{ nameFirstLetter }} -->
                                        </h1>
                                    </div>
                                    <div style="margin: 2rem 9rem">
                                        <h4>{{ hostDetail?.user?.name }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div style="
                                    margin-top: 1rem;
                                    gap: 10px;
                                    display: flex;
                                "
                            >
                                <div class="informationDiv">
                                    <div
                                        style="
                                            display: flex;
                                            justify-content: space-between;
                                            margin-bottom: 30px;
                                        "
                                    >
                                        <div>
                                            <h5>My Information</h5>
                                        </div>
                                    
                                    </div>
                                    <div>
                                        <div class="row mb-2">
                                            <div
                                                class="col-md-3 col-3"
                                                style="color: #878787"
                                            >
                                                From:
                                            </div>
                                            <div class="col-md-6 col-6">
                                                {{ hostDetail?.user?.from }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div
                                                class="col-md-3 col-3"
                                                style="color: #878787"
                                            >
                                                About:
                                            </div>
                                            <div class="col-md-6 col-6">
                                                {{ hostDetail?.user.about }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div
                                                class="col-md-3 col-3"
                                                style="color: #878787"
                                            >
                                                DOB:
                                            </div>
                                            <div class="col-md-6 col-6">
                                                {{ hostDetail?.user.dob }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div
                                                class="col-md-3 col-3"
                                                style="color: #878787"
                                            >
                                                Language:
                                            </div>
                                            <div class="col-md-6 col-6">
                                                {{ hostDetail?.language?.name }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div
                                                class="col-md-3 col-3"
                                                style="color: #878787"
                                            >
                                                Specific:
                                            </div>
                                            <div class="col-md-6 col-6">
                                                {{ hostDetail?.specific?.name }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div
                                                class="col-md-3 col-3"
                                                style="color: #878787"
                                            >
                                                Subculture:
                                            </div>
                                            <div class="col-md-6 col-6">
                                                {{ hostDetail?.subculture?.name }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div
                                                class="col-md-3 col-3"
                                                style="color: #878787"
                                            >
                                                Interested In:
                                            </div>
                                            <div class="col-md-6 col-6">
                                                {{ hostDetail?.interested_in }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div
                                                class="col-md-3 col-3"
                                                style="color: #878787"
                                            >
                                                Country:
                                            </div>
                                            <div class="col-md-6 col-6">
                                                {{ hostDetail?.country?.name }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div
                                                class="col-md-3 col-3"
                                                style="color: #878787"
                                            >
                                                State:
                                            </div>
                                            <div class="col-md-6 col-6">
                                                {{ hostDetail?.state?.name }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
                            </div>
                            <!-- <img src="{{ asset('img/messages-1.jpg') }}" class="card-img-top" alt="..."> -->
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <DummyC></DummyC>
</template>

<script>
import HostItem from "@/Components/HostItem.vue";
import PublicChat from "@/Components/PublicChat.vue";
import PrivateChat from "@/Components/PrivateChat.vue";
import SignupModal from "@/Components/SignupModal.vue";
import LoginModal from "@/Components/LoginModal.vue";
import OutgoingCallModal from "./Chat/Shared/OutgoingCallModal.vue";
export default {
    name: "HostDetail",
    components: {
        SignupModal,
        PrivateChat,
        PublicChat,
        HostItem,
        LoginModal,
        OutgoingCallModal,
    },
    emits:['host-page'],
    props: [
        "hosts",
        "hostDetail",
        "like",
        "totalLike",
        "girls",
        "relateds",
        "recommended",
        "channel",
        "appId",
    ],
    data() {
        return {
            db: "",
            chatKey: "public-chat",
            show_joined_by_user: false,
            tip_menu_token_amount: 20,
            messages: [],
            isLike: this.$props.like,
            totalLikes: this.$props.totalLike,
            client: "",
            localTracks: "",
            remoteTracks: "",
            localTrackState: "",
            options: "",
            remoteUsers: {},
            token: "",
            uid: "",
            totalJoined: 0,
            isStreamStarted: false,
            outgoingCallAudio: "",
            outgoingCall: false,
            callPlaced: false,
            outgoingCaller: "",
            activeTab: "",
            displayVolume: true,
            total_watching: 0,
            host_tip_menus: [],
            host_gallery_array: [],
            private_call_token: null
        };
    },
   
    async mounted() {
        if(this.hostDetail) {
            this.getPrivateToken();
        }
        $("#mic-btn").prop("disabled", true);
        $("#video-btn").prop("disabled", true);
        // add event listener to play remote tracks when remote user publishs.
        this.client = AgoraRTC.createClient({
            mode: "live",
            codec: "vp8",
        });
        this.token = await this.generateToken();

        // var app_id = "c2725af707a64a6eba4806f5cb712ed9";
        // this.options = {
        //     appId: app_id,
        //     channel: this.$props.hostDetail.user_id,
        //     uid: this.$props.hostDetail.user_id,
        //     token: this.token,
        //     role: "audience",
        // };
        var channel = this.hostDetail.user_id;
        var role = "audience";
        var app_id = "c2725af707a64a6eba4806f5cb712ed9";
        this.options = {
            token: this.token,
            appId: app_id,
            channel: channel,
            uid: this.uid,
            role: role,
        };
        this.client.setClientRole(this.options.role);
        // $("#mic-btn").prop("disabled", false);
        // $("#video-btn").prop("disabled", false);
        this.options.uid = await this.client.join(
            this.options.appId,
            this.options.channel,
            this.token,
            this.options.uid
        );

        this.remoteTracks = {
            videoTrack: null,
            audioTrack: null,
        };

        this.client.on("user-published", (user, mediaType) => {
            console.log(user, 'published');
            let remoteUser = this.client.remoteUsers;
            // console.error("published", this.client.remoteUsers[0].uid);
            this.subscribe(remoteUser[0], mediaType);
            this.isStreamStarted = true;
            this.setVideoQuality();
            
           
        });
        this.client.on("user-left", (evt) => {
            this.isStreamStarted = false;
            if (!evt.videoTrack) {
                const player = $(`<h4
                                        class="text-center stream__offline--text"
                                    >
                                        ${this.hostDetail?.user?.name} is offline
                                    </h4>`);
                $("#remote-playerlist").html(player);
            }
        });
        this.client.on("liveStreamingStarted", function (evt) {
            console.error("Live streaming started", evt);
        });
        this.client.on("unpublished", function (evt) {
            console.error("un Publish local stream successfully", evt);
        });
        this.client.on("unsubscribe", function (evt) {
            console.error("un subscribe local stream successfully", evt);
        });
        this.client.on("peer-leave", function (evt) {
            console.error(
                "Remote stream has left the channel: " + evt.stream.getId()
            );
        });
        this.client.on("stream-added", function (evt) {
            console.warn("stream added", evt);
            this.client.subscribe(evt.stream, handleError);
        });
        this.client.on("stream-removed", function (evt) {
            console.error("remove stream", evt);
        });
        this.client.on("stream-subscribed", function (evt) {
            console.warn("stream subscribed");
            let stream = evt.stream;
            let streamId = String(stream.getId());
            this.addVideoStream(streamId);
            stream.play(streamId);
        });
        // if (this.options.role === "audience") {
        //     console.log("user is audience");
        //     $("#mic-btn").prop("disabled", true);
        //     $("#video-btn").prop("disabled", true);
        //     // add event listener to play remote tracks when remote user publishs.
        //     this.client.on("user-published", this.handleUserPublished);
        //     this.client.on("user-joined", this.handleUserJoined);
        //     this.client.on("user-left", this.handleUserLeft);
        // }
        // this.client.on("user-published", this.handleUserPublished);
        // this.client.on("user-joined", this.handleUserJoined);
        // this.client.on("user-left", this.handleUserLeft);
        // $("#remote-playerlist").html("");
        //   const ref = this.db.ref(this.chatKey);
        //   ref.child("message")
        //       .on("value", (msg) => {
        //         try {
        //           let data = msg.val();
        //           data = Object.values(data);
        //           console.log("value changing", data);
        //           // if (msg.exists()) {
        //           if (data && data.length > 0) {
        //             console.log("len 1", data);
        //             this.messages = data;
        //           }
        //           // }
        //           // if (msg.exists()) {
        //           // console.log("len > 1", data);
        //           // this.messages = data;
        //           // }
        //         } catch (error) {
        //         }
        //       });

        // get audience for current host 
        this.getRemoteUsers();
        // get Host Gallery 
        this.getHostGallery();
    },
    computed: {
         percentage(percent, total) {
            return ((this.hostDetail.goal_token/ this.hostDetail.user.token) *100).toFixed(2)
         },
        authUser() {
            return this.$page.props.auth?.user;
        },
    },
    methods: {
        getPrivateToken() {
            try {
                axios.get("/checker/host/private-call-token/"+this.hostDetail.user_id).then((resp)=> {
                    this.private_call_token = resp.data.token;
                    });
                    } catch (error) {
                        console.log(error);
                    }
        },  
        makeUserCall() {
            this.placeCall();
        },
        buyToken() {
            window.location.href='/buy-token'
        }, 
        sendUserTip() {
            try {
                axios.post("/user/send-tip", {
                    user_id: this.authUser.uuid,
                    host_id: this.hostDetail.user_id,
                    token_amount: this.tip_menu_token_amount,
                }).then((resp)=>{
                    this.$refs.cancelButton.click();
                   console.log(resp);
                    if(resp.data.status!=='success') {
                      window.location.href = "/buy-token";
                      
                    } else {
                      this.message = 'tipped ' + this.tip_menu_token_amount + ' tk';
                      this.send();
                      this.sended_tip = true;
                    }
                   
                  
                });
                } catch (error) {
                    console.log(error);
                }
           
        },
        joinShow() {
            try {
            axios.post("/checker/user/join/ticket-show", {
                host_id:this.hostDetail.user_id,
                user_id:this.authUser.uuid,
                show_id:this.hostDetail.ticket_show.uuid,
        }).then((resp)=> {
            this.show_joined_by_user = true;
            this.client.remoteUsers[0].audioTrack.play();
            });
            } catch (error) {
                console.log(error);
            }
        },
        showPhotos() {
            document.getElementById("photo_album").style.display='block';
        },
        hidePhotos() {
            document.getElementById("photo_album").style.display='none';
        },
        async getRemoteUsers() {
           await axios.get('https://api.agora.io/dev/v1/channel/user/'+this.appId+'/'+ this.options.channel, {
           response_type: 'code',
           headers:{Authorization:'Basic MDdhN2ZmNjRjNDk5NDI1Yjk4MTAzMzc1MTFiMTFlNTk6YTM3M2U2OTBiZTY4NDdjY2I0NDg1OWU2NzJmNjcxYjA='},
               }).then(response => {
                   let values = Object.values(response.data);
                   if(values) {
                    this.total_watching = values[1].audience_total;
                   }
              
               }).catch(error => {
               console.log("ERROR: " + error);
        });
       },
        showLoginModel() {
        $("#basicModal").modal("show");
        },
        async setVideoQuality(width=1280, height=720, frameRate=30) {
            let  videoTrack = {
                localVideoTrack:null
            }
            videoTrack.localVideoTrack =
                    await AgoraRTC.createCameraVideoTrack({
                        encoderConfig: 
                        {
                        width: width,
                        // Specify a value range and an ideal value
                        height: height,
                        frameRate: frameRate,
                        bitrateMin: 600, bitrateMax: 2000,
                        },
                        optimizationMode:'motion'                        
                    });

                // // publish local tracks to channel
                // await this.client.publish(Object.values(videoTrack));
        },
        showVolme() {
                this.displayVolume =  false;
                document.getElementById('showVolumeBtn').style.display='block';
        },
        hideVolume() {
                this.displayVolume =  true;
                document.getElementById('showVolumeBtn').style.display='none';
        },
       async getLiveUserCount() {
            await axios.get('https://www.linkedin.com/oauth/v2/authorization', {
            headers: {
                'username': 'header value',
            },
            }).then(response => {
            console.log("INFO: " + response);
            }).catch(error => {
            console.log("ERROR: " + error);
            });
        },
        setActiveTab(tab) {
            this.activeTab = tab;
        },
        listenDeclinecall() {
            Echo.channel("decline-agora-video").listen(
                ".declineVideoCall",
                ({ data }) => {
                    if (data.channelName == this.channel) {
                        this.outgoingCall = false;
                        this.outgoingCallAudio.pause();
                        $("#outgoingCall").modal("hide");
                    }
                }
            );
        },

        listenAcceptcall() {
            Echo.channel("accept-agora-video").listen(
                ".acceptVideoCall",
                ({ data }) => {
                    console.log("call accepted", data);
                    if (data.channelName == this.channel) {
                        window.location.href =
                            "/video-call/" + data.channelName;
                    }
                }
            );
        },
        getHostGallery() {
            try {
                       axios.get("/host/gallery/" + this.hostDetail.user_id).then((resp)=> {
                            this.host_gallery_array = resp.data.gallery;
                        })
                    } catch (error) {
                        console.log(error);
                    }
        },
        async placeCall() {
            if (this.authUser) {
                if (this.authUser?.token > 10) {
                    try {
                        await axios.post("/agora/call-user", {
                            user_to_call: this.hostDetail.user_id,
                            channel_name: this.channel,
                        });

                        this.outgoingCaller = this.hostDetail?.user?.name;
                        this.outgoingCall = true;
                        $("#outgoingCall").modal("show");
                        this.listenDeclinecall();
                        this.listenAcceptcall();
                        this.outGoingcallStart();
                    } catch (error) {
                        console.log(error);
                    }
                } else {
                    window.location.href = "/buy-token";
                }
            } else {
                $("#basicModal").modal("show");
            }
        },
        outGoingcallStart() {
            this.outgoingCallAudio = new Audio(
                "https://assets.mixkit.co/active_storage/sfx/1354/1354-preview.mp3"
            );
            this.outgoingCallAudio.play();
            this.outgoingCall = true;
            if (this.outgoingCall == true)
                setInterval(() => {
                    this.outgoingCall = false;
                    $("#outgoingCall").modal("hide");
                    this.callPlaced = false;
                    this.outgoingCallAudio.pause();
                }, 1000 * 30);
        },

        endCall() {
            $("#outgoingCall").modal("hide");
            this.callPlaced = false;
            this.outgoingCallAudio.pause();
        },
        async generateToken() {
            const res = await axios.post("/user/generate-token", {
                channelName: this.hostDetail.user_id,
            });
            this.uid = res.data.uid;
            return res.data.token;
        },
        async mangeFavourite(type) {
            this.isLike = type;
            var tokenRes = await axios.post("/manage-favourite", {
                type: type,
                host_id: this.$props.hostDetail.uuid,
                host_user_id: this.$props.hostDetail.user_id,
            });
            console.log(tokenRes.data);
            this.totalLikes = tokenRes.data ?? 0;
        },

        getHostTipMenu() {
            try {
                this.removeBackdrop();
                axios.get("/host-tip-menu/?host_id="+this.hostDetail.user_id).then((resp)=> {
                    // console.log(resp);
                    this.host_tip_menus = resp.data.host_tip_menu;
                });
                
            } catch (error) {
                console.log(error);
            }
         },

        removeBackdrop() {
            $(".modal-backdrop.fade.show").removeClass("modal-backdrop");
        },
        async joinChannel() {
            // create Agora client
            this.client.setClientRole(this.options.role);
            // $("#mic-btn").prop("disabled", false);
            // $("#video-btn").prop("disabled", false);
            this.options.uid = await this.client.join(
                this.options.appId,
                this.options.channel,
                this.token,
                this.options.uid
            );

            if (this.options.role === "host") {
                // $("#mic-btn").prop("disabled", true);
                // $("#video-btn").prop("disabled", true);
                // add event listener to play remote tracks when remote user publishs.
                this.client.on("user-published", this.handleUserPublished);
                this.client.on("user-joined", this.handleUserJoined);
                this.client.on("user-left", this.handleUserLeft);
            }
            // join the channel
        },
        async subscribe(user, mediaType) {
            const uid = user.uid;
            // subscribe to a remote user
            await this.client.subscribe(user, mediaType);
            if (mediaType === "video") {
                this.remoteTracks.videoTrack = user.videoTrack;
                this.remoteTracks.audioTrack = user.audioTrack;
                const player = $(`
      <div id="player-wrapper-${uid}" style="height: 100%">
        <div id="player-${uid}" class="player" style="width: 100%;height: 100%"></div>
      </div>
    `);
                $("#remote-playerlist").html(player);
                user.videoTrack.play(`player-${uid}`);
            }
            if (mediaType === "audio") {
                if(this.hostDetail && this.hostDetail.ticket_show && this.hostDetail.ticket_show.status!==1) {
                    user.audioTrack.play()
                }
            }
        },
        setVolumn(evt) {
            this.remoteTracks.audioTrack.setVolume(parseInt(evt.target.value));
        },
        handleUserPublished(user, mediaType) {
            console.warn("user", user);
            const id = user.uid;
            this.remoteUsers[id] = user;
            this.subscribe(user, mediaType);
        },
        addVideoStream(elementId) {
            let remoteContainer = document.getElementById("remote-playerlist");
            // Creates a new div for every stream
            let streamDiv = document.createElement("div");
            // Assigns the elementId to the div.
            streamDiv.id = elementId;
            // Takes care of the lateral inversion
            streamDiv.style.transform = "rotateY(180deg)";
            // Adds the div to the container.
            remoteContainer.appendChild(streamDiv);
        },
        // Handle user joined
        handleUserJoined(user, mediaType) {
            const id = user.uid;
            this.remoteUsers[id] = user;
            this.subscribe(user, mediaType);
        },
        // Handle user left
        handleUserLeft(user) {
            const id = user.uid;
            delete this.remoteUsers[id];
            $(`#player-wrapper-${id}`).remove();
        },
        openFullscreen() {
            const elem = document.querySelector(".agora_video_player");
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.webkitRequestFullscreen) {
                /* Safari */
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) {
                /* IE11 */
                elem.msRequestFullscreen();
            }
        },
    },
};
</script>

<style>
.text-danger {
    color: #a2262e !important;
}
.album_photo {
    width: 200px;
    padding: 20px 0px;
    margin-right: 20px;
}
.photo_album_area {
    display:none;
}
.mt-3rem {
    margin-top: 0px;
}
.badge-pill {
    background-color: #a2262e;
}
.font-size-14 {
    font-size: 14px;
}
.dropdown-menu-arrow::before {
    display: none
}
.stream__offline--text {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    color: #fff;
    height: 100%;
    position: absolute;
    background: rgba(57, 57, 57, 0.86);
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
}
</style>
<style scoped>
.ticket_show {
    position: absolute;
    /* position: absolute; */
    /* position: relative; */
    text-align: center;
    align-items: center;
    justify-content: center;
    left: 0;
    right: -20px;
   top:0;
   bottom: 0;
    font-size: 70px;
    backdrop-filter: blur(20px);
    opacity: .9;
    height: 580px;
}
.ticket_show i{
    position: absolute;
    left: 0;
    right: 0;
    top: 10%;
}
.ticket_show h4{ 
    position: absolute;
    left: 0;
    right: 0;
    top: 25%;
}
.ticket_show .btn{ 
    position: relative;
    left: 0;
    right: 0;
    top: 15%;
    width: 200px;
    z-index: 999;
}
.btn-live {
    color: #fff;
}

.action_box {
    display: flex;
    color: #958d8d;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background: transparent;
    font-weight: 500;
    font-size: 14px;
    position: absolute;
    width: 100%;
    bottom: 0;
}
.progress {
    background-color: #3f3838;
    height: 30px;
    display: block;
}
.p-absolute {
    position: absolute;
}

.bg-progress {
    background-color: #91102e;
    height: 100%;
}


/*Chrome*/
@media screen and (-webkit-min-device-pixel-ratio:0) {
    input[type='range'] {
      overflow: hidden;
      width: 80px;
      -webkit-appearance: none;
      background-color: #9a905d;
    }
    
    input[type='range']::-webkit-slider-runnable-track {
      height: 10px;
      -webkit-appearance: none;
      color: #a2262e;
      margin-top: -1px;
    }
    
    input[type='range']::-webkit-slider-thumb {
      width: 10px;
      -webkit-appearance: none;
      height: 10px;
      cursor: ew-resize;
      background: #434343;
      box-shadow: -80px 0 0 80px #a2262e;
    }

}
/** FF*/
input[type="range"]::-moz-range-progress {
  background-color: #a2262e; 
}
input[type="range"]::-moz-range-track {  
  background-color: #9a905d;
}
/* IE*/
input[type="range"]::-ms-fill-lower {
  background-color: #a2262e; 
}
input[type="range"]::-ms-fill-upper {  
  background-color: #9a905d;
}

.action_box .like {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.action_box .like i {
    font-size: 20px;
    margin-right: 9px;
    cursor: pointer;
}

.action_box .private button {
    margin-bottom: 0px;
    border: 2px solid #a1a1a1;
    border-radius: 20px;
    padding: 5px 15px;
    background: #821e25;
    color: #fff;
}
.action_box .private button:hover{
     background: #821e25 !important;
}

.action_box .tip button {
    margin-bottom: 0px;
    border: 2px solid #a1a1a1;
    border-radius: 20px;
    padding: 5px 15px;
    background: #79943d;
    color: #fff;
}

.bi-heart-fill {
    color: #ff2c3a;
}

.hostPageTabs li button {
    color: #a4a4a4;
    font-weight: 500;
    font-size: 16px;
    background: none;
}

.font-size-16 {
    font-size: 25px;
}
.hostPageTabs li button.active {
    background: none;
    color: #fff;
}

.hostPageTabs li button:hover {
    color: #fff;
}

.hostPageTabs {
    border-bottom: none;
}

.player {
    width: 100%;
    height: 500px;
}

.hostPageTabs li button.active {
    background: none;
    color: #fff;
}

.hostPageTabs li button:hover {
    color: #fff;
}

.hostPageTabs {
    border-bottom: none;
}

#sendtipModal .modal-header {
    background: #212121;
    border-radius: 0px;
    padding: 10px 15px;
}

#sendtipModal .card-header {
    background: #000001;
    border-radius: 0px;
    padding-top: 5px;
}

.token_box label {
    background: #191919;
    padding: 8px;
    font-size: 18px;
    font-weight: 600;
    min-width: 60px;
    text-align: center;
    border-radius: 12px;
    cursor: pointer;
}
.border-dark {
    border: 2px solid #396220 !important;
}

.token_box ul {
    padding-inline-start: 0px;
    display: flex;
    overflow-x: scroll;
}

.token_box ul li {
    list-style: none;
    margin-top: 15px;
    margin-right: 15px;
    margin-bottom: 15px;
}

.token_box input {
    width: 75%;
    margin-left: 15px;
    height: 45px;
    border-radius: 27px;
    background: #000;
    border-color: #000;
    color: #fff;
    text-align: center;
}

.token_box button {
    margin-bottom: 0px;
    border: 2px solid #a1a1a1;
    border-radius: 20px;
    padding: 10px 25px;
    background: #79943d;
    color: #fff;
    margin-left: 0px;
}

#remote-playerlist {
    height: 100%;
}

.full-screen {
    position: absolute;
    width: 100%;
    top: 5px;
    right: 16px;
    display: flex;
    justify-content: flex-end;
    align-items: center;
}

#full-screen-btn {
    cursor: pointer;
}

/* .header {
    min-height: 150px;
} */

#fileinput1 {
    display: none;
}

.fileClass {
    display: inline-block;
    border: 3px solid green;
    border-radius: 20px;
    padding: 3px 10px;
    font-size: 12px;
}

.profile {
    text-decoration: none;
    border: none;
    background: none;
    color: white;
}

.level {
    text-decoration: none;
    border: none;
    background: none;
    color: white;
    margin-left: 3rem;
}

.profilebackgroundImage {
    background-image: url("/img/host_cover.jpg");
    border-top-left-radius: calc(0.42rem - 1px);
    border-top-right-radius: calc(0.42rem - 1px);
    height: 30rem;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    padding: 0;
    position: relative;
}

.header-content {
    display: flex;
    position: absolute;
    bottom: 0;
    /* left: 0; */
    background: #222222;
    width: 100%;
    height: 5rem;
}

.circleModal {
    position: absolute;
    bottom: 20%;
    width: 8rem;
    height: 8rem;
    border-radius: 50%;
    background-color: #26272b;
    border: 6px solid #9f9f9f;
    /* margin-left: 10px; */
    font-size: 10px;
    line-height: 80px;
    text-align: center;
    margin: auto;
}

.informationDiv {
    background-color: #26272b;
    width: 40%;
    padding: 1rem 1rem;
}


#showVolumeBtn {
    display: none;
}
.PrfileDiv2 {
    background-color: #26272b;
    width: 60%;
    padding: 1rem 1rem;
}
.PrfileDiv2 .profile__img {
    width: 10rem;
    height: 6rem;
    object-fit: cover;
}
.user__avatar {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}
.profile__img_actions {
    margin-top: 1rem;
}
.profile__img_actions button {
    background: var(--primary);
    border-radius: 2rem;
    padding: 0.3rem 1.3rem;
}
#profileModal .modal-dialog{
  max-width: 100%;
}

@media (max-width: 700px) {
    .video-group {
    min-height: 200px;
}
.mt-3rem {
    margin-top: 3rem !important;
}
}

</style>
