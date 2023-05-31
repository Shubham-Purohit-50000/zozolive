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
                <!-- <span class="messages__box--user_name">{{
                    msg.send_by_user
                  }}</span> -->
                  <span >
                     <a  :style="{'color':authUserLevelData.color}" href="#" @click="showToast(authUserLevelData, msg.send_by)"> {{  msg.send_by_user }}  </a>
                  </span>
                  <div class="toast" :id="'liveToast'+authUserLevelData.color" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <!-- <img src="..." class="rounded me-2" alt="..."> -->
    <span class="badge me-auto" :style="{'background-color':authUserLevelData.color}">Level : {{ authUserLevelData.level  }}</span>
  
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" @click="closeToast(authUserLevelData)">
      <i class=" bi bi-x-lg"></i>
    </button>
  </div>
  <div class="toast-body">
    <small>Subscribed Plan : <span :style="{'color':authUserLevelData.color}"> {{ authUserLevelData.name  }} </span>  </small>

    <!-- <button class="btn btn-primary btn-sm">{{  Reply }}</button> -->
  </div>
</div>
        {{ msg.msg }}
      </li>
    </ul>
  
    <div v-if="hasNotPermission && !authUser">
          <div class="public__chat--alert">
      <div> To chat, <a href="#" @click="showLoginModel">log in</a> or <a href="#" @click="showLoginModel"> create a free account.</a> </div>
      <div class="tip_menu">
        Tip menu is available 

        <ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Cras justo odio
    <span class="badge badge-primary badge-pill">14</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Dapibus ac facilisis in
    <span class="badge badge-primary badge-pill">2</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Morbi leo risus
    <span class="badge badge-primary badge-pill">1</span>
  </li>
</ul>
      </div>


      <!--      <span>With tokens, you get to</span>-->
      <button class="btn public__chat--alert_btn">Buy Tokens</button>
    </div>
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
      hasNotPermission: true,
      authUserLevelData: {},
    };
  },
  created() {
    this.db = firebase.database();
    // .get();
    //   const ref = this.db.ref();
    this.ref = firebase.database().ref();
    // this.getUserLevels();
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
    this.getUserLevels();
  },
  methods: {
    closeToast(value) {
      document.getElementById('liveToast'+value.color).style.display='none'
    },
    showToast(value) {
      document.getElementById('liveToast'+value.color).style.display='block'
    },
    showLoginModel() {
      $("#basicModal").modal("show");
    },
    getUserLevels() {
      try {
            axios.get("/user_level/"+this.authUser.token).then((resp)=> {
              // console.log(resp);
              this.authUserLevelData = resp.data.data;
            });
        } catch (error) {
            console.log(error);
        }
    },
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
                if(this.message) {
                  this.getUserLevels();
                }
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
                if(this.message) {
                  this.getUserLevels();
                }
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
</style>
