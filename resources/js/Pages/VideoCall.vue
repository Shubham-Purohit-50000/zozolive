<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Dropdown from "@/Components/Dropdown.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    star: "",
    review: "",
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <div class="app-container">
        <button class="mode-switch">
            <svg
                class="sun"
                fill="none"
                stroke="#fbb046"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                viewBox="0 0 24 24"
            >
                <defs></defs>
                <circle cx="12" cy="12" r="5"></circle>
                <path
                    d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"
                ></path>
            </svg>
            <svg
                class="moon"
                fill="none"
                stroke="#ffffff"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                viewBox="0 0 24 24"
            >
                <defs></defs>
                <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
            </svg>
        </button>

        <div class="app-main">
            <div class="timer">
                <div class="timeContainer">
                    <span class="digit" id="hr">00</span>
                    <span class="txt">:</span>
                    <span class="digit" id="min">00</span>
                    <span class="txt">:</span>
                    <span class="digit" id="sec">00</span>
                </div>
            </div>
            <div class="video-call-wrapper" v-if="callPlaced">
                <div class="video-participant" id="remote-video">
                    <!-- <div class="participant-actions">
                        <button class="btn-mute"></button>
                        <button class="btn-camera"></button>
                    </div> -->
                    <!-- <a href="#" class="name-tag">Andy Will</a> -->
                    <!--<img src="https://images.unsplash.com/photo-1566821582776-92b13ab46bb4?ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=900&amp;q=60" alt="participant">-->
                </div>
                <div class="video-participant host" id="local-video">
                    <!--<div class="participant-actions">
           <button class="btn-mute"></button>
          <button class="btn-camera"></button>
         </div>-->
                    <!--<img src="https://images.unsplash.com/photo-1500917293891-ef795e70e1f6?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1650&amp;q=80" alt="participant">-->
                </div>
            </div>
            <div class="video-call-actions" v-if="callPlaced">
                <button
                    v-if="mutedAudio"
                    class="video-action-button mic"
                    @click="handleAudioToggle"
                ></button>
                <button
                    v-else
                    class="video-action-button mic on"
                    @click="handleAudioToggle"
                ></button>

                <button
                    v-if="mutedVideo"
                    class="video-action-button camera"
                    @click="handleVideoToggle"
                ></button>
                <button
                    v-else
                    class="video-action-button camera on"
                    @click="handleVideoToggle"
                ></button>
                <!-- <button class="video-action-button maximize"></button> -->

                <button
                    v-if="isCustomer"
                    class="video-action-button endcall"
                    @click="endCall"
                >
                    Leave
                </button>
            </div>

            <!-- <div v-else>
                <p style="text-align: center">Call End</p>
                <div class="card" v-if="isCustomer">
                    <div class="card-body">
                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">
                                Share Your Feedback
                            </h5>
                            <p class="text-center small">
                                Please share your valuable feedback
                            </p>
                        </div>
                        <form class="row g-3 needs-validation" novalidate="">
                            <div class="col-12 d-flex">
                                <div v-for="n in 5" :key="n">
                                    <label
                                        class="bi bi-star"
                                        :for="`star${id}`"
                                    ></label>
                                    <input
                                        type="hidden"
                                        value=""
                                        :id="`star${id}`"
                                    />
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="yourPassword" class="form-label"
                                    >Review</label
                                >
                                <textarea class="form-control"></textarea>
                            </div>

                            <div class="col-12">
                                <button
                                    @click="redirectBack"
                                    class="btn btn-primary w-100"
                                    type="button"
                                >
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> -->
        </div>
        <!-- <div class="right-side">
            <button class="btn-close-right">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    class="feather feather-x-circle"
                    viewBox="0 0 24 24"
                >
                    <defs></defs>
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M15 9l-6 6M9 9l6 6"></path>
                </svg>
            </button>
            <div class="chat-container">
                <div class="chat-header">
                    <button class="chat-header-button">Live Chat</button>
                </div>
                <div class="chat-area">
                    <div class="message-wrapper">
                        <div class="profile-picture">
                            <img
                                src="https://images.unsplash.com/photo-1581824283135-0666cf353f35?ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1276&amp;q=80"
                                alt="pp"
                            />
                        </div>
                        <div class="message-content">
                            <p class="name">Ryan Patrick</p>
                            <div class="message">Helloo team!😍</div>
                        </div>
                    </div>
                    <div class="message-wrapper">
                        <div class="profile-picture">
                            <img
                                src="https://images.unsplash.com/photo-1566821582776-92b13ab46bb4?ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=900&amp;q=60"
                                alt="pp"
                            />
                        </div>
                        <div class="message-content">
                            <p class="name">Andy Will</p>
                            <div class="message">
                                Hello! Can you hear me?🤯
                                <a class="mention">@ryanpatrick</a>
                            </div>
                        </div>
                    </div>
                    <div class="message-wrapper">
                        <div class="profile-picture">
                            <img
                                src="https://images.unsplash.com/photo-1600207438283-a5de6d9df13e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1234&amp;q=80"
                                alt="pp"
                            />
                        </div>
                        <div class="message-content">
                            <p class="name">Jessica Bell</p>
                            <div class="message">
                                Hi team! Let's get started it.
                            </div>
                        </div>
                    </div>
                    <div class="message-wrapper reverse">
                        <div class="profile-picture">
                            <img
                                src="https://images.unsplash.com/photo-1500917293891-ef795e70e1f6?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1650&amp;q=80"
                                alt="pp"
                            />
                        </div>
                        <div class="message-content">
                            <p class="name">Emmy Lou</p>
                            <div class="message">Good morning!🌈</div>
                        </div>
                    </div>
                    <div class="message-wrapper">
                        <div class="profile-picture">
                            <img
                                src="https://images.unsplash.com/photo-1576110397661-64a019d88a98?ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1234&amp;q=80"
                                alt="pp"
                            />
                        </div>
                        <div class="message-content">
                            <p class="name">Tim Russel</p>
                            <div class="message">New design document⬇️</div>
                            <div class="message-file">
                                <div class="icon sketch">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512"
                                    >
                                        <path
                                            fill="#ffd54f"
                                            d="M96 191.02v-144l160-30.04 160 30.04v144z"
                                        ></path>
                                        <path
                                            fill="#ffecb3"
                                            d="M96 191.02L256 16.98l160 174.04z"
                                        ></path>
                                        <path
                                            fill="#ffa000"
                                            d="M0 191.02l256 304 256-304z"
                                        ></path>
                                        <path
                                            fill="#ffca28"
                                            d="M96 191.02l160 304 160-304z"
                                        ></path>
                                        <g fill="#ffc107">
                                            <path
                                                d="M0 191.02l96-144v144zM416 47.02v144h96z"
                                            ></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="file-info">
                                    <div class="file-name">NewYear.sketch</div>
                                    <div class="file-size">120 MB</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="message-wrapper">
                        <div class="profile-picture">
                            <img
                                src="https://images.unsplash.com/photo-1581824283135-0666cf353f35?ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1276&amp;q=80"
                                alt="pp"
                            />
                        </div>
                        <div class="message-content">
                            <p class="name">Ryan Patrick</p>
                            <div class="message">Hi team!❤️</div>
                            <div class="message">
                                I downloaded the file
                                <a class="mention">@timrussel</a>
                            </div>
                        </div>
                    </div>
                    <div class="message-wrapper reverse">
                        <div class="profile-picture">
                            <img
                                src="https://images.unsplash.com/photo-1500917293891-ef795e70e1f6?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1650&amp;q=80"
                                alt="pp"
                            />
                        </div>
                        <div class="message-content">
                            <p class="name">Emmy Lou</p>
                            <div class="message">Woooww! Awesome❤️</div>
                        </div>
                    </div>
                </div>
                <div class="chat-typing-area-wrapper">
                    <div class="chat-typing-area">
                        <input
                            type="text"
                            placeholder="Type your meesage..."
                            class="chat-input"
                        />
                        <button class="send-button">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="feather feather-send"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"
                                ></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- <button class="expand-btn show">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-message-circle"
            >
                <path
                    d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"
                ></path>
            </svg>
        </button> -->
    </div>
</template>

<script>
export default {
    name: "VideoCall",
    props: [
        "channel",
        "authuid",
        "agora_id",
        "appCertificate",
        "agoraToken",
        "history_id",
        "isCustomer",
        "HostName",
    ],
    data() {
        return {
            messages: "",
            db: "",
            message: "",
            chatKey: "",
            isLoading: true,
            callPlaced: false,
            client: null,
            localStream: null,
            mutedAudio: false,
            mutedVideo: false,
            userOnlineChannel: null,
            onlineUsers: [],
            incomingCall: false,
            incomingCaller: "",
            outgoingCaller: "",
            outgoingCall: false,
            incomingCallerUid: "",
            agoraChannel: "",
            channelUid: "",
            duration: 0,
            inCall: true,
            avlToken: 0,
        };
    },
    mounted() {
        this.initializeAgora();
        this.initializedAgoraListeners();
        this.acceptCall(this.channel);
        this.listenEndCall();
    },
  methods: {
    redirectBack() {
      window.location.href = '/chat';
      },
        initializeAgora() {
            this.client = AgoraRTC.createClient({ mode: "rtc", codec: "h264" });
            this.client.init(
                this.agora_id,

                () => {
                    console.log("AgoraRTC client initialized");
                },
                (err) => {
                    console.log("AgoraRTC client init failed", err);
                }
            );
        },
        async joinRoom(token, channel) {
            await this.client.join(
                token,
                channel,
                this.authuid,
                (uid) => {
                    console.log("User " + uid + " join channel successfully");
                    this.callPlaced = true;
                    this.createLocalStream();
                    this.initializedAgoraListeners();
                    this.listenEndCall();
                },
                (err) => {
                    console.log("Join channel failed", err);
                }
            );
        },
        initializedAgoraListeners() {
            //   Register event listeners
            this.client.on("stream-published", function (evt) {
                console.log("Publish local stream successfully");
                console.log(evt);
            });
            //subscribe remote stream
            this.client.on("stream-added", ({ stream }) => {
                console.log("New stream added: " + stream.getId());
                this.client.subscribe(stream, function (err) {
                    console.log("Subscribe stream failed", err);
                });
            });
            this.client.on("stream-subscribed", (evt) => {
                // Attach remote stream to the remote-video div
                evt.stream.play("remote-video");
                this.client.publish(evt.stream);
                this.deductTokenMethod();
                this.chargeCallTokens();
                this.stopWatchCall();
            });
            this.client.on("stream-removed", ({ stream }) => {
                this.endcall();
                console.log(String(stream.getId()));
                stream.close();
            });
            this.client.on("peer-online", (evt) => {
                console.log("peer-online", evt.uid);
            });
            this.client.on("peer-leave", (evt) => {
                console.log("remote user leave");
                var uid = evt.uid;
                var reason = evt.reason;
                console.log("remote user le ft ", uid, "reason: ", reason);
                this.endCall();
            });
            this.client.on("stream-unpublished", (evt) => {
                console.log(evt);
            });
        },
        createLocalStream() {
            this.localStream = AgoraRTC.createStream({
                audio: true,
                video: true,
            });
            // Initialize the local stream
            this.localStream.init(
                () => {
                    // Play the local stream
                    this.localStream.play("local-video");
                    // Publish the local stream
                    this.client.publish(this.localStream, (err) => {
                        console.log("publish local stream", err);
                    });
                },
                (err) => {
                    console.log(err);
                }
            );
        },
        listenEndCall() {
            Echo.channel("end-agora-video").listen(
                ".EndVideoCall",
                ({ data }) => {
                    console.log(data.channelName);
                    console.log(this.agoraChannel);
                    if (data.channelName == this.agoraChannel) {
                        this.endcall();
                    }
                }
            );
        },
        endCall() {
            this.inCall = false;
            const agoraChannel = this.channel;
            axios.post("/agora/end-call", {
                agoraChannel: agoraChannel,
                duration: this.duration,
                end_time: new Date(),
                history_id: this.history_id
            });
            this.localStream.close();
            this.client.leave(
                () => {
                    this.callPlaced = false;
                    if (!this.isCustomer) {
                        setTimeout(() => {
                            window.location.href = "/chat";
                        }, 500);
                    } else {
                        window.location.href = "/stream/"+this.HostName;
                    }
                },
                (err) => {
                    console.log("Leave channel failed");
                }
            );
        },
        handleAudioToggle() {
            if (this.mutedAudio) {
                this.localStream.unmuteAudio();
                this.mutedAudio = false;
            } else {
                this.localStream.muteAudio();
                this.mutedAudio = true;
            }
        },
        handleVideoToggle() {
            if (this.mutedVideo) {
                this.localStream.unmuteVideo();
                this.mutedVideo = false;
            } else {
                this.localStream.muteVideo();
                this.mutedVideo = true;
            }
        },
        generateToken(channelName, authuseruid) {
            var agoraToken = axios.post("/agora/token", {
                channelName,
            });

            return agoraToken;
        },
        async acceptCall(channelName) {
            this.initializeAgora();
            // const tokenRes = await this.generateToken(channelName);
            this.joinRoom(this.agoraToken, channelName);
        },
        listenEndCall() {
            Echo.channel("end-agora-video").listen(
                ".EndVideoCall",
                ({ data }) => {
                    console.log(this.agoraChannel);
                    if (data.channelName == this.agoraChannel) {
                        this.endCall();
                    }
                }
            );
        },
        deductTokenMethod() {
            if (this.inCall && this.isCustomer) {
                var history_id = this.history_id;
                var duration = this.duration;
                setInterval(() => {
                    var agoraToken = axios.post("/agora/deduct-token", {
                        history_id: this.history_id,
                        duration: this.duration,
                    });
                }, 1000 * 60);
            }
        },
        chargeCallTokens() {
            if (this.isCustomer) {
                var history_id = this.history_id;
                var duration = this.duration;
                var agoraToken = axios.post("/agora/deduct-token", {
                    history_id,
                    duration,
                });
            }
        },
        stopWatchCall() {
            var interval;
            if (this.inCall) {
                var drs = this.duration;
                var count = 0;
                var min = 0;
                var hrs = 0;
                interval = setInterval(() => {
                    if (this.inCall) {
                        drs++;
                        count++;
                        if (count >= 60) {
                            min++;
                            count = 0;
                        }
                        if (min >= 60) {
                            hrs++;
                            min = 0;
                        }

                        var hrString = hrs < 10 ? "0" + hrs : hrs;
                        var minString = min < 10 ? "0" + min : min;
                        var secString = count < 10 ? "0" + count : count;
                        $("#hr").html(hrString);
                        $("#min").html(minString);
                        $("#sec").html(secString);

                        this.duration = drs;
                        console.log(drs);
                    }
                }, 1000);
            } else {
                clearInterval(interval);
            }
        },
    },
};
</script>

<style scoped>
 @media screen and (max-width: 520px) {
    .video-call-actions {
  position: absolute !important;
  top: 70px !important;
}
  }
.d-flex {
    display: flex;
    justify-content: center;
}
.d-flex .bi-star {
    padding: 10px;
}
.card {
    background: #fff;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 0 10px #fff;
    text-align: center;
}
.card textarea {
    height: 50px;
    margin-top: 5px;
    margin-bottom: 15px;
    border-radius: 5px;
    box-shadow: 0 0 10px #fff;
    width: 100%;
}
.card .small {
    margin-top: 0px;
}
.card label {
    display: block;
    text-align: left;
}
.card button {
    background: #3d42df;
    color: #fff;
    padding: 10px 19px;
    border: none;
    border-radius: 3px;
    box-shadow: 0 0 5px #fff;
    font-size: 14px;
    font-weight: 500;
}
</style>
