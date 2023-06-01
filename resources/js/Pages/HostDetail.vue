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
                    <a class="second-nav-a" href="#"> Videos </a>
                </li>
                <li class="second-nav-li">
                    <a class="second-nav-a" href="#"> Photos </a>
                </li>
            </ul>
        </nav>
        <main id="main" class="main">
            <section class="section">
                <div class="row align-items-top">
                    <div class="col-lg-6">
                        <div class="card h-100">
                            <div
                                class="card-body"
                                style="padding: 0; background: #3b3b3b"
                            >
                                <div class="video-group relative h-100">
                                    <div id="remote-playerlist">
                                        <h4
                                            class="text-center stream__offline--text"
                                        >
                                            {{ hostDetail?.user?.name }} is
                                            offline
                                        </h4>
                                    </div>
                                    <div
                                        class="full-screen"
                                        v-show="isStreamStarted"
                                    >
                                        <input
                                            type="range"
                                            min="0"
                                            id="localAudioVolume"
                                            max="100"
                                            value="100"
                                            @input="setVolumn"
                                        />
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
                                                class="fas fa-arrows-alt"
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
                                    <div class="private" v-if="isStreamStarted">

                                        <button
                                            type="button"
                                            class="bg-dark ms-2"
                                            @click="placeCall"
                                        >
                                            Join me free now
                                        </button>
                                    </div>
                                    <div class="tip" v-if="isStreamStarted">
                                        <button
                                        data-bs-toggle="modal"
                                        data-bs-target="#sendtipModal"
                                        @click="removeBackdrop()"
                                        >
                                            Send Tip
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card chat_card h-100">
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
                                                        style="
                                                            height: 240px;
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
                                                                        <tr>
                                                                            <td>
                                                                                Test
                                                                                data
                                                                            </td>
                                                                            <td
                                                                                style="
                                                                                    text-align: right;
                                                                                "
                                                                            >
                                                                                650
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                Test
                                                                                data
                                                                            </td>
                                                                            <td
                                                                                style="
                                                                                    text-align: right;
                                                                                "
                                                                            >
                                                                                650
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                Test
                                                                                data
                                                                            </td>
                                                                            <td
                                                                                style="
                                                                                    text-align: right;
                                                                                "
                                                                            >
                                                                                650
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                Test
                                                                                data
                                                                            </td>
                                                                            <td
                                                                                style="
                                                                                    text-align: right;
                                                                                "
                                                                            >
                                                                                650
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                Test
                                                                                data
                                                                            </td>
                                                                            <td
                                                                                style="
                                                                                    text-align: right;
                                                                                "
                                                                            >
                                                                                650
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                Test
                                                                                data
                                                                            </td>
                                                                            <td
                                                                                style="
                                                                                    text-align: right;
                                                                                "
                                                                            >
                                                                                650
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                Test
                                                                                data
                                                                            </td>
                                                                            <td
                                                                                style="
                                                                                    text-align: right;
                                                                                "
                                                                            >
                                                                                650
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                Test
                                                                                data
                                                                            </td>
                                                                            <td
                                                                                style="
                                                                                    text-align: right;
                                                                                "
                                                                            >
                                                                                650
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                Test
                                                                                data
                                                                            </td>
                                                                            <td
                                                                                style="
                                                                                    text-align: right;
                                                                                "
                                                                            >
                                                                                650
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                Test
                                                                                data
                                                                            </td>
                                                                            <td
                                                                                style="
                                                                                    text-align: right;
                                                                                "
                                                                            >
                                                                                650
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                Test
                                                                                data
                                                                            </td>
                                                                            <td
                                                                                style="
                                                                                    text-align: right;
                                                                                "
                                                                            >
                                                                                650
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                Test
                                                                                data
                                                                            </td>
                                                                            <td
                                                                                style="
                                                                                    text-align: right;
                                                                                "
                                                                            >
                                                                                650
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                Test
                                                                                data
                                                                            </td>
                                                                            <td
                                                                                style="
                                                                                    text-align: right;
                                                                                "
                                                                            >
                                                                                650
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                Test
                                                                                data
                                                                            </td>
                                                                            <td
                                                                                style="
                                                                                    text-align: right;
                                                                                "
                                                                            >
                                                                                650
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                Test
                                                                                data
                                                                            </td>
                                                                            <td
                                                                                style="
                                                                                    text-align: right;
                                                                                "
                                                                            >
                                                                                650
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                Test
                                                                                data
                                                                            </td>
                                                                            <td
                                                                                style="
                                                                                    text-align: right;
                                                                                "
                                                                            >
                                                                                650
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                Test
                                                                                data
                                                                            </td>
                                                                            <td
                                                                                style="
                                                                                    text-align: right;
                                                                                "
                                                                            >
                                                                                650
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="token_box"
                                                        style="
                                                            height: 210px;
                                                            background-color: #3b3b3b;
                                                        "
                                                    >
                                                        <ul>
                                                            <li>
                                                                <label>
                                                                    20
                                                                    <input
                                                                        type="radio"
                                                                        name="token"
                                                                        class="d-none"
                                                                    />
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                    20
                                                                    <input
                                                                        type="radio"
                                                                        name="token"
                                                                        class="d-none"
                                                                    />
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                    20
                                                                    <input
                                                                        type="radio"
                                                                        name="token"
                                                                        class="d-none"
                                                                    />
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                    20
                                                                    <input
                                                                        type="radio"
                                                                        name="token"
                                                                        class="d-none"
                                                                    />
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                    20
                                                                    <input
                                                                        type="radio"
                                                                        name="token"
                                                                        class="d-none"
                                                                    />
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                    20
                                                                    <input
                                                                        type="radio"
                                                                        name="token"
                                                                        class="d-none"
                                                                    />
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                    20
                                                                    <input
                                                                        type="radio"
                                                                        name="token"
                                                                        class="d-none"
                                                                    />
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                    20
                                                                    <input
                                                                        type="radio"
                                                                        name="token"
                                                                        class="d-none"
                                                                    />
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                    20
                                                                    <input
                                                                        type="radio"
                                                                        name="token"
                                                                        class="d-none"
                                                                    />
                                                                </label>
                                                            </li>
                                                        </ul>
                                                        <div>
                                                            &nbsp;&nbsp;<span
                                                                >Custom
                                                                Amount:</span
                                                            >
                                                            <input
                                                                type="text"
                                                            />
                                                        </div>

                                                        <div class="tip">
                                                            <button>
                                                                Buy Token
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
                                                &nbsp;&nbsp; {{ totalJoined }}
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
                                    />
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section">
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
                            <div class="profilebackgroundImage" :style="`background-image: url(${hostDetail?.cover_image})`">
                                <div class="header-content">
                                    <div class="circleModal">
                                        <img
                                            class="user__avatar"
                                            v-if="hostDetail?.user.avatar"
                                            :src="hostDetail?.user.avatar"
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
                            <div
                                style="
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
                                <div class="PrfileDiv2">
                                    <div
                                        style="
                                            display: flex;
                                            justify-content: space-between;
                                        "
                                    >
                                        <div>My Photos</div>
                                    </div>
                                    <div v-if="hostDetail?.user?.avatar">
                                        <img
                                            :src="hostDetail?.user?.avatar"
                                            alt=""
                                            class="profile__img"
                                        />
                                    </div>
                                    <div v-else>
                                        <p class="text-center mt=3">
                                            Not Found
                                        </p>
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
    props: [
        "hosts",
        "hostDetail",
        "like",
        "totalLike",
        "girls",
        "relateds",
        "recommended",
        "channel",
    ],
    data() {
        return {
            db: "",
            chatKey: "public-chat",
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
        };
    },
    // created() {
    //   this.db = firebase.database();
    // },
    async mounted() {
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
            let remoteUser = this.client.remoteUsers;
            // console.error("published", this.client.remoteUsers[0].uid);
            this.subscribe(remoteUser[0], mediaType);
            this.isStreamStarted = true;
            // this.subscribe(remoteUser[0], "audio");
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
    },
    computed: {
        authUser() {
            return this.$page.props.auth?.user;
        },
    },
    methods: {
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
                user.audioTrack.play();
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
.stream__offline--text {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    color: var(--primary);
}
</style>
<style scoped>
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
    background: lightgray;
    padding: 8px;
    font-size: 18px;
    font-weight: 600;
    min-width: 100px;
    text-align: center;
    border-radius: 12px;
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
    margin-left: 35px;
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
    margin-left: 10px;
}

#remote-playerlist {
    height: 100%;
}

.full-screen {
    position: absolute;
    width: 100%;
    top: 0;
    right: -6px;
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
    background-image: url("/img/messages-1.jpg");
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
    width: 60%;
    padding: 1rem 1rem;
}

.PrfileDiv2 {
    background-color: #26272b;
    width: 40%;
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

</style>
