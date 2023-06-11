<template>
  <div class="tab-pane fade h-100" id="bordered-justified-profile" role="tabpanel"
       aria-labelledby="profile-tab">
    <div class="d-flex justify-content-center align-items-center flex-column private_chat h-100" v-if="!authUser">
      <img src="/img/ultimate-star.svg" alt="ultimate star" class="private_chat--star">
      <p class="private_chat--title mb-0">Go Ultimate</p>
      <h6>to chat privately with any model</h6>
      <div class="private_chat--features">
        <p class="private_chat--features_text">
          <i class="bi bi-chat h6"></i>
          <span>Unlimited Private messages</span>
        </p>
        <p class="private_chat--features_text">
          <i class="bi bi-camera h6"></i>
          <span>Send photos to models</span>
        </p>
        <p class="private_chat--features_text mb-0">
          <i class="bi bi-emoji-heart-eyes h6"></i>
          <span>Fun and naughty emoji</span>
        </p>
      </div>
      <button type="button" class="btn private_chat--btn mt-3" data-bs-toggle="modal" data-bs-target="#basicModal">
        Register to Chat
      </button>
    </div>
    <div class="h-100">
      <div class="overflow-hidden h-92 px-4 py-1">
        <div class="messages overflow-auto">
          <ul v-for="(msg, i) in messages" :key="i" class="message">
            <!--begin::Message In-->
            <li
                class="d-flex flex-column mb-5 align-items-start"
                v-if="hostDetail.user_id === msg.send_by"
            >
              <div class="d-flex align-items-center">
                <div class="user_image mr-3">
                  <img
                      alt="avatar"
                      v-if="hasReceiverAvatar"
                      :src="hostDetail?.user?.avatar"
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
              >{{ hostDetail?.user?.name }}</span>
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
        </div>
      </div>
      <div class="d-flex align-items-center send__message--wrapper">
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
            @keyup.enter="send"
        />
        <div class="">
          <button
              type="button"
              @click="send"
              class="btn btn-md text-uppercase send_message_btn font-weight-bold chat-send py-2 px-6"
          >
            <i class="bi bi-send"></i>
          </button>
        </div>
        <!--begin::Compose-->
      </div>
    </div>
  </div>
</template>

<script>

import firebase from "@/firebase";
import moment from "moment";
import EmojiPicker from "vue3-emoji-picker";
import "vue3-emoji-picker/css";

export default {
  name: "PrivateChat",
  props: {
    authUser: Object,
    hostDetail: Object,
    activeTab: String
  },
  components: {
    EmojiPicker,
  },
  data() {
    return {
      ref: "",
      message: "",
      mainKey: "private-chats",
      chatKey: "",
      messages: [],
      hasNotPermission: false,
      hasReceiverAvatar: true,
      hasAuthAvatar: true,
    }
  },
  created() {
    this.ref = firebase.database().ref();
    this.chatKey = this.hostDetail.user_id + '&&' + this.authUser.uuid;
    console.log('shub '+this.authUser);
  },
  mounted() {
    console.log('private chat mounted');
    this.ref.child(this.mainKey)
        .child(this.chatKey)
        .child('message')
        .on("value", (msg) => {
          try {
            let data = msg.val();
            if (data && data.length > 0) {
              this.messages = data;
            }
          } catch (error) {
          }
        });
    setTimeout(() => {
      this.scrollBottom();
    }, 500)
  },
  watch:{
    activeTab(val){
      if(val == 'private'){
        this.scrollBottom();
      }
    }
  },
  computed: {
    authFirstLetter() {
      return this.authUser?.name.substring(0, 1)?.toUpperCase();
    },
    receiverNameFirstLetter() {
      return this.hostDetail?.user?.name.substring(0, 1)?.toUpperCase();
    },
  },
  methods: {
    setUserToken() {
      try {
           axios.post("/user/"+this.authUser.uuid, {
            host_id:this.hostDetail.user_id
           }).then((resp)=> {
            });
           
        } catch (error) {
            console.log(error);
        }
    },
    send() {
      const date = new Date();
      // console.log("condition", this.authUser && this.authUser.token > 0);
      this.hasNotPermission = !this.authUser;
      if (this.message && !this.hasNotPermission) {
        if (this.message) {
          this.ref
              .child(this.mainKey)
              .orderByKey()
              .equalTo(this.chatKey)
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
                  this.ref
                      .child(this.mainKey)
                      .child(this.chatKey)
                      .child("message")
                      .set(msgClone);
                  
                  this.setUserToken();

                  this.message = "";
                } else {
                  const data = {
                    users: [this.authUser, this.hostDetail.user],
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
                  this.ref
                      .child(this.mainKey)
                      .child(this.childKey)
                      .set(data);

                  this.setUserToken();
                  this.message = "";
                }
              });
          //             }
        }
        this.scrollBottom();
      }
    },
    scrollBottom() {
      setTimeout(() => {
        const element = document.querySelector(".messages");
        element.scrollTop = element.offsetHeight * 60;
      }, 500);
    },
    changeReceiverAvatar() {
      this.hasReceiverAvatar = false;
    },
    changeAuthAvatar(e) {
      this.hasAuthAvatar = false;
    },
    formatTime(time) {
      return moment(time).format("DD-MM-YYYY hh:mm A");
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
    onSelectEmoji(emoji) {
      this.message += emoji.i;
    },
  },
}
</script>

<style>
.v3-emoji-picker {
  inset: auto 0 0 !important;
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
</style>
<style scoped>
.h-92 {
  height: 89% !important;
}

.send__message--wrapper {
  background-color: #26272b !important;
  padding: 0.6rem;
}

.send__message--wrapper input {
  background-color: transparent;
  color: #fff !important;
}

.send__message--wrapper input:focus {
  background-color: transparent !important;
  box-shadow: none !important;
}

.overflow-auto {
  overflow: auto;
}
</style>
