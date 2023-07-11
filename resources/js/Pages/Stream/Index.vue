<template>
    <Section1
        :auth-user="authUser"
        :host-details="host"
        :users="users"
        :agoraChannel="agoraChannel"
        :agora-id ="agora_id"
        :authuserid="authUser.uuid"
        :appCertificate="appCertificate"
        :currentUser="currentUser"
        :isCustomer="isCustomer"
        :ticket-show-details="ticketShowDetails"
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
                                    class="inputBox mb-2"
                                    placeholder="I love show"
                                    type="text"
                                    quoted_printable_decode
                                    v-model="goal"
                                    :disabled="!disableGoalFied && goal!==null"
                                    @focus="disableGoalFied=true"
                                />
                            </div>
                            <div class="col-md-4">
                                <input
                                    class="inputBox mb-2"
                                    placeholder="1104"
                                    type="text"
                                    v-model="goalToken"
                                    :disabled="!disableGoalFied && goalToken!==null"
                                    @focus="disableGoalFied=true"
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
                                @click="disableGoalFied=true"
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
                                <h6 style="color: #f8f8f8 !important">Ticket Show Token</h6>
                            </span>
                            
                        </div>
                        <hr />
                        <div class="row">
                            <!-- <div class="col-md-8">
                                <input id="appt-time" required  type="time" class="timepicker" name="appt-time" :v-model="ticketShowTime" />
                               
                            </div> -->
                            <div class="col-md-8">
                                <input
                                    class="timepicker ps-2 mb-2"
                                    placeholder="Enter Ticket Show Token"
                                    required
                                    type="text"
                                    v-model="ticketShowToken"
                                    style="width: 100%"
                                    :disabled="ticketShowToken!==null && !disableTokenShow"
                                    @focus="disableTokenShow=true"
                                />
                            </div>
                        </div>
                        <div class="d-flex">
                            <!-- <div class="col-md-6"> -->
                            <button
                                @click="setTicketShowPrice()"
                                class="saveButton"
                                style="background-color: #859e4f"
                            >
                                Save
                            </button>
                            <button
                                class="saveButton ml-2"
                                style="background-color: #5b5b5b"
                                @click="disableTokenShow=true"
                            >
                                Cancel
                            </button>
                        </div>

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
                                    :disabled="!disableTopicField && todayTopic"
                                    @focus="disableTopicField=true"
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
                                @click="disableTopicField=true"
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


                <!-- Set Private Token Start-->
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
                                <h6 style="color: #f8f8f8 !important">Private Call <img src="/assets/coin2.png" width="18" class="mb-4px" /></h6>
                            </span>
                            
                        </div>
                        <hr />
                        <div class="row">
                            <!-- <div class="col-md-8">
                                <input id="appt-time" required  type="time" class="timepicker" name="appt-time" :v-model="ticketShowTime" />
                               
                            </div> -->
                            <div class="col-md-12">
                                <select
                                    name="activity"
                                    v-model="private_call_token"
                                    class="inputBox"
                                    style="font-size: small"
                                    :disabled="!disablePrivateCallField && private_call_token"
                                    @change="setPrivateCallToken($event)"
                                >
                                    <option
                                        value="10"
                                        style="font-size: small"
                                    >
                                       10 tk
                                    </option>
                                    <option
                                        value="15"
                                        style="font-size: small"
                                    >
                                    15 tk
                                    </option>
                                    <option
                                        value="18"
                                        style="font-size: small"
                                    >
                                    18 tk
                                    </option>
                                    <option
                                        value="20"
                                        style="font-size: small"
                                    >
                                    20 tk
                                    </option>
                                    <option
                                        value="25"
                                        style="font-size: small"
                                    >
                                    25 tk
                                    </option>
                                    <option
                                        value="30"
                                        style="font-size: small"
                                    >
                                    30 tk
                                    </option>
                                    <option
                                        value="35"
                                        style="font-size: small"
                                    >
                                    35 tk
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex">
                            <!-- <div class="col-md-6"> -->
                            <button
                                @click="privateCallToken"
                                class="saveButton"
                                style="background-color: #859e4f"
                            >
                                Save
                            </button>
                            <button
                                class="saveButton ml-2"
                                style="background-color: #5b5b5b"
                                @click="disablePrivateCallField=true"
                            >
                                Cancel
                            </button>
                        </div>

                    </div>
                </div>
                <!-- End  Private Token-->
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div
                            class="card-title"
                            style=" display: flex;
                                justify-content: space-between;
                                padding: 20px 0 0px 0 !important;
                            "
                        >
                            <span>
                                <h6 style="color: #f8f8f8 !important">
                                    <i class="bi bi-geo-fill"></i>   Tip menu
                                </h6>
                            </span>
                             <span>
                                <h6 style="color: #f8f8f8 !important">
                                    <a  href="#" data-bs-toggle="modal"
        data-bs-target="#tipMenuModel"
        @click="showtipMenu()"> <i class="bi bi-list"></i>  </a>
                                </h6>
                            </span>
                        </div>
                        <div
                                class="modal fade"
                                id="tipMenuModel"
                                tabindex="-1"
                            >
                                <div
                                    class="modal-dialog modal-lg"
                                    style="margin-top: 0"
                                >
                                    <div
                                        class="modal-content"
                                        style="background: transparent"
                                    >
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
                                                                                style="text-align: right"
                                                                            >
                                                                                TOKENS
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr  v-for="(value2, index2) in host_tip_menus" 
  :key="index2">
                                                                      <td>
                                                                          {{ value2.menu_title }}
                                                                      </td>
                                                                      <td
                                                                          style="text-align: right"
                                                                      >
                                                                      {{ value2.token }}
                                                                      </td>
                                                                  </tr>
                                                                  
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                
                            </div>
                                </div>
                               
                            </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-12">
                                <p
                                        class="card-text mb-0 mt-2"
                                        style="color: #5b5b5b; font-size: 13px"
                                    >
                                        Activity
                                    </p>
                                <select
                                    name="activity"
                                    v-model="activity_name"
                                    class="inputBox"
                                    style="font-size: small"
                                    @change="setActivity($event)"
                                >
                                    <option
                                        value="Love"
                                        style="font-size: small"
                                    >
                                       Love
                                    </option>
                                    <option
                                        value="Mood"
                                        style="font-size: small"
                                    >
                                       Mood
                                    </option>
                                    <option
                                        value="Kiss"
                                        style="font-size: small"
                                    >
                                        Kiss
                                    </option>
                                </select>

                                <p
                                        class="card-text mb-0 mt-2"
                                        style="color: #5b5b5b; font-size: 13px"
                                    >
                                        PRICE , <img src="/assets/coin2.png" width="18" class="mb-4px" />
                                    </p>

                                    <input class="inputBox" v-model="token_amount" type="text" />
                            </div>
                        </div>
                        <div class="d-flex">
                            <button
                                class="saveButton"
                                style="background-color: #859e4f"
                                @click="saveHostTipMenu"
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
import EventBus from '../../event-bus';
import Swal from 'sweetalert2';
export default {
    components: { Section1, Loading},
    props: {
        users: {
            type: Array,
            default: () => [],
        },
        host: {
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
    emits:['project-created'],
    data() {
        return {
            goal: "",
            goalToken: "",
            todayTopic: "",
            isLoading: false,
            private_call_token: 10,
            topicError: "",
            activity_name: "Love",
            token_amount:null,
            host_tip_menus:[],
            ticketShowTime: new Date(),
            ticketShowToken:null,
            show_start:[],
            disableGoalFied:false,
            disableTokenShow:false,
            disableTopicField:false,
            disablePrivateCallField:false,
            ticketShowDetails:null,
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
            this.getHostTipMenu();
            this.getPrivateToken();
            this.getHostTicketShowToken();
           
        }

    },
    methods: {
        getHostTicketShowToken() {
        try {
        axios.get("/checker/host/details/ticket-show-token/"+this.authUser.model.uuid).then((resp)=> {
            this.ticketShowToken = resp.data.ticket_show.token;
            this.ticketShowDetails = resp.data.ticket_show;
            });
            } catch (error) {
                console.log(error);
            }
        },
        privateCallToken() {
        try {
        axios.post("/checker/host/update/private-call-token", {
            host_id:this.authUser.uuid,
            token:this.private_call_token,
        }).then((resp)=> {
            this.private_call_token = resp.data.token;
            this.disablePrivateCallField = false;
            Swal.fire(
            'Private Token Saved',
            '',
            'success'
            )
            });
            } catch (error) {
                console.log(error);
            }
        },  
        getPrivateToken() {
            try {
                axios.get("/checker/host/private-call-token/"+this.authUser.uuid).then((resp)=> {
                    this.private_call_token = resp.data.token;
                    });
                    } catch (error) {
                        console.log(error);
                    }
        },  
        
        startTicketShow() {
        try {
        axios.post("/checker/host/start/ticket-show", {
            host_id:this.authUser.model.uuid,
            token:this.ticketShowToken,
            start_time:this.ticketShowTime,
        }).then((resp)=> {
            this.show_start = resp.data.ticket_show;
            this.disableTokenShow = false;
            Swal.fire(
                'Token Saved',
                '',
                'success'
            )
            });
            } catch (error) {
                console.log(error);
            }
        },
        setTicketShowPrice() {
        try {
        axios.post("/checker/host/start/ticket-show", {
            host_id:this.authUser.model.uuid,
            token:this.ticketShowToken,
            start_time:this.ticketShowTime,
            status:0,
        }).then((resp)=> {
            this.show_start = resp.data.ticket_show;
            this.disableTokenShow = false;
            Swal.fire(
                'Token Saved',
                '',
                'success'
            )
            });
            } catch (error) {
                console.log(error);
            }
        },
        stopTicketShow() {
        try {
        axios.post("/checker/host/end/ticket-show", {
            show_id:this.show_start.uuid,
        }).then((resp)=> {
        
            });
            } catch (error) {
                console.log(error);
            }
        },
        getHostTipMenu() {
            try {
                axios.get("/host-tip-menu/?host_id="+this.authUser.uuid).then((resp)=> {
                    // console.log(resp);
                    this.host_tip_menus = resp.data.host_tip_menu;
                    if(this.host_tip_menus) {
                        let values = this.host_tip_menus.find(node=> node.menu_title.toUpperCase() === 'LOVE');
                        this.token_amount = values.token;
                        this.activity_name = values.menu_title;
                    }
                    });
                
                } catch (error) {
                    console.log(error);
                }
    },
    setActivity(event) {
            if(event.target.value) {
                let values = this.host_tip_menus.find(node=> node.menu_title.toUpperCase() === event.target.value.toUpperCase());
                if(values) {
                    this.token_amount = values.token;
                    this.activity_name = values.menu_title;
                } else {
                    this.token_amount = null;
                }
              
            }
        },
        saveHostTipMenu() {
            if(this.activity_name && this.token_amount > 0) {
                try {
                axios.post("/host/create/host-tip-menu", {
                    host_id: this.authUser.uuid,
                    menu_title: this.activity_name,
                    token: this.token_amount,
                }).then((resp)=>{
                    // this.activity_name = 'Love';
                    // this.token_amount = null;
                    this.getHostTipMenu();
                    Swal.fire(
                        'Tip Saved',
                        '',
                        'success'
                        )
                });
                } catch (error) {
                    console.log(error);
                }
            }
           
        },
        saveGoal() {
            // this.isLoading = true;
            if (this.goal && this.goalToken) {
                axios
                    .post("/goals", {
                        goal: this.goal,
                        goal_token: this.goalToken,
                    })
                    .then((res) => {
                        this.isLoading = false;
                        this.disableGoalFied = false;
                        Swal.fire(
                        'Goal Saved',
                        '',
                        'success'
                        )
                    });
            }
        },
        async saveTopic() {
            if (this.todayTopic) {
                this.isLoading = true;
                try {
                    const res = await axios.post("/save-topic", {
                        today_topic: this.todayTopic,
                    }).then((resp) => {
                        this.disableTopicField = false;
                        Swal.fire(
                        'Topic Saved',
                        '',
                        'success'
                        )
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
input:disabled, select:disabled{
    opacity: 0.6;
}
.timepicker {
    width: 100%;
    height: 35px;
}
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
