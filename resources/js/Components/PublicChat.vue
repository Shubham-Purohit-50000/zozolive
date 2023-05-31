<template>
  <div
      class="tab-pane fade show active"
      id="bordered-justified-home"
      role="tabpanel"
      aria-labelledby="home-tab"
  >
    <ul class="messages__box ml-2">
      <li
          class="messages__box--message left"
          v-for="(msg, i) in messages"
          :key="i"
      >
                <span class="messages__box--user_name">{{
                    msg.send_by_user
                  }}</span>
        {{ msg.msg }}
      </li>
    </ul>
    <div class="public__chat--alert" v-if="hasNotPermission">
      <span> This model allows chatting only for users with tokens </span>
      <!--      <span>With tokens, you get to</span>-->
      <button class="btn public__chat--alert_btn">Buy Tokens</button>
    </div>
    <div class="my-2 chat__box">
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
</template>

<script>
import firebase from "@/firebase";

export default {
  name: "PublicChat",
  props: {
    hostDetail: String,
    activeTab: String
  },
  data() {
    return {
      db: "",
      ref: "",
      message: "",
      chatKey: "public-chats",
      messages: [],
      userId: 1,
      hasNotPermission: false,
    };
  },
  created() {
    this.db = firebase.database();
    // .get();
    //   const ref = this.db.ref();
    this.ref = firebase.database().ref();
  },
  computed: {
    authUser() {
      return this.$page.props.auth.user || null;
    },
  },
  mounted() {
    this.ref.child(this.chatKey).child(this.hostDetail?.uuid).on("value", (msg) => {
      try {
        let data = msg.val();
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
    });
    this.scrollBottom();
  },
  methods: {
    send() {
      const date = new Date();
      // console.log("condition", this.authUser && this.authUser.token > 0);
      if (this.authUser) {
        this.hasNotPermission = false;
      } else {
        this.hasNotPermission = true;
      }
      if (this.message && !this.hasNotPermission) {
        this.ref
            .child(this.chatKey)
            .child(this.hostDetail.uuid)
            .orderByKey()
            // .equalTo(this.chatKey)
            .get()
            .then((snap) => {
              if (snap.exists()) {
                const data = {
                  msg: this.message,
                  send_by: this.authUser.uuid,
                  send_by_user: this.authUser.name,
                  // avatar: 2,
                  send_at: date,
                };
                var msgClone = this.messages;
                msgClone.push(data);
                this.ref
                    // .child(this.chatKey)
                    .child(this.chatKey)
                    .child(this.hostDetail?.uuid)
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
                this.ref.child(this.chatKey).child(this.hostDetail?.uuid).set(data);
              }
              this.message = "";
            });
        this.scrollBottom();
      }
    },
    scrollBottom() {
      console.log("scrolling");
      // setTimeout(() => {
      const element = document.querySelector(".messages__box");
      console.log('element', element.offsetHeight);
      element.scrollTop = element.offsetHeight * 60;
      // }, 500);
    },
  },
};
</script>

<style scoped>
.messages__box {
  transition: 0.5s all;
}
</style>
