<template>
  <div
      class="tab-pane fade show active"
      id="bordered-justified-home"
      role="tabpanel"
      aria-labelledby="home-tab"
  >
    <ul :class="['messages__box ml-2', !sended_tip ? 'top_postion' : '']" :style="!sended_tip ? 'height:17rem' : 'height:27rem'">
      <li
          :class="['messages__box--message']"
          v-for="(msg, i) in messages"
          :key="i"
      >
                <!-- <span class="messages__box--user_name">{{
                    msg.send_by_user
                  }}</span> -->
                  <div v-if="msg.msg.includes('tipped')" class="text-center">
                    <span v-if="msg.user_token">
                     <a  :style="{'color':msg.level_data ? msg.level_data.color : ''}" href="#" @click="showToast(authUserLevelData, msg.user_token)"> {{  msg.send_by_user }}  </a>
                  </span>
                  <span v-else>
                    {{  msg.send_by_user }} 
                  </span>
                  {{ msg.msg }} <img src="/assets/coin2.png" width="18" class="mb-4px" />
                  
                  </div>
                
                  <div v-else>
                    <span v-if="msg.user_token">
                     <a  :style="{'color':msg.level_data ? msg.level_data.color : ''}" href="#" @click="showToast(authUserLevelData, msg.user_token)"> {{  msg.send_by_user }}  </a>
                  </span>
                  <span v-else>
                    <span :class="[msg.send_by === hostDetail.user_id ? 'message__text' : '']"> {{  msg.send_by_user }} </span>
                  </span>
                  {{ msg.msg }}
                  
                  </div>
                  <div class="toast" :id="'liveToast'+msg.user_token" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                      <!-- <img src="..." class="rounded me-2" alt="..."> -->
                      <span class="badge me-auto" :style="{'background-color':msg.level_data ? msg.level_data.color : ''}">Level : {{ msg.level_data ? msg.level_data.level : null  }}</span>
                      <span class="badge  badge-pill badge-primary"><span class="text-white"><img src="/assets/coin2.png" width="18" class="mb-4px" /></span>{{ msg.user_token }}</span> 
                    
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
  
    <div>
          <div class="public__chat--alert" v-if="tipMenuDisplay && !sended_tip">
      <div v-if="!authUser" class="text-center"> To chat, <a href="#" @click="showLoginModel">log in</a> or 
        <a href="#" @click="showLoginModel"> create a free account.</a> 
      <!--      <span>With tokens, you get to</span>-->
      <br/>
      <a v-if="authUser" href="/buy-token" class="btn mt-2 btn-success">Buy Tokens</a>
      <a v-else @click="showLoginModel" class="btn mt-2 btn-success">Buy Tokens</a>
      </div>
     
      <div class="tip_menu" v-if="authUser && authUserLevelData.token > 0 && !sended_tip">
       <a  href="#" data-bs-toggle="modal"
        data-bs-target="#tipMenuModel"
        @click="showtipMenu()"><i class="bi bi-geo-fill"></i> Full tip menu </a>  is available 
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
                                                ref="cancelButton"
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
                                                                         <button class="btn btn-link" @click="sendUserTip(value2)"> {{ value2.menu_title }} </button>
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
                                                              
                                                                <label :class="[tip_menu_token_amount ? 'border-dark' : '']">
                                                                    <input
                                                                    :id="'token'+index3"
                                                                    v-model="tip_menu_token_amount"
                                                                    type="radio"
                                                                    name="token"
                                                                    :value="value3.token"
                                                                    class="d-none"
                                                                    />
                                                                    {{ value3.token }}
                                                                </label>
                                                            </li>
                                                        </ul>
                                                        <div>
                                                            &nbsp;&nbsp;<span
                                                                >Custom
                                                                Amount:</span
                                                            >
                                                            <input
                                                                v-model="tip_menu_token_amount"
                                                                type="text"
                                                            />
                                                        </div>

                                                        <div class="tip">
                                                            <button @click="sendUserTip">
                                                               {{ parseInt(authUser.token) > 0 ? 'Send Tip' : 'Buy Token' }} 
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
    <div :class="['my-2 chat__box', !sended_tip ? 'top_postion_chat_box' : 'top_postion_chat_box-2']" v-if="authUser && authUserLevelData.token > 0">
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
import EventBus from '../event-bus';
export default {
  name: "PublicChat",
  emits:['send-tip'],
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
      tipMenuDisplay: true,
      tip_menu_token_amount: 20,
      sended_tip: false,
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

    EventBus.on('send-tip', (value) => {
			this.message = value;
      this.send();
		});
  },
  methods: {
    sendUserTip(value = null) {
      console.log(value, 'values');
            try {
                axios.post("/user/send-tip", {
                    user_id: this.authUser.uuid,
                    host_id: this.hostDetail.user_id,
                    token_amount: value && value.token ? value.token : this.tip_menu_token_amount,
                }).then((resp)=>{
                    this.$refs.cancelButton.click();
                    console.log(resp);
                    if(resp.data.status!=='success') {
                      window.location.href = "/buy-token";
                      
                    } else {
                      if(value && value.token) {
                        this.message = 'tipped ' + value.token.toString();
                      } else {
                        this.message = 'tipped ' + this.tip_menu_token_amount.toString();
                      }
                     
                      this.send();
                      this.sended_tip = true;
                    }
                   
                  
                });
                } catch (error) {
                    console.log(error);
                }
           
        },
    showtipMenu() {
            $(".modal-backdrop.fade.show").removeClass("modal-backdrop");
        },
    getHostTipMenu() {
      try {
          axios.get("/host-tip-menu/?host_id="+this.hostDetail.user_id).then((resp)=> {
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
            if(this.authUser) {
                axios.get("/user_level/"+this.authUser.uuid).then((resp)=> {
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
                  user_token: this.authUser.token = (this.authUser.token-parseInt(this.tip_menu_token_amount)),
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
                  this.sended_tip = true;
                  this.getUserLevels();
                }
                this.message = "";
              } else {
                const data = [
                  {
                    msg: this.message,
                    send_by: this.authUser.uuid,
                    send_by_user: this.authUser.name,
                    user_token: this.authUser.token = (this.authUser.token-parseInt(this.tip_menu_token_amount)),
                    level_data: this.authUserLevelData,
                    // avatar: this.authUser.avatar,
                    // send_at: date,
                  },
                ];
                this.ref.child(this.chatKey).child(this.hostDetail?.uuid).set(data);
                if(this.message) {
                  this.sended_tip = true;
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
.message__text {
    background-color: var(--primary) !important;
    border-bottom-right-radius: 5px;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
    padding: 0px 2px 0px 2px;
}
.public__chat--alert {
  position: relative;

}

#chat_boxContent .chat__box .chat__box--wrapper {
  background-color: #242424;
}

#chat_boxContent .chat__box {
  position: relative;
}
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
.text-center {
  text-align: center;
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
    margin-left: 15px;
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
    margin-left: 0px;
}

.token_box label {
    background: #191919;
    padding: 8px;
    font-size: 18px;
    font-weight: 600;
    min-width: 60px;
    text-align: center;
    border-radius: 12px;
    cursor: pointer;
}
.border-dark {
    border: 2px solid #396220 !important;
}

@media (max-width: 700px) {
    .messages__box {
      position:absolute;
      top:15%;
      width: 100%;
     
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
  margin-top: -180px !important;
}

.top_postion_chat_box-2 {
  margin-top: 0px !important;
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
