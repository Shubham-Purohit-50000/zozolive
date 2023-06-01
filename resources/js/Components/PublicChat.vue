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
                  <span v-if="msg.user_token">
                     <a  :style="{'color':msg.level_data ? msg.level_data.color : ''}" href="#" @click="showToast(authUserLevelData, msg.user_token)"> {{  msg.send_by_user }}  </a>
                  </span>
                  <span v-else>
                    {{  msg.send_by_user }} 
                  </span>
                  <div class="toast" :id="'liveToast'+msg.user_token" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <!-- <img src="..." class="rounded me-2" alt="..."> -->
    <span class="badge me-auto" :style="{'background-color':msg.level_data ? msg.level_data.color : ''}">Level : {{ msg.level_data ? msg.level_data.level : null  }}</span>
  
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" @click="closeToast(msg.user_token)">
      <i class=" bi bi-x-lg"></i>
    </button>
  </div>
  <div class="toast-body">
    <small>Subscribed Plan : <span :style="{'color':msg.level_data ? msg.level_data.color : ''}"> {{ msg.level_data ? msg.level_data.name : null  }} </span>  </small>

    <!-- <button class="btn btn-primary btn-sm">{{  Reply }}</button> -->
  </div>
</div>
        {{ msg.msg }}
      </li>
    </ul>
  
    <div v-if="hasNotPermission">
          <div class="public__chat--alert">
      <div v-if="!authUser" class="text-center"> To chat, <a href="#" @click="showLoginModel">log in</a> or 
        <a href="#" @click="showLoginModel"> create a free account.</a> 
      <!--      <span>With tokens, you get to</span>-->
      <br/>
      <button class="btn public__chat--alert_btn">Buy Tokens</button>
      </div>
     
      <div class="tip_menu" v-if="authUser">
       <a  href="#" data-bs-toggle="modal"
        data-bs-target="#tipMenuModel"
        @click="showtipMenu()">Full tip menu </a>  is available 
        <!--tip model start-->
    <div class="col-lg-6">
                        <div class="card chat_card h-100">
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
                                                                                    text-align: right"
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
                                                    <div
                                                        class="token_box"
                                                        style="height: 210px; background-color: #3b3b3b"
                                                    >
                                                        <ul>
                                                            <li v-for="(value3, index3) in host_tip_menus" 
                                                              :key="index3">
                                                                <label>
                                                                    {{ value3.token }}
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
                          </div>
                            
                    </div>
        <ul class="list-group mt-3">
  <li class="list-group-item d-flex bg-dark-1 text-white justify-content-between align-items-center" 
  v-for="(value, index) in host_tip_menus" 
  :key="index">
   {{ value.menu_title }}
    <span class="badge badge-primary badge-pill">{{ value.token }}</span>
  </li>
</ul>
      </div>

      
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
      host_tip_menus: [],
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
        console.log(msg.val());
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
    this.getHostTipMenu();
  },
  methods: {
    showtipMenu() {
            $(".modal-backdrop.fade.show").removeClass("modal-backdrop");
        },
    getHostTipMenu() {
      try {
          axios.get("/host-tip-menu/?host_id="+this.hostDetail.uuid).then((resp)=> {
              // console.log(resp);
              this.host_tip_menus = resp.data.host_tip_menu;
            });
           
        } catch (error) {
            console.log(error);
        }
    },
    closeToast(value) {
      document.getElementById('liveToast'+value).style.display='none'
    },
    showToast(value, token) {
      document.getElementById('liveToast'+token).style.display='block';
      this.getUserLevels(token);
    },
    showLoginModel() {
      $("#basicModal").modal("show");
    },
    getUserLevels(token = null) {
      try {
            if(token) {
              axios.get("/user_level/"+token).then((resp)=> {
              // console.log(resp);
              this.authUserLevelData = resp.data.data;
            });
            } else {
              axios.get("/user_level/"+this.authUser.token).then((resp)=> {
              // console.log(resp);
              this.authUserLevelData = resp.data.data;
            });
            }
           
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
                  user_token: this.authUser.token,
                  level_data: this.authUserLevelData,
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
                    user_token: this.authUser.token,
                    level_data: this.authUserLevelData,
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
.tip_menu {
  width: 100%;
}
.bg-dark-1 {
  background-color: #343434;
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

</style>
