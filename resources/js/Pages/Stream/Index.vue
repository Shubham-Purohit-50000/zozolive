<template>
    <Section1
        :auth-user="authUser"
        :users="users"
        :agoraChannel="agoraChannel"
        :authuserid="authuserid"
        :appCertificate="appCertificate"
        :currentUser="currentUser"
        :isCustomer="isCustomer"
    />
    <section>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div
                            class="card-title"
                            style="
                                display: flex;
                                justify-content: space-between;
                                padding: 20px 0 0px 0 !important;
                            "
                        >
                            <span>
                                <h6 style="color: #f8f8f8 !important">Goal</h6>
                            </span>
                            <span>
                                <div class="form-check form-switch">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        id="flexSwitchCheckChecked"
                                        checked
                                    />
                                </div>
                            </span>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-8">
                                <input
                                    class="inputBox"
                                    placeholder="I love show"
                                    type="text"
                                    quoted_printable_decode
                                    v-model="goal"
                                />
                            </div>
                            <div class="col-md-4">
                                <input
                                    class="inputBox"
                                    placeholder="1104"
                                    type="text"
                                    v-model="goalToken"
                                    style="width: 100%"
                                />
                            </div>
                            <!-- <div>
                                <button
                                    class="emailButton"
                                    style="height: 30px"
                                >
                                    + Add Goal
                                </button>
                            </div> -->
                        </div>
                        <div class="d-flex">
                            <!-- <div class="col-md-6"> -->
                            <button
                                @click="saveGoal"
                                class="saveButton"
                                style="background-color: #859e4f"
                            >
                                Save
                            </button>
                            <button
                                class="saveButton ml-2"
                                style="background-color: #5b5b5b"
                            >
                                Cancel
                            </button>
                            <!-- </div> -->

                            <!-- <div class="announce col-md-6">
                                <i class="bi bi-send-fill"></i>Announce in chat
                            </div> -->
                        </div>
                        <hr />
                        <p
                            class="card-text"
                            style="color: #5b5b5b; font-size: 13px"
                        >
                            Motivate users in your chat room to tip by
                            announcing a special public performance once the
                            desired number of tokens is reached. You can add
                            upto 5 goals.
                            <a href="#">
                                <u style="color: #5b5b5b">Show More</u>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div
                            class="card-title"
                            style="
                                display: flex;
                                justify-content: space-between;
                                padding: 20px 0 0px 0 !important;
                            "
                        >
                            <span>
                                <h6 style="color: #f8f8f8 !important">
                                    <i class="bi bi-joystick"></i> Interactive
                                    Toys
                                </h6>
                            </span>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-8">
                                <span>
                                    <p style="color: #f8f8f8 !important">
                                        Lovense
                                    </p>
                                    <p class="p-text" style="color: #5b5b5b">
                                        Your lovnese is not cancelled
                                    </p>
                                </span>
                            </div>

                            <div
                                class="col-md-4"
                                style="display: flex; justify-content: end"
                            >
                                <button
                                    style="
                                        height: 27px;
                                        width: 35px;
                                        background: #5b5b5b;
                                        color: white;
                                    "
                                >
                                    <i class="bi bi-info-circle"></i>
                                </button>
                            </div>
                            <!-- <div>
                                                        <button class="emailButton" style="height: 30px;">+ Add Goal</button>
                                                </div> -->
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-8">
                                <span>
                                    <p style="color: #f8f8f8 !important">
                                        Kiiroo
                                    </p>
                                    <p class="p-text" style="color: #5b5b5b">
                                        Your Kiiroo is not cancelled
                                    </p>
                                </span>
                            </div>

                            <div
                                class="col-md-4"
                                style="display: flex; justify-content: end"
                            >
                                <button
                                    style="
                                        height: 27px;
                                        width: 35px;
                                        background: #5b5b5b;
                                        color: white;
                                    "
                                >
                                    <i class="bi bi-gear-fill"></i>
                                </button>
                            </div>
                            <!-- <div>
                                                        <button class="emailButton" style="height: 30px;">+ Add Goal</button>
                                                </div> -->
                        </div>
                        <hr />

                        <p
                            class="card-text"
                            style="color: #5b5b5b; font-size: 13px"
                        >
                            Motivate users in your chat room to tip by
                            announcing a special public performance once the
                            desired number of tokens is reached. You can add
                            upto 5 goals.
                            <a href="#">
                                <u style="color: #5b5b5b">Show More</u>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div
                            class="card-title"
                            style="
                                display: flex;
                                justify-content: space-between;
                                padding: 20px 0 0px 0 !important;
                            "
                        >
                            <span>
                                <h6 style="color: #f8f8f8 !important">
                                    <i class="bi bi-twitter"></i>Twitter
                                    Autopost
                                </h6>
                            </span>
                            <span>
                                <div class="form-check form-switch">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        id="flexSwitchCheckChecked"
                                        checked
                                    />
                                </div>
                            </span>
                        </div>
                        <hr />

                        <p
                            class="card-text"
                            style="color: #5b5b5b; font-size: 13px"
                        >
                            This massage will be automatically posted to your
                            Twitter when you go live
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div
                            class="card-title"
                            style="
                                display: flex;
                                justify-content: space-between;
                                padding: 20px 0 0px 0 !important;
                            "
                        >
                            <span>
                                <h6 style="color: #f8f8f8 !important">
                                    <i class="bi bi-megaphone"></i> Topic of
                                    today show
                                </h6>
                            </span>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-12">
                                <input
                                    class="inputBox"
                                    placeholder="Topic"
                                    type="text"
                                    v-model="todayTopic"
                                />
                            </div>
                        </div>
                        <div class="d-flex">
                            <button
                                class="saveButton"
                                @click="saveTopic"
                                style="background-color: #859e4f"
                            >
                                Save
                            </button>
                            <button
                                class="saveButton ml-2"
                                style="background-color: #5b5b5b"
                            >
                                Cancel
                            </button>
                        </div>
                        <hr />
                        <p
                            class="card-text"
                            style="color: #5b5b5b; font-size: 13px"
                        >
                            Describe your chat room and everything that happens
                            in it. Share the type of activities you will perform
                            in the chat room and announce shows. Keep it
                            show/profile related.
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div
                            class="card-title"
                            style="
                                display: flex;
                                justify-content: space-between;
                                padding: 20px 0 0px 0 !important;
                            "
                        >
                            <span>
                                <h6 style="color: #f8f8f8 !important">
                                    <i class="bi bi-camera-reels"></i>Record
                                    Show
                                </h6>
                            </span>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-9">
                                <span>
                                    <p style="color: #f8f8f8 !important">
                                        Allow recording public Shows
                                    </p>
                                    <p class="p-text" style="color: #5b5b5b">
                                        Set the price for users to record your
                                        public shows. Users' recordings go to
                                        their collections. By allowing to record
                                        public shows, you agree to our Terms ol
                                        Use
                                    </p>
                                </span>
                            </div>

                            <div
                                class="col-md-3"
                                style="display: flex; justify-content: end"
                            >
                                <div class="form-check form-switch">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        id="flexSwitchCheckChecked"
                                        checked
                                    />
                                </div>
                            </div>
                            <!-- <div>
                                                        <button class="emailButton" style="height: 30px;">+ Add Goal</button>
                                                </div> -->
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <span>
                                    <p style="color: #f8f8f8 !important">
                                        Price, tk/min
                                    </p>
                                    <select
                                        class="inputBox"
                                        style="width: 16%; font-size: small"
                                    >
                                        <option
                                            value="volvo"
                                            style="font-size: small"
                                        >
                                            150 tk
                                        </option>
                                        <option
                                            value="saab"
                                            style="font-size: small"
                                        >
                                            150 tk
                                        </option>
                                        <option
                                            value="opel"
                                            style="font-size: small"
                                        >
                                            150 tk
                                        </option>
                                        <option
                                            value="audi"
                                            style="font-size: small"
                                        >
                                            150 tk
                                        </option>
                                    </select>
                                </span>
                            </div>
                        </div>

                        <div class="row">
                            <p
                                class="card-text"
                                style="color: #5b5b5b; font-size: 13px"
                            >
                                If you start a Private show, the recording of
                                your public show stops for evervone,
                            </p>
                            <div class="d-flex">
                                <button
                                    class="saveButton"
                                    style="background-color: #859e4f"
                                >
                                    Save
                                </button>
                                <button
                                    class="saveButton ml-2"
                                    style="background-color: #5b5b5b"
                                >
                                    Cancel
                                </button>
                            </div>
                        </div>
                        <hr style="margin-top: 1rem" />
                        <div class="row">
                            <div class="col-md-9">
                                <span>
                                    <p style="color: #f8f8f8 !important">
                                        Allow recording public Shows
                                    </p>
                                </span>
                            </div>

                            <div
                                class="col-md-3"
                                style="display: flex; justify-content: end"
                            >
                                <div class="form-check form-switch">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        id="flexSwitchCheckChecked"
                                        checked
                                    />
                                </div>
                            </div>
                        </div>

                        <p
                            class="card-text"
                            style="color: #5b5b5b; font-size: 13px"
                        >
                            Your viewers can save recorded shows to their
                            collection. You also get the recording and can make
                            it available for tokens in you profile <br />
                            NOTE: Exclusive Private show recordings are
                            available only to the user
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div
                            class="card-title"
                            style="
                                display: flex;
                                justify-content: space-between;
                                padding: 20px 0 0px 0 !important;
                            "
                        >
                            <span>
                                <h6 style="color: #f8f8f8 !important">
                                    <i class="bi bi-chat-left-quote"></i>who can
                                    chat
                                </h6>
                            </span>
                        </div>
                        <hr />
                        <div class="col-md-12">
                            <select class="inputBox" style="font-size: small">
                                <option value="volvo" style="font-size: small">
                                    REgistered users with verified emails
                                </option>
                                <option value="saab" style="font-size: small">
                                    150 tk
                                </option>
                                <option value="opel" style="font-size: small">
                                    150 tk
                                </option>
                                <option value="audi" style="font-size: small">
                                    150 tk
                                </option>
                            </select>
                        </div>
                        <div class="d-flex">
                            <button
                                class="saveButton"
                                style="background-color: #859e4f"
                            >
                                Save
                            </button>
                            <button
                                class="saveButton ml-2"
                                style="background-color: #5b5b5b"
                            >
                                Cancel
                            </button>
                        </div>
                        <hr />
                        <p
                            class="card-text"
                            style="color: #5b5b5b; font-size: 13px"
                        >
                            With this setting, you decide if your room chat is
                            for everyone, or only for - select few. Show more
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div
                            class="card-title"
                            style="
                                display: flex;
                                justify-content: space-between;
                                padding: 20px 0 0px 0 !important;
                            "
                        >
                            <span>
                                <h6 style="color: #f8f8f8 !important">
                                    <i class="bi bi-list"></i>Tip menu
                                </h6>
                            </span>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-12">
                                <select
                                    class="inputBox"
                                    style="font-size: small"
                                >
                                    <option
                                        value="volvo"
                                        style="font-size: small"
                                    >
                                        Preset 1
                                    </option>
                                    <option
                                        value="saab"
                                        style="font-size: small"
                                    >
                                        150 tk
                                    </option>
                                    <option
                                        value="opel"
                                        style="font-size: small"
                                    >
                                        150 tk
                                    </option>
                                    <option
                                        value="audi"
                                        style="font-size: small"
                                    >
                                        150 tk
                                    </option>
                                </select>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-6">
                                    <p
                                        class="card-text"
                                        style="color: #5b5b5b; font-size: 13px"
                                    >
                                        Activity
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p
                                        class="card-text"
                                        style="color: #5b5b5b; font-size: 13px"
                                    >
                                        PRICE , tk
                                    </p>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ml-1 pr-0">
                                    <p
                                        class="card-text"
                                        style="color: #5b5b5b; font-size: 13px"
                                    >
                                        <input class="inputBox" type="text" />
                                    </p>
                                </div>
                                <div class="col-md-4 pl-2 pr-0">
                                    <p
                                        class="card-text"
                                        style="color: #5b5b5b; font-size: 13px"
                                    >
                                        <input class="inputBox" type="text" />
                                    </p>
                                </div>
                                <div class="col-md-1 close_btn">
                                    <h3><i class="bi bi-x"></i></h3>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <button
                                class="saveButton"
                                style="background-color: #859e4f"
                            >
                                Save & active
                            </button>
                            <button
                                class="saveButton ml-2"
                                style="background-color: #5b5b5b"
                            >
                                Cancel
                            </button>
                        </div>
                        <hr />
                        <p
                            class="card-text"
                            style="color: #5b5b5b; font-size: 13px"
                        >
                            Viewers in your room pay for activities they want to
                            see you perform. Save time by creating several
                            presets fre different occasions. Show more
                        </p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div
                            class="card-title"
                            style="
                                display: flex;
                                justify-content: space-between;
                                padding: 20px 0 0px 0 !important;
                            "
                        >
                            <span>
                                <h6 style="color: #f8f8f8 !important">
                                    <i class="bi bi-crown"></i>King of the room
                                </h6>
                            </span>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-12">
                                <select
                                    class="inputBox"
                                    style="font-size: small"
                                >
                                    <option
                                        value="volvo"
                                        style="font-size: small"
                                    >
                                        Coustom Amount
                                    </option>
                                    <option
                                        value="saab"
                                        style="font-size: small"
                                    >
                                        150 tk
                                    </option>
                                    <option
                                        value="opel"
                                        style="font-size: small"
                                    >
                                        150 tk
                                    </option>
                                    <option
                                        value="audi"
                                        style="font-size: small"
                                    >
                                        150 tk
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-10" style="margin-top: 1rem">
                            <div class="col-md-6">
                                <input class="inputBox" style="width: 100%" />
                            </div>
                        </div>
                        <div class="d-flex">
                            <button
                                class="saveButton"
                                style="background-color: #859e4f"
                            >
                                Save
                            </button>
                            <button
                                class="saveButton ml-2"
                                style="background-color: #5b5b5b"
                            >
                                Cancel
                            </button>
                        </div>
                        <hr />
                        <p
                            class="card-text"
                            style="color: #5b5b5b; font-size: 13px"
                        >
                            With this setting, you decide if your room chat is
                            for everyone, or only for - select few. Show more
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <loading
            v-model:active="isLoading"
            :can-cancel="true"
            loader="dots"
            color="#a2262e"
        />
    </section>
</template>

<script>
import Section1 from "./Shared/Section1.vue";
import Loading from "vue-loading-overlay";
import "vue-loading-overlay/dist/css/index.css";

export default {
    components: { Section1, Loading },
    props: {
        users: {
            type: Array,
            default: () => [],
        },
        authuseruid: {
            type: [String, Number],
        },
        authuserid: {
            type: String,
        },
        agora_id: {
            type: String,
        },
        appCertificate: {
            type: String,
        },
        currentUser: {
            type: String,
        },
        agoraChannel: {
            type: String,
        },
        isCustomer: {
            type: Boolean,
        },
    },
    data() {
        return {
            goal: "",
            goalToken: "",
            todayTopic: "",
            isLoading: false,
            topicError: "",
        };
    },
    computed: {
        authUser() {
            return this.$page.props.auth.user;
        },
    },
    mounted() {
        if (this.authUser) {
            this.goal = this.authUser?.model?.goal;
            this.goalToken = this.authUser?.model?.goal_token;
            this.todayTopic = this.authUser?.model?.today_topic;
        }
    },
    methods: {
        saveGoal() {
            this.isLoading = true;
            if (this.goal && this.goalToken) {
                axios
                    .post("/goals", {
                        goal: this.goal,
                        goal_token: this.goalToken,
                    })
                    .then((res) => {
                        this.isLoading = false;
                        console.log("res", res.data);
                    });
            }
        },
        async saveTopic() {
            if (this.todayTopic) {
                this.isLoading = true;
                try {
                    const res = await axios.post("/save-topic", {
                        today_topic: this.todayTopic,
                    });
                } catch (error) {
                    this.topicError = error.response;
                }
                this.isLoading = false;
            }
        },
    },
};
</script>

<style scoped>
.row > * {
    padding-right: 0 !important;
}
.close_btn {
    cursor: pointer;
}
.card {
    background-color: #26272b !important;
}

.announce {
    display: flex;
    align-items: flex-end;
    text-align: right;
    justify-content: flex-end;

    @media (min-width: 320px) and (max-width: 420px) {
        display: inline;
        font-size: 50px !important;
    }
}

.saveButton {
    display: inline-block;
    /* border: 3px solid transparent; */
    border-radius: 6px;
    padding: 0.5rem 0.9rem;
    font-size: 14px;
    /* height: 38px; */
    background: #5b5b5b;
    text-align: center;
    margin-top: 10px;
    color: white;
    font-weight: 600;
    border: none;
    /* width: 30%; */
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

    @media only screen and (min-width: 320px) and (max-width: 480px) {
        color: red;
    }
}

.p-text {
    margin-top: -12px;
}
</style>
