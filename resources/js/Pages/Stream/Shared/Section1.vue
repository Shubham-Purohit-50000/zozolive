<template>
    <section class="section mt-4">
        <div class="row align-items-top mb-3">
            <div class="col-lg-6">
                <div class="card h-100 stream_wrapper">
                    <div class="card-body" style="padding: 0">
                        <!-- <div class="col"> -->
                        <div class="row video-group h-100">
                            <div class="col relative h-100">
                                <div
                                    id="local-player"
                                    class="player h-100"
                                ></div>
                                <div v-show="isStreamStarted">
                                    <div
                                        class="d-flex justify-content-center align-items-center stream_toggle_btn"
                                    >
                                    <!-- <select id = "videoDevices" ></select> -->
                                        <button
                                            @click="muteMic"
                                            type="button"
                                            id="mic-btn"
                                            class="btn btn-live btn-sm"
                                        >
                                            <i
                                                id="mic-icon"
                                                class="fas fa-microphone"
                                            ></i>
                                        </button>
                                        <button
                                            @click="offVideo"
                                            type="button"
                                            id="video-btn"
                                            class="btn btn-live btn-sm"
                                        >
                                            <i
                                                id="video-icon"
                                                class="fas fa-video"
                                            ></i>
                                        </button>

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
                            </div>
                            <div class="w-100"></div>
                            <!-- <div class="col">
                                <div id="remote-playerlist"></div>
                            </div> -->
                        </div>

                        <!-- </div> -->
                        <!-- <video style="width: 100%; height: 495px" controls="">
                            <source
                                src="/assets/img/videofile.mp4"
                                type="video/mp4"
                            />
                        </video> -->
                        <div class="action_box">
                            <div class="private d-flex">
                                <button
                                    @click="join"
                                    v-if="!isStreamStarted"
                                    class="ms-2  start_stream_btn"
                                >
                                <i class="bi bi-camera-reels-fill"></i> Start
                                </button> 
                               
                                <button
                                    @click="stopStream"
                                    v-else
                                    class="start_stream_btn"
                                >
                                    Stop
                                </button>
                                <button
                                v-if="isStreamStarted && show_started"
                                @click="stopTicketShow"
                                class="ms-2 start_stream_btn"
                            >
                            <i class="bi bi-ticket-perforated"></i>  End Show <span style="font-weight:bold">{{  hostDetails.ticket_show ? '/'+ hostDetails.ticket_show.token : '' }} </span>
                             <img v-if ="hostDetails.ticket_show"
                                src="/assets/coin2.png" width="18" class="mb-2px" />
                            </button>
                            <button
                                v-if="isStreamStarted && !show_started"
                                @click="startTicketShow"
                                class="ms-2 start_stream_btn"
                            >
                            <i class="bi bi-ticket-perforated"></i>  Start Show <span style="font-weight:bold">{{  hostDetails.ticket_show ? '/'+ hostDetails.ticket_show.token: '' }} 
                                <img v-if ="hostDetails.ticket_show"
                                src="/assets/coin2.png" width="18" class="mb-2px" /></span>
                            </button>
                            </div>
                            <!-- <div class="tip"><button>Send Tip</button></div> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card chat_card h-100">
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
                                        id="public-chat-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#public-chat-box"
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
                                        id="private-chat-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#private-chat-box"
                                        type="button"
                                        role="tab"
                                        aria-controls="private-chat"
                                        aria-selected="false"
                                    >
                                        <i class="bi bi-chat-heart-fill"></i>
                                        &nbsp;&nbsp; Private &nbsp;
                                        {{ totalUnread }}
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
                                        &nbsp;&nbsp; {{ total_watching }}
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
                            <div
                                class="tab-pane fade active show"
                                id="public-chat-box"
                                role="tabpanel"
                                aria-labelledby="public-chat-tab"
                            >
                                <ul class="messages__box">
                                    <li
                                        class="messages__box--message left"
                                        v-for="(msg, i) in messages"
                                        :key="i"
                                    >
                                    <div v-if="msg.msg.includes('tipped')" class="text-center">
                    <span v-if="msg.user_token">
                     <a  :style="{'color':msg.level_data ? msg.level_data.color : ''}" href="#" @click="showToast(msg.user_token)"> {{  msg.send_by_user }}  </a>
                  </span>
                  <span v-else>
                    {{  msg.send_by_user }} 
                  </span>
                  {{ msg.msg }} <img src="/assets/coin2.png" width="18" class="mb-4px" />
                  
                  </div>

                  <div v-else>
                    <span v-if="msg.user_token">
                     <a  :style="{'color':msg.level_data ? msg.level_data.color : ''}" href="#" @click="showToast( msg.user_token)"> {{  msg.send_by_user }}  </a>
                  </span>
                  <span v-else>
                   <span :class="[msg.send_by === authUser.uuid ? 'message__text' : '']"> {{  msg.send_by_user }} </span>
                  </span>
                  {{ msg.msg }}
                  
                  </div>

                  <div class="toast" :id="'liveToast'+msg.user_token" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                        <!-- <img src="..." class="rounded me-2" alt="..."> -->
                        <span class="badge me-auto" :style="{'background-color':msg.level_data ? msg.level_data.color : ''}">Level : {{ msg.level_data ? msg.level_data.level : null  }}</span>
                        <span class="badge  badge-pill badge-primary"><span class="text-white">Tk : </span>{{ msg.user_token }}</span> 
                        
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" @click="closeToast(msg.user_token)">
                            <i class=" bi bi-x-lg"></i>
                        </button>
                        </div>
                        <div class="toast-body">
                        <small>Subscribed Plan : <span :style="{'color':msg.level_data ? msg.level_data.color : ''}"> {{ msg.level_data ? msg.level_data.name : null  }} </span>  </small>

                        <!-- <button class="btn btn-primary btn-sm">{{  Reply }}</button> -->
                        </div>
                    </div>
                  </li>
                                </ul>
                                <div class="my-2 chat__box top_postion_chat_box">
                                    <div class="input-group chat__box--wrapper">
                                        <input
                                            type="text"
                                            class="form-control chat__box--input"
                                            placeholder="Public message"
                                            aria-label="Public message"
                                            aria-describedby="basic-addon2"
                                            v-model="message"
                                            @keyup.enter="send"
                                        />
                                        <div class="input-group-append">
                                            <button
                                                class="btn input-group-text chat__box--btn"
                                                type="button"
                                                @click="send"
                                                id="basic-addon2"
                                            >
                                                <i class="bi bi-send"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                id="private-chat-box"
                                class="tab-pane fade h-100"
                                role="tabpanel"
                                aria-labelledby="private-chat-tab"
                            >
                                <div
                                    class="card card-custom h-100"
                                    style="overflow-x: hidden"
                                    v-if="!selectedUser"
                                >
                                    <div
                                        class="card-body p-0 overflow-y-auto users__list"
                                    >
                                        <ChatUser
                                            v-for="user in allUsers"
                                            :key="user.uuid"
                                            :user="user"
                                            :selected-user="selectedUser"
                                            @updateUserList="updateUserList"
                                            @updateTotalUnread="
                                                updateTotalUnread
                                            "
                                            @updateUserOnlineStatus="
                                                updateUserOnlineStatus
                                            "
                                            @userSelected="userSelected"
                                            :auth-user="authUser"
                                        />
                                    </div>
                                </div>
                                <div class="card card-custom h-100 msgs__list">
                                    <Message
                                        classes="h-100"
                                        styles="height: 74%;overflow-y: auto"
                                        headerStyle="padding: 8px; display: flex"
                                        v-if="selectedUser"
                                        :selected-user="selectedUser"
                                        :auth-user="authUser"
                                        :agoraChannel="agoraChannel"
                                        :authuserid="authuserid"
                                        :appCertificate="appCertificate"
                                        :currentUser="currentUser"
                                        :isCustomer="isCustomer"
                                    >
                                        <div>
                                            <button
                                                type="button"
                                                class="btn back_btn"
                                                @click="showUserList"
                                            >
                                                <i class="bi bi-arrow-left"></i>
                                            </button>
                                        </div>
                                    </Message>
                                </div>
                            </div>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <IncomingCallModal
            @decline="declineCall(joinChannel)"
            @accept="acceptCall(joinChannel)"
            :incoming-call="incomingCall"
            :incoming-caller="incomingCaller"
        />
    </section>
</template>

<script>
import ChatUser from "@/Pages/Chat/Shared/ChatUser.vue";
import Message from "@/Pages/Chat/Shared/Message.vue";
import firebase from "@/firebase";
import IncomingCallModal from "@/Pages/Chat/Shared/IncomingCallModal.vue";
import Swal from 'sweetalert2';
export default {
    name: "Section1",
    components: {
        ChatUser,
        Message,
        IncomingCallModal,
    },
  
    props: {
        authUser: Object,
        users: Array,
        authuseruid: {
            type: [String, Number],
        },
        hostDetails: {
            type: Object,
        },
        authuserid: {
            type: String,
        },
        agoraId: {
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
            client: "",
            localTracks: "",
            localTrackState: "",
            options: "",
            streamBtnText: "Start Stream",
            isStreamStarted: false,
            show_started: false,
            ticket_show: null,
            remoteUsers: {},
            token: "",
            uid: "",
            ref: "",
            chatKey: "public-chats",
            privateChatKey: "",
            message: "",
            messages: [],
            selectedUser: "",
            allUsers: this.$props.users,
            totalUnread: 0,
            incomingCallAudio: "",
            incomingCallerUid: "",
            joinChannel: "",
            incomingCaller: "",
            incomingCallerUid: "",
            channelUid: "",
            incomingCall: false,
            videoDevicesDropDown: null,
            displayVolume: true,
            total_watching: 0,
        };
    },
    created() {
        // this.db = firebase.database();
        // .get();
        //   const ref = this.db.ref();
        this.ref = firebase.database().ref();

//         AgoraRTC.getDevices()
// .then(devices => 
// {
   
//     const videoDevices = devices.filter(function(device)
//     {
//         return device.kind === "videoinput";
//     });
//     console.log(videoDevices);
//     // audioDevicesDropDown = document.getElementById("audioDevices");
//     this.videoDevicesDropDown = document.getElementById("videoDevices");
//     for (let i = 0; i < videoDevices.length; i++) 
//     {
//         var option = document.createElement("option");
//         option.text = videoDevices[i].label;
//         option.value = videoDevices[i].deviceId;
//        this.videoDevicesDropDown.appendChild(option)
//     }
// });


    },
    provide() {
        return {
            userRole: this.userRole,
        };
    },
    computed: {
        hostKey() {
            return this.authUser?.model?.uuid;
        },
        userRole() {
            return this.$page.props.auth.user_role;
        },
        totalWatching() {
            if (this.isStreamStarted) {
                console.log("users", this.client.remoteUsers);
                return this.client.remoteUsers;
            }
            return 0;
        },
    },

    async mounted() {

      
        $(document).mouseleave(function() {
            // To disable f5
            /* jQuery < 1.7 */
        $(document).bind("keydown", disableF5);
        /* OR jQuery >= 1.7 */
        $(document).on("keydown", disableF5);

        // To re-enable f5
        /* jQuery < 1.7 */
        $(document).unbind("keydown", disableF5);
       /* OR jQuery >= 1.7 */
       $(document).off("keydown", disableF5);
       // Mouse has left the screen
        console.log('Mouse left the screen');
        if($('video')[0]) {
            Swal.fire({
        title: 'Are you stoping video streaming ?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
        customClass: {
            actions: 'my-actions',
            cancelButton: 'order-1 right-gap',
            confirmButton: 'order-2',
            denyButton: 'order-3',
        }
        }).then((result) => {
        if (result.isConfirmed) {
           window.location.reload();
        } else if (result.isDenied) {
            Swal.fire('Thanks', '', 'info')
        }
        })
        }
        // Additional actions you want to perform
        });

        // slight update to account for browsers not supporting e.which
        function disableF5(e) { if ((e.which || e.keyCode) == 116) e.preventDefault(); };



        this.setHostOffline();
        this.ref
            .child(this.chatKey)
            .child(this.hostKey)
            .on("value", (msg) => {
                try {
                    let data = msg.val();
                    // if (msg.exists()) {
                    if (data && data.length > 0) {
                        this.messages = data;
                    }
                } catch (error) {}
            });
        this.scrollBottom();
        this.initUserOnlineListeners();

        this.client = AgoraRTC.createClient({
            mode: "live",
            codec: "vp8",
        });
        // this.client.init("c2725af707a64a6eba4806f5cb712ed9", () => {
        //     this.client.generateToken(
        //         "c2725af707a64a6eba4806f5cb712ed9",
        //         "5c3b3233d29b4a9dbd44f3612da2081a",
        //         "test",
        //         this.authUser.uuid,
        //         "host",
        //         (token) => {
        //             console.log("toekn", token);
        //         }
        //     );
        // });
        this.token = await this.generateToken();
        this.localTracks = {
            videoTrack: null,
            audioTrack: null,
        };
        this.localTrackState = {
            videoTrackEnabled: true,
            audioTrackEnabled: true,
        };

        this.client.on("onTokenPrivilegeWillExpire", () => {
            //After requesting a new token
            this.client.renewToken(token);
        });
        this.client.on("onTokenPrivilegeDidExpire", () => {
            //After requesting a new token
            this.client.renewToken(token);
        });
    },
    methods: {
        showToast(token) {
            document.getElementById('liveToast'+token).style.display='block';
            this.getUserLevels(token);
        },
        closeToast(value) {
            document.getElementById('liveToast'+value).style.display='none'
        },
        getUserLevels(token = null) {
            try {
                    if(token) {
                    axios.get("/user_level/"+token).then((resp)=> {
                    // console.log(resp);
                    this.authUserLevelData = resp.data.data;
                    });
                    } else {
                    if(this.authUser) {
                        axios.get("/user_level/"+this.authUser.token).then((resp)=> {
                    // console.log(resp);
                    this.authUserLevelData = resp.data.data;
                    
                    });
                    }
                    
                    }
                
                } catch (error) {
                    console.log(error);
                }
         },
        stopTicketShow() {
        try {
        axios.post("/checker/host/end/ticket-show", {
            show_id:this.ticket_show.uuid,
        }).then((resp)=> {
            this.show_started = false;
            });
            } catch (error) {
                console.log(error);
            }
        },
        startTicketShow() {
        
        try {
        axios.post("/checker/host/start/ticket-show", {
            host_id:this.authUser.uuid,
            token:this.hostDetails.ticket_show ? this.hostDetails.ticket_show.token : null,
        }).then((resp)=> {
            this.show_started = true;
            this.ticket_show = resp.data.ticket_show;
            });
            } catch (error) {
                console.log(error);
            }
        },
        async getRemoteUsers() {
           
            // axios.post("model/generate-token").then((resp)=> {
            //   let token = resp.data.token;
            //   console.log(token);
            //     });
                
            await axios.get('https://api.agora.io/dev/v1/channel/user/'+this.agoraId+'/'+ this.options.channel, {
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
        addScreenshot() {

            //             var canvas = document.getElementById("canvas");
            //   var video = $('video')[0];
            //   canvas.width = video.videoWidth;
            //   canvas.height = video.videoHeight;
            //   canvas .getContext("2d").drawImage(video, 0, 0, video.videoWidth, video.videoHeight);

            //   /** Code to merge image **/
            //   /** For instance, if I want to merge a play image on center of existing image **/
            
            var video = $('video')[0];
            var canvas = document.createElement('canvas');
            var context = canvas.getContext('2d');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            var screenshotContainer = $('#screenshotContainer');
            screenshotContainer.empty(); // Clear previous screenshots
            screenshotContainer.append(canvas);

            var imageURL = canvas.toDataURL('image/png', 1.0);

            try {
             axios.post("/upload/"+this.authUser.uuid+"/live-image", {
                image:imageURL,
            }).then((resp)=> {
                // console.log(resp);
                });
                } catch (error) {
                    console.log(error);
                }
            },
        showVolme() {
                this.displayVolume =  false;
                document.getElementById('showVolumeBtn').style.display='block';
        },

        hideVolume() {
                this.displayVolume =  true;
                document.getElementById('showVolumeBtn').style.display='none';
        },
        initUserOnlineListeners() {
            Echo.channel("agora-online-channel").listen(
                ".broadcastAs",
                ({ data }) => {
                    if (data.userToCall == this.authuserid) {
                        console.warn('incoming', data);
                        this.joinChannel = data.channelName;
                        this.incomingCaller = data?.from_user?.name;
                        this.incomingCallerUid = data.from;
                        this.channelUid = parseInt(data.calluid);
                        this.incomingCall = true;
                        $("#incomingCall").modal("show");
                        this.incomingCallCheck();
                    }
                }
            );
        },
        incomingCallCheck() {
            this.incomingCallAudio = new Audio(
                "https://assets.mixkit.co/active_storage/sfx/1359/1359-preview.mp3"
            );
            this.incomingCallAudio.play();
            if (this.incomingCall == true)
                setInterval(() => {
                    this.incomingCall = false;
                    $("#incomingCall").modal("hide");
                    this.incomingCallAudio.pause();
                }, 1000 * 30);
        },
        async acceptCall(agoraChannel) {
            await axios.post("/agora/accept-call", {
                agoraChannel,
            });
            window.location.href = "/video-call/" + agoraChannel;
        },
        declineCall(agoraChannel) {
            axios.post("/agora/decline-call", {
                agoraChannel,
            });
            this.incomingCall = false;
            this.incomingCallAudio.pause();
            $("#incomingCall").modal("hide");
        },
        showUserList() {
            this.selectedUser = "";
        },
        updateTotalUnread(data) {
            this.totalUnread = this.totalUnread - data.oldVal + data.newVal;
        },
        updateUserOnlineStatus(data) {
            // let index = this.allUsers.findIndex(
            //     (item) => item.uuid == data.user_id
            // );
            
            // if (index != -1) {
            //     this.allUsers[index].is_online = data.is_online;
            // }
            // this.allUsers.sort((newItem, oldItem) => {
            //     let new_is_online = newItem.is_online;
            //     let old_is_online = oldItem.is_online;
            //     if (
            //         new_is_online === old_is_online &&
            //         (newItem.send_at || oldItem.send_at)
            //     ) {
            //         return (
            //             new Date(oldItem.send_at) - new Date(newItem.send_at)
            //         );
            //     }
            //     return old_is_online - new_is_online;
            // });
        },
        scrollBottom() {
            const element = document.querySelector(".messages__box");
            element.scrollTop = element.offsetHeight * 60;
        },
        send() {
            const date = new Date();

            if (this.message) {
                this.ref
                    .child(this.chatKey)
                    .child(this.hostKey)
                    .orderByKey()
                    // .equalTo(this.chatKey)
                    .get()
                    .then((snap) => {
                        if (snap.exists()) {
                            const data = {
                                msg: this.message,
                                send_by: this.authUser.uuid,
                                send_by_user: this.authUser.name,
                                role: 'host',
                                // avatar: 2,
                                send_at: date,
                            };
                            var msgClone = this.messages;
                            msgClone.push(data);
                            this.ref
                                // .child(this.chatKey)
                                .child(this.chatKey)
                                .child(this.hostKey)
                                .set(msgClone);
                            this.message = "";
                        } else {
                            const data = [
                                {
                                    msg: this.message,
                                    send_by: this.authUser.uuid,
                                    send_by_user: this.authUser.name,
                                    // avatar: this.authUser.avatar,
                                    // send_at: date,
                                },
                            ];
                            this.ref
                                .child(this.chatKey)
                                .child(this.hostKey)
                                .set(data);
                        }
                        this.message = "";
                    });
                this.scrollBottom();
            }
        },
        userSelected(data) {
            this.privateChatKey = this.authUser.uuid + "&&" + data.uuid;
            this.$store.commit("updateChatKey", this.privateChatKey);
            this.selectedUser = this.users.find(node=> node.uuid ===data.uuid);
            console.log(this.selectedUser );
        },
        updateUserList(data) {
            let index = this.allUsers.findIndex(
                (item) => item.uuid == data.user_id
            );
            if (index != -1) {
                this.allUsers[index].send_at = data.send_at;
            }
            this.allUsers.sort((newItem, oldItem) => {
                let new_is_online = newItem.is_online;
                let old_is_online = oldItem.is_online;
                if (
                    new_is_online === old_is_online &&
                    (newItem.send_at || oldItem.send_at)
                ) {
                    return (
                        new Date(oldItem.send_at) - new Date(newItem.send_at)
                    );
                }
                return old_is_online - new_is_online;
            });
        },
        async generateToken() {
            const userId = this.authUser.uuid;
            const res = await axios.post("/model/generate-token", {
                channelName: userId,
            });
            this.uid = res.data.uid;
            return res.data.token;
            // const appId = 'c2725af707a64a6eba4806f5cb712ed9';
            // const appCertificate = '5c3b3233d29b4a9dbd44f3612da2081a';
            // const channelName = 'test';
            // const userId = '12'
            // const url = `https://api.agora.io/v1/token?appCertificate=${appCertificate}&channelName=${channelName}&uid=${userId}&role=publisher`;
            // const headers = {
            //     "Content-Type": "application/x-www-form-urlencoded",
            //     Authorization: `Basic ${Buffer.from(
            //         `${appId}:${appCertificate}`
            //     ).toString("base64")}`,
            // };
            // return axios
            //     .post(url, null, { headers })
            //     .then((response) => response.data.token);
        },
        muteMic() {
            if (this.localTrackState.audioTrackEnabled) {
                this.muteAudio();
                $("#localAudioVolume").val(0);
            } else {
                this.unmuteAudio();
                $("#localAudioVolume").val(100);
            }
        },
        offVideo() {
            if (this.localTrackState.videoTrackEnabled) {
                this.muteVideo();
            } else {
                this.unmuteVideo();
            }
        },
        // Mute audio function
        async muteAudio() {
            console.error("audio", this.localTracks.audioTrack);
            if (!this.localTracks.audioTrack) return;
            await this.localTracks.audioTrack.setEnabled(false);
            this.localTrackState.audioTrackEnabled = false;
            $("#mic-btn").html(
                `<i id="mic-icon" class="fas fa-microphone-slash" ></i>`
            );
        },
        setVolumn(evt) {
            this.localTracks.audioTrack.setVolume(parseInt(evt.target.value));
        },

        // Mute video
        async muteVideo() {
            if (!this.localTracks.videoTrack) return;
            await this.localTracks.videoTrack.setEnabled(false);
            this.localTrackState.videoTrackEnabled = false;
            $("video").css("display", "none");
            $("#video-btn").html(
                `<i id="video-icon" class="fas fa-video-slash" ></i>`
            );
        },

        // Unmute audio
        async unmuteAudio() {
            if (!this.localTracks.audioTrack) return;
            await this.localTracks.audioTrack.setEnabled(true);
            this.localTrackState.audioTrackEnabled = true;
            $("#mic-btn").html(
                `<i id="mic-icon" class="fas fa-microphone" ></i>`
            );
        },

        // Unmute video
        async unmuteVideo() {
            if (!this.localTracks.videoTrack) return;
            await this.localTracks.videoTrack.setEnabled(true);
            this.localTrackState.videoTrackEnabled = true;
            $("video").css("display", "block");
            $("#video-btn").html(
                `<i id="video-icon" class="fas fa-video" ></i>`
            );
        },

        async join() {
            
            var channel = this.authUser.uuid;
            var role = "host";
            var app_id = "c2725af707a64a6eba4806f5cb712ed9";
            this.options = {
                token: this.token,
                appId: app_id,
                channel: channel,
                uid: this.uid,
                role: role,
            };
            // create Agora client
            this.client.setClientRole(this.options.role);
           
            // $("#mic-btn").prop("disabled", false);
            // $("#video-btn").prop("disabled", false);
            if (this.options.role === "audience") {
                $("#mic-btn").prop("disabled", true);
                $("#video-btn").prop("disabled", true);
                // add event listener to play remote tracks when remote user publishs.
                this.client.on("user-published", this.handleUserPublished);
                this.client.on("user-joined", this.handleUserJoined);
                this.client.on("user-left", this.handleUserLeft);
            }
            // join the channel
            this.options.uid = await this.client.join(
                this.options.appId,
                this.options.channel,
                this.token,
                this.options.uid
            );
            if (this.options.role === "host") {
                $("#mic-btn").prop("disabled", false);
                $("#video-btn").prop("disabled", false);
                this.client.on("user-published", this.handleUserPublished);
                this.client.on("user-joined", (user) => {
                    const id = user.uid;
                });
                this.client.on("user-left", this.handleUserLeft);

                
                // create local audio and video tracks
                this.localTracks.audioTrack =
                    await AgoraRTC.createMicrophoneAudioTrack();
                this.localTracks.videoTrack =
                    await AgoraRTC.createCameraVideoTrack({
                        encoderConfig: 
                        {
                        width: { ideal: 600, min: 480, max: 1280 },
                        // Specify a value range and an ideal value
                        height: { ideal: 600, min: 360, max: 720 },
                        frameRate: { max: 30, min: 15 },
                        bitrateMin: 600, bitrateMax: 2000,
                        },
                        optimizationMode:'motion'                        
                    });
                    
                // showMuteButton();
                // play local video track
                this.localTracks.videoTrack.play("local-player");
                // $("#local-player-name").text(`localTrack(${this.options.uid})`);
                // publish local tracks to channel
                await this.client.publish(Object.values(this.localTracks));
                console.log(
                    "Successfully published.",
                    Object.values(this.localTracks)
                );

                // Set thumbnil 
                this.addScreenshot();
               // Get all remote users 
               this.getRemoteUsers() 
               // set Host status
                this.setHostStatus();
                // this.showAlert();
                // localStorage.setItem("showAlert", "Yes");
            }

            this.isStreamStarted = true;

            this.streamBtnText = "Stop Stream";
        },
        setHostStatus() {
			this.$store.dispatch('updateHostStatus',{
				is_online: 1,
				user_id: this.authUser.uuid,
				hosts: this.authUser.uuid,
			});
		},
        setHostOffline() {
			this.$store.dispatch('updateHostStatus',{
				is_online: 0,
				user_id: this.authUser.uuid,
			});
		},
        async subscribe(user, mediaType) {
            const uid = user.uid;
            // subscribe to a remote user
            await this.client.subscribe(user, mediaType);
            console.log("Successfully subscribed.");
            if (mediaType === "video") {
                const player = $(`
      <div id="player-wrapper-${uid}">
        <p class="player-name">remoteUser(${uid})</p>
        <div id="player-${uid}" class="player"></div>
      </div>
    `);
                $("#remote-playerlist").append(player);
                user.videoTrack.play(`player-${uid}`);
            }
            if (mediaType === "audio") {
                user.audioTrack.play();
            }
        },
        handleUserPublished(user, mediaType) {
            console.log("user", user);
            const id = user.uid;
            this.remoteUsers[id] = user;
            this.subscribe(user, mediaType);
        },

        // Handle user joined
        handleUserJoined(user, mediaType) {
            console.log("user joined", user);
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

        async stopStream() {
            this.setHostOffline();
            for (let trackName in this.localTracks) {
                var track = this.localTracks[trackName];
                if (track) {
                    track.stop();
                    track.close();
                    $("#mic-btn").prop("disabled", true);
                    $("#video-btn").prop("disabled", true);
                    this.localTracks[trackName] = undefined;
                }
            }
            // remove remote users and player views
            this.remoteUsers = {};
            $("#remote-playerlist").html("");
            // leave the channel
            await this.client.leave();
            this.isStreamStarted = false;
            $("#local-player-name").text("");
            $("#host-join").attr("disabled", false);
            $("#audience-join").attr("disabled", false);
            $("#leave").attr("disabled", true);
            // hideMuteButton();
            console.log("Client successfully left channel.");
            
        },
        openFullscreen() {
            const elem = document.querySelector(".agora_video_player");
            console.log("elem", elem);
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
.agora-video-player-track-cam-baf8e9d6 {
    background: none !important;
}

.agora_video_player::-webkit-media-controls-timeline {
    display: none;
}
.agora_video_player::-webkit-media-controls {
    display: none !important;
}
</style>
<style scoped>
.toast {
  background-color: #2b2b2b;
}
.toast-header {
  background-color: #282323; 
}
.btn-close {
  color:#fff
}
.badge {
  font-size:16px;
}
.message__text {
    background-color: var(--primary) !important;
    border-bottom-right-radius: 5px;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
    padding: 0px 2px 0px 2px;
}
.msgs__list .back_btn i {
    font-size: 1.2rem;
    color: #fff;
}
#showVolumeBtn {
    display: none;
}
.player {
    width: 100%;
    height: 500px;
}
.card {
    /* background-color: transparent !important; */
    background-color: #3b3b3b;
}
.private {
    width: 100%;
    /* display: flex;
    justify-content: center;
    align-items: center; */
    margin-bottom: 0.4rem;
}

.start_stream_btn {
    padding: 0.5rem 1rem;
    border-radius: 2rem;
}
.btn-success {
    border-radius: 2rem;
}
.action_box {
    position: absolute;
    width: 45%;
    bottom: 0;
    left: 2%;
}
.btn-live {
    color: #fff;
}
.stream_toggle_btn {
    position: absolute;
    bottom: 0.3rem;
    right: 20px;
}
.full-screen {
    position: absolute;
    width: 10%;
    bottom: 0.3rem;
    right: 1%;
    display: flex;
    justify-content: flex-end;
    align-items: center;
}
#full-screen-btn {
    cursor: pointer;
}
.relative {
    position: relative;
}
.h-95 {
    height: 95%;
}
.messages__box{
  margin-left: 1rem;
}

.font-size-16 {
    font-size: 25px;
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
@media screen and (max-width: 991px){
  .stream_wrapper{
    height: 65vh !important;
  }
}
@media (max-width: 700px) {
    .messages__box {
      position:absolute;
      top:15%;
      width: 100%;
      height: 27rem;
}
.top_postion {
  top:45% !important;
      width: 100%;
      height: 17rem !important;
}
.chat__box {
  position:absolute;
  top: 0;
}
.tip_menu[data-v-7d1cd16c] {
  position: relative !important;
  margin-top:70px;
}
#chat_boxContent .chat__box {
  position: relative;
    margin-top: 0px ;
}
.top_postion_chat_box {
  margin-top: 10px !important;
}
.token_box input {
  margin-top:0px;
  margin-bottom: 10px;
  margin-left: 0px;
}
.token_box {
  padding-left:10px;
}
#chat_boxContent .chat__box .chat__box--wrapper {
  background-color: #000;
  border-radius: 0;
}
}
</style>
