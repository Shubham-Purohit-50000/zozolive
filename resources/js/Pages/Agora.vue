<template>
  <main>
<!--    <div class="container">-->
<!--      <div class="row">-->
<!--        <div class="col-12 text-center">-->
<!--&lt;!&ndash;          <img src="img/agora-logo.png" alt="Agora Logo" class="img-fuild"/>&ndash;&gt;-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
    <div class="container my-5">
      <div class="row">
        <div class="col">
          <div class="btn-group" role="group" v-show="showUserList">
            <button
                type="button"
                class="btn btn-primary mr-2"
                v-for="user in allusers"
                :key="user.uuid"
                @click="placeCall(user.uuid, user.name)"
            >
              Call {{ user.name }}
              <span class="badge badge-light">{{
                  getUserOnlineStatus(user.uuid)
                }}</span>
            </button>
          </div>
        </div>
      </div>

      <!-- Incoming Call  -->
      <div class="col-md-12">
        <div class="row my-5" v-if="incomingCall">
          <div class="col-md-12 callBox">
            <p>Incoming Call From <strong>{{ incomingCaller }}</strong></p>
            <span>Calling</span>
            <div class="btn-group actionBTN" role="group">
              <button type="button" class="btn btn-danger" data-dismiss="modal" @click="declineCall">
                Decline
              </button>
              <button type="button" class="btn btn-success ml-5" @click="acceptCall">
                Accept
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- End of Incoming Call  -->
    </div>

    <section id="video-container" v-if="callPlaced">
      <div id="local-video"></div>
      <div id="remote-video"></div>

      <div class="action-btns">
        <button type="button" class="btn btn-info" @click="handleAudioToggle">
          {{ mutedAudio ? "Unmute" : "Mute" }}
        </button>
        <button
            type="button"
            class="btn btn-primary mx-4"
            @click="handleVideoToggle"
        >
          {{ mutedVideo ? "ShowVideo" : "HideVideo" }}
        </button>
        <button type="button" class="btn btn-danger" @click="endCall">
          EndCall
        </button>
      </div>
    </section>
  </main>


  <div class="modal fade" id="incomingCall" tabindex="-1">
    <div class="modal-dialog modal-sm">
      <div class="modal-content" style="background: transparent">
        <div class="modal-header ps-0">
          <button
              type="button"
              class="customClose"
              data-bs-dismiss="modal"
              aria-label="Close"
          >
            ×
          </button>
        </div>

        <div class="modal-body modal-body-all">
          <div
              class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center"
          >
            <div class="card row mb-3">
              <div class="card-body modal-body-all">
                <div class="col-md-12">
                  <div class="row my-5" v-if="incomingCall">
                    <div class="col-md-12 callBox">
                      <p>Incoming Call From <strong>{{ incomingCaller }}</strong></p>
                      <span>Calling</span>
                      <div class="btn-group actionBTN" role="group">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" @click="declineCall">
                          Decline
                        </button>
                        <button type="button" class="btn btn-success ml-5" @click="acceptCall">
                          Accept
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
  </div>
  <button type="button" class="btn private_chat--btn mt-3" data-bs-toggle="modal" data-bs-target="#incomingCall"
          id="showmodal">Show Modal
  </button>
</template>

<script>
export default {
  name: "AgoraChat",
  props: ["authuser", "authuserid", "allusers", "agora_id", "appCertificate", "currentUser"],
  data() {
    return {
      callPlaced: false,
      client: null,
      localStream: null,
      mutedAudio: false,
      mutedVideo: false,
      userOnlineChannel: null,
      onlineUsers: [],
      incomingCall: false,
      incomingCaller: "",
      agoraChannel: 'a371a4837cff4250aa5192a7ac9e0fb3',
      showUserList: true
    };
  },
  mounted() {
    this.initUserOnlineChannel();
    this.initUserOnlineListeners();
    this.initializeAgora();
  },
  methods: {

    initUserOnlineChannel() {
      this.userOnlineChannel = window.Echo.join("agora-online-channel");

      console.log(this.userOnlineChannel)
    },
    initUserOnlineListeners() {
      console.log('onldine');
      this.userOnlineChannel.here((users) => {
        console.log('df', users)
        this.onlineUsers = users;
      });
      this.userOnlineChannel.joining((user) => {
        // check user availability
        const joiningUserIndex = this.onlineUsers.findIndex(
            (data) => data.id === user.uuid
        );
        if (joiningUserIndex < 0) {
          this.onlineUsers.push(user);
        }
      });
      this.userOnlineChannel.leaving((user) => {
        const leavingUserIndex = this.onlineUsers.findIndex(
            (data) => data.id === user.uuid
        );
        this.onlineUsers.splice(leavingUserIndex, 1);
      });
      // listen to incomming call
      Echo.channel('agora-online-channel').listen(".broadcastAs", ({data}) => {
        console.log(data);
        if (parseInt(data.userToCall) === parseInt(this.authuserid)) {
          const callerIndex = this.onlineUsers.findIndex(
              (user) => user.uuid === data.from
          );
          // this.incomingCaller = this.onlineUsers[callerIndex]["name"];
          this.incomingCaller = 'test';
          this.incomingCall = true;
          $('#incomingCall').modal('show')
          // document.getElementById('showmodal').click();
          // $("#incomingCall").modal('show');
          // the channel that was sent over to the user being called is what
          // the receiver will use to join the call when accepting the call.
          this.agoraChannel = data.channelName;
        }
      });
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
    async placeCall(id, calleeName) {
      this.showUserList = false;
      try {
        // channelName = the caller's and the callee's id. you can use anything. tho.
        const channelName = this.agoraChannel;
        const tokenRes = await this.generateToken(channelName);
        // Broadcasts a call event to the callee and also gets back the token
        await axios.post("/agora/call-user", {
          user_to_call: id,
          username: this.authuser,
          channel_name: channelName,
        });
        this.initializeAgora();
        this.joinRoom(tokenRes.data, channelName);
      } catch (error) {
        console.log(error);
      }
    },
    async acceptCall() {
      this.showUserList = false;
      this.initializeAgora();
      const tokenRes = await this.generateToken(this.agoraChannel);
      this.joinRoom(tokenRes.data, this.agoraChannel);
      this.incomingCall = false;
      $('#incomingCall').modal('hide');
      this.callPlaced = true;
    },
    declineCall() {
      // You can send a request to the caller to
      // alert them of rejected call
      this.incomingCall = false;
    },
    generateToken(channelName) {
      var agoraToken = axios.post("/agora/token", {
        channelName,
      });
      return agoraToken;
    },
    /**
     * Agora Events and Listeners
     */
    initializeAgora() {
      this.client = AgoraRTC.createClient({mode: "rtc", codec: "h264"});
      console.log('dfsad');
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
      console.log(token);

      await this.client.join(
          token,
          channel,
          this.$props.authuseruid,
          (uid) => {
            console.log("User " + uid + " join channel successfully");
            this.callPlaced = true;
            this.createLocalStream();
            this.initializedAgoraListeners();
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
      this.client.on("stream-added", ({stream}) => {
        console.log("New stream added: " + stream.getId());
        this.client.subscribe(stream, function (err) {
          console.log("Subscribe stream failed", err);
        });
      });
      this.client.on("stream-subscribed", (evt) => {
        // Attach remote stream to the remote-video div
        evt.stream.play("remote-video");
        this.client.publish(evt.stream);
      });
      this.client.on("stream-removed", ({stream}) => {
        console.log(String(stream.getId()));
        stream.close();
      });
      this.client.on("peer-online", (evt) => {
        console.log("peer-online", evt.uid);
      });
      this.client.on("peer-leave", (evt) => {
        var uid = evt.uid;
        var reason = evt.reason;
        console.log("remote user left ", uid, "reason: ", reason);
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
    endCall() {
      this.localStream.close();
      this.showUserList = true;
      this.client.leave(
          () => {
            console.log("Leave channel successfully");
            this.callPlaced = false;
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
  },
};
</script>

<style scoped>
main {
  margin-top: 50px;
}

#video-container {
  width: 80%;
  min-height: 70vh;
  max-width: 90vw;
  max-height: 70vh;
  margin: 0 auto;
  border: 1px solid #099dfd;
  position: relative;
  box-shadow: 1px 1px 11px #9e9e9e;
  background-color: #fff;
}

#local-video {
  width: 30%;
  height: 30%;
  position: absolute;
  left: 10px;
  bottom: 10px;
  border: 1px solid #fff;
  border-radius: 6px;
  z-index: 2;
  cursor: pointer;
}

#remote-video {
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  top: 0;
  z-index: 1;
  margin: 0;
  padding: 0;
  cursor: pointer;
}

.action-btns {
  position: absolute;
  bottom: 20px;
  left: 50%;
  margin-left: -50px;
  z-index: 3;
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
}

#login-form {
  margin-top: 100px;
}

#showmodal {
  display: none;
}

#incomingCall .callBox {
  text-align: center;
  color: #fff
}

#incomingCall .callBox p {
  color: #fff
}

#incomingCall .callBox .actionBTN {
  display: flex;
}

#incomingCall .callBox .actionBTN button {
  margin: 10px;
  border-radius: 27px;
}
</style>
