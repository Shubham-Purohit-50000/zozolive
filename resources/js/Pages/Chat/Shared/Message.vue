<template>
  <div :class="classes">
    <!--begin::Header-->
    <div class="card-header align-items-center" :style="headerStyle">
      <slot></slot>
      <div class="text-center flex-grow-1 d-flex justify-content-between  align-items-center">
        <div class="cursor-pointer">
          <i class="bi bi-arrow-left text-white mob-disblock d-none" @click="goBack"></i>
        </div>
        <div
            class="text-white font-weight-bold font-size-h5 d-flex flex-column"
        >
          <span>{{ selectedUser.name }}</span>
          <span
              class="online_status_label"
              :class="isOnline ? 'text-green' : 'text-red'"
          >{{ isOnline ? "ONLINE" : "OFFLINE" }}</span
          >
        </div>
        <div
            v-if="isCustomer && isOnline"
            class="d-flex flex-column callActionBox"
        >
          <i
              class="bi bi-camera-video"
              @click="placeCall(selectedUser.uuid, selectedUser.name)"
          ></i>
          <span class="private_call_text">PRIVATE CALL</span>
        </div>
        <!-- <div>
<span class="label label-dot label-success"></span>
<span class="font-weight-bold text-muted font-size-sm">Active</span>
</div> -->
      </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body px-4 py-1" :style="styles">
      <!--begin::Scroll-->
      <div
          class="scroll scroll-pull ps ps--active-y"
          data-height="530"
          data-mobile-height="300"
          style="height: 62.4vh; overflow: hidden"
      >
        <!--begin::Messages-->
        <div class="messages overflow-auto" v-chat-scroll>
          <ul v-for="(msg, i) in messages" :key="i" class="message">
            <!--begin::Message In-->
            <li
                class="d-flex flex-column mb-5 align-items-start"
                v-if="selectedUser.uuid === msg.send_by"
            >
              <div class="d-flex align-items-center">
                <div class="user_image mr-3">
                  <img
                      alt="avatar"
                      v-if="hasReceiverAvatar"
                      :src="selectedUser.avatar"
                      @error="changeReceiverAvatar"
                  />
                  <span
                      v-if="!hasReceiverAvatar"
                      class="name__label"
                  >{{ receiverNameFirstLetter }}</span
                  >
                </div>
                <div>
                                    <span
                                        class="text-white text-hover-primary font-weight-bold font-size-h6"
                                    >{{ selectedUser.name }}</span
                                    >
                </div>
              </div>
              <div
                  class="mt-2 p-2 text-white message__text d-flex flex-column font-weight-bold font-size-lg text-left max-w-400px"
              >
                <!-- {{ message.message }} -->
                <span
                    v-html="arrangeMessage(msg.msg)"
                    class="message__text--msg"
                ></span>
                <span class="send_at">{{
                    formatTime(msg.send_at)
                  }}</span>
              </div>
            </li>
            <!--end::Message In-->
            <!--begin::Message Out-->
            <li
                class="d-flex flex-column mb-5 align-items-end"
                v-else
            >
              <div class="d-flex align-items-center">
                <div>
                  <a
                      href="#"
                      class="text-dark-75 text-hover-primary font-weight-bold font-size-h6"
                  >You</a
                  >
                </div>
                <div class="user_image ml-3">
                  <img
                      v-if="hasAuthAvatar"
                      alt="avatar"
                      @error="changeAuthAvatar"
                      :src="msg.avatar"
                  />
                  <span
                      v-if="!hasAuthAvatar"
                      class="name__label"
                  >{{ authFirstLetter }}</span
                  >
                </div>
              </div>
              <div
                  class="mt-2 p-2 message__text text-white font-weight-bold font-size-lg text-right max-w-400px d-flex flex-column"
              >
                                <span
                                    class="message__text--msg"
                                    v-html="arrangeMessage(msg.msg)"
                                ></span>
                <span class="send_at">{{
                    formatTime(msg.send_at)
                  }}</span>
              </div>
            </li>
            <!--end::Message Out-->
          </ul>
          <loading
              v-model:active="isLoading"
              :can-cancel="true"
              loader="dots"
              backgroundColor="transparent"
              color="#a2262e"
              :is-full-page="false"
          />
        </div>
        <!-- <div class="d-flex justify-content-center align-items-center h-full" v-if="isLoading">
<div class="spinner-border" role="status">
<span class="sr-only">Loading...</span>
</div>
</div> -->
        <!--end::Messages-->
      </div>
      <!--end::Scroll-->
    </div>
    <!--end::Body-->
    <!--begin::Footer-->
    <div class="card-footer d-flex align-items-center px-4">
      <!--begin::Compose-->
      <EmojiPicker
          :native="true"
          theme="dark"
          picker-type="input"
          @select="onSelectEmoji"
          :offset="20"
      />
      <input
          class="form-control border-0 p-0 resize-none"
          placeholder="Type a message"
          v-model="message"
          @keyup.enter="sendMessage"
          @focus="markAsRead"
          @click="markAsRead"
      />
      <div class="">
        <button
            type="button"
            @click="sendMessage"
            class="btn btn-md text-uppercase send_message_btn font-weight-bold chat-send py-2 px-6"
        >
          <i class="bi bi-send"></i>
        </button>
      </div>
      <!--begin::Compose-->
    </div>
    <!--end::Footer-->
  </div>

  <!--Call modal-->
  <IncomingCallModal
      @decline="declineCall(joinChannel)"
      @accept="acceptCall(joinChannel)"
      :incoming-call="incomingCall"
      :incoming-caller="incomingCaller"
  />
  <button
      type="button"
      class="btn private_chat--btn mt-3"
      data-bs-toggle="modal"
      data-bs-target="#incomingCall"
      id="showmodal"
  >
    Show Modal
  </button>

  <!--Outgoing Call Modal-->
  <OutgoingCallModal
      :outgoing-caller="outgoingCaller"
      :outgoing-call="outgoingCall"
      @decline="endCall"
  />
  <button
      type="button"
      class="btn private_chat--btn mt-3"
      data-bs-toggle="modal"
      data-bs-target="#outgoingCall"
      id="outshowmodal"
  >
    Show Modal
  </button>
  <!-- <audio src="/assets/notification-alert.mpm" class="d-none notification_alert"></audio> -->
</template>

<script>
import Loading from "vue-loading-overlay";
import "vue-loading-overlay/dist/css/index.css";
import EmojiPicker from "vue3-emoji-picker";
import "vue3-emoji-picker/css";
import moment from "moment";
import OutgoingCallModal from "./OutgoingCallModal.vue";
import IncomingCallModal from "./IncomingCallModal.vue";

export default {
  components: {
    Loading,
    EmojiPicker,
    OutgoingCallModal,
    IncomingCallModal,
  },
  props: {
    authUser: {
      type: Object,
    },
    // messages: {
    //     type: [Array, Object],
    //     default: () => [],
    // },
    selectedUser: {
      type: Object,
      default: () => {
      },
    },
    // chatKey: {
    //     type: String,
    //     default: "",
    // },
    authuseruid: {
      type: [String, Number],
      default: "",
    },
    authuserid: {
      default: "",
    },
    agoraChannel: {
      type: String,
      default: "",
    },
    appCertificate: {
      type: String,
      default: "",
    },
    currentUser: {
      default: "",
    },
    isCustomer: {
      default: "",
    },
    classes: {
      type: String,
      default: () => "",
    },
    styles: {
      type: String,
      default: () => "",
    },
    headerStyle: {
      type: String,
      default: () => "",
    },
  },
  data() {
    return {
      messages: "",
      db: "",
      ref: "",
      message: "",
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
      channelUid: "",
      joinChannel: "",
      isOnline: false,
      chatKey: "",
      hasReceiverAvatar: true,
      hasAuthAvatar: true,
      incomingCallAudio: "",
      outgoingCallAudio: "",
    };
  },
  watch: {
    selectedUser(val) {
      if (val) {
        this.chatKey = this.authUser.uuid + "&&" + val.uuid;
      }
    },
    messages(val) {
      this.scrollBottom();
    },
  },
  async created() {
    this.chatKey = this.$store.state.chatKey;
    this.db = firebase.database();
    this.ref = this.db.ref("private-chats");
    await this.fetchMessages();
    // if (this.messages == "") {
    //     this.chatKey = this.selectedUser.uuid + "&&" + this.authUser.uuid;
    //     await this.fetchMessages();
    //     this.$store.commit("updateChatKey", this.chatKey);
    //     const ref2 = this.db.ref("private-chats");
    //     ref2.child(this.chatKey)
    //         .child("message")
    //         .on("value", (msg) => {
    //             try {
    //                 let data = msg.val();
    //                 data = Object.values(data);
    //                 // if (msg.exists()) {
    //                 if (data && data.length > 0) {
    //                     this.messages = data;
    //                 }
    //             } catch (error) {}
    //         });
    // }
    this.isLoading = false;
  },
  mounted() {
    this.initUserOnlineChannel();
    this.initUserOnlineListeners();
    this.isOnline = this.selectedUser.is_online;
    const ref2 = this.db.ref("private-chats");
    ref2.child(this.currentChatKey)
        .child("message")
        .on("value", (msg) => {
          if (msg.exists()) {
            try {
              let data = msg.val();
              data = Object.values(data);
              // if (msg.exists()) {
              if (data && data.length > 0) {
                this.messages = data;
              }
              // }
              // if (msg.exists()) {
              // console.log("len > 1", data);
              // this.messages = data;
              // }
            } catch (error) {
            }
          }
        });
    this.db
        .ref()
        .child("user-online-status")
        .child(this.selectedUser.uuid)
        .on("value", (snap) => {
          if (snap.exists()) {
            let data = snap.val();
            this.isOnline = data.is_online;
          }
        });
    this.isMounted = true;
  },
  computed: {
    currentChatKey() {
      return this.$store.state.chatKey;
    },
    authFirstLetter() {
      return this.authUser?.name.substring(0, 1)?.toUpperCase();
    },
    receiverNameFirstLetter() {
      return this.selectedUser?.name.substring(0, 1)?.toUpperCase();
    },
  },
  methods: {
    formatTime(time) {
      return moment(time).format("DD-MM-YYYY hh:mm A");
    },
    goBack(){
      var deviceWidth = document.documentElement.clientWidth;
      if (deviceWidth <= 768) {
        $('.msgs__list--wrapper').css('display', 'none');
        $('.chat__users--wrapper').css('display','block')
      }
    },
    async fetchMessages() {
      const ref = this.db.ref("private-chats");
      const snap = await ref
          .child(this.currentChatKey)
          .child("message")
          .get();
      // .then((snap) => {
      if (snap.exists()) {
        this.messages = Object.values(snap.val());
      }
    },
    onSelectEmoji(emoji) {
      this.message += emoji.i;
    },
    async sendMessage() {
      if (this.message) {
        this.db
            .ref("private-chats")
            .orderByKey()
            .equalTo(this.currentChatKey)
            .get()
            .then((snap) => {
              var date = moment().format("YYYY-MM-DD HH:mm:ss");
              if (snap.exists()) {
                const data = {
                  msg: this.message,
                  send_by: this.authUser.uuid,
                  avatar: this.authUser.avatar,
                  send_at: date,
                  is_read: false,
                };
                var msgClone = this.messages;
                msgClone.push(data);
                this.db
                    .ref("private-chats")
                    .child(this.currentChatKey)
                    .child("message")
                    .set(msgClone);
                this.message = "";
              } else {
                const data = {
                  users: [this.authUser, this.selectedUser],
                  message: [
                    {
                      msg: this.message,
                      send_by: this.authUser.uuid,
                      avatar: this.authUser.avatar,
                      send_at: date,
                      is_read: false,
                    },
                  ],
                };
                this.db
                    .ref("private-chats")
                    .child(this.currentChatKey)
                    .set(data);
                this.message = "";
              }
            });
        //             }
      }
    },
    markAsRead() {
      this.ref
          .child(`${this.currentChatKey}/message`)
          .get()
          .then((snap) => {
            if (snap.exists()) {
              var data = snap.val();
              var newData = data.filter((item) => {
                return item.is_read == false;
              });
              if (newData.length) {
                data.map((item) => {
                  item.is_read = true;
                });
                this.ref
                    .child(`${this.currentChatKey}/message`)
                    .set(data);
              }
            }
          });
    },
    changeAuthAvatar(e) {
      // return
      this.hasAuthAvatar = false;
      // e.target.src = "https://via.placeholder.com/50x50";
    },
    changeReceiverAvatar() {
      this.hasReceiverAvatar = false;
      // e.target.src = "https://via.placeholder.com/50x50";
    },
    scrollBottom() {
      setTimeout(() => {
        const element = document.querySelector(".messages");
        element.scrollTop = element.offsetHeight * 50;
      }, 500);
    },
    arrangeMessage(message) {
      try {
        let messageArray = message.split(" ");
        messageArray = messageArray.filter((item) => {
          const pureString = item.trim();
          return pureString.length > 0;
        });

        const pattern =
            /[(http(s)?):\/\/(www\.)?a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/gi; //regex of url
        const pattern2 = /^(http(s)?:\/\/)/gm; //regex of https:// or http:// from start of string
        messageArray = messageArray.map((item) => {
          if (pattern.test(item)) {
            item = pattern2.test(item)
                ? "<a class='text-white text-decoration-underline' href=" +
                item +
                " target='_blank'>" +
                item +
                "</a>"
                : "<a class='text-white text-decoration-underline' href=http://" +
                item +
                " target='_blank'>" +
                item +
                "</a>";
          }

          return item;
        });
        return messageArray.join(" ");
      } catch (error) {
      }
      return message;
    },

    initUserOnlineChannel() {
      this.userOnlineChannel = window.Echo.join("agora-online-channel");
    },
    initUserOnlineListeners() {
      Echo.channel("agora-online-channel").listen(
          ".broadcastAs",
          ({data}) => {
            console.log("listing", data);
            if (data.userToCall == this.authuserid) {
              this.joinChannel = data.channelName;

              const callerIndex = this.onlineUsers.findIndex(
                  (user) => user.uuid === data.from
              );

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
    getUserOnlineStatus(id) {
      const onlineUserIndex = this.onlineUsers.findIndex(
          (data) => data.id === id
      );
      if (onlineUserIndex < 0) {
        return "Offline";
      }
      return "Online";
    },

    listenDeclinecall() {
      Echo.channel("decline-agora-video").listen(
          ".declineVideoCall",
          ({data}) => {
            if (data.channelName == this.agoraChannel) {
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
          ({data}) => {
            if (data.channelName == this.agoraChannel) {
              setTimeout(() => {
                window.location.href =
                    "/video-call/" + data.channelName;
              }, 500);
            }
          }
      );
    },
    async placeCall(id, calleeName) {
      if (this.authUser?.token > 0) {
        try {
          const channelName = this.agoraChannel;
          await axios.post("/agora/call-user", {
            user_to_call: id,
            channel_name: channelName,
          });

          this.outgoingCaller = calleeName;
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
    },
    async acceptCall(agoraChannel) {
      axios.post("/agora/accept-call", {
        agoraChannel,
      });
      setTimeout(() => {
        window.location.href = "/video-call/" + agoraChannel;
      }, 500);
    },
    declineCall(agoraChannel) {
      axios.post("/agora/decline-call", {
        agoraChannel,
      });
      this.incomingCall = false;
      this.incomingCallAudio.pause();
      $("#incomingCall").modal("hide");
    },

    generateToken(channelName, authuseruid) {
      var agoraToken = axios.post("/agora/token", {
        channelName: channelName,
        authuseruid: authuseruid,
      });
      return agoraToken;
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
    incomingCallCheck() {
      this.incomingCallAudio = new Audio(
          "https://assets.mixkit.co/active_storage/sfx/1359/1359-preview.mp3"
      );
      this.incomingCallAudio.play();
      this.outgoingCall = true;
      if (this.incomingCall == true)
        setInterval(() => {
          this.incomingCall = false;
          $("#incomingCall").modal("hide");
          this.callPlaced = false;
          this.incomingCallAudio.pause();
        }, 1000 * 30);
    },
    /**
     * Agora Events and Listeners
     */
    endCall() {
      $("#outgoingCall").modal("hide");
      this.callPlaced = false;
    },
  },
};
</script>

<style scoped></style>

<style>
.v3-emoji-picker {
  inset: auto 0px 0px !important;
}

.v3-input-picker-root {
  width: 2rem;
}

.v3-emoji-picker-input {
  background: transparent;
  border: none !important;
  outline: none !important;
  visibility: hidden;
}

.callActionBox {
  text-align: right;
  padding-right: 25px;
}

.callActionBox i {
  font-size: 25px;
  color: #fff;
  cursor: pointer;
}

#showmodal,
#outshowmodal {
  display: none;
}

.text-green {
  color: #198754;
}

.text-red {
  color: #ff0000;
}

.online_status_label {
  font-size: 0.7rem;
}

@media screen and (max-width: 768px){
  .callActionBox{
    padding-right: 0 !important;
  }
}
</style>
