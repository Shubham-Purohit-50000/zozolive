<template>
    <div
        class="user d-flex align-items-center cursor-pointer px-6 py-4"
        @click="selectUser"
    >
        <!--      :id="`user_${userData.uuid}`"-->
        <div class="user_image mr-3 position-relative">
            <img
                alt="Pic"
                :src="avatar"
                @error="changeAvatar"
                v-if="hasAvatar"
            />
            <span v-if="!hasAvatar" class="name__label">{{
                nameFirstLetter
            }}</span>
            <span
                class="online__status d-block"
                :class="isOnline ? 'bg-green' : 'bg-red'"
            ></span>
        </div>
        <div class="">
            <p class="mb-0 text-white font-weight-bold font-size-h5">
                {{ userData.name }}
            </p>
            <p class="text-light font-size-sm mb-0">
                {{ lastMessageText }}
            </p>
        </div>
        <div class="ml-auto message-pill">
            <span class="badge badge-pill badge-success" v-if="totalUnread > 0">
                {{ totalUnread }}
            </span>
            <span class="d-block last_msg_time">{{ lastMessageTime }}</span>
        </div>
    </div>
</template>

<script>
import moment from "moment";
// import firebase from "@/firebase";

export default {
    props: {
        user: {
            type: Object,
            required: true,
        },
        authUser: {
            type: Object,
        },
        selectedUser: {
            type: [String, Object],
        },
    },
    inject: ["userRole"],
    data() {
        return {
            selectedUserId: this.selectedUser ? this.selectedUser.uuid : null,
            userData: this.$props.user,
            avatar: this.$props.user.avatar || "",
            lastMessage: "",
            chatKey: "",
            db: "",
            ref: "",
            unreadMessages: [],
            totalUnread: 0,
            keysToUpdate: [],
            IsNotLastMessage: false,
            isOnline: false,
            isMounted: false,
            fetchedWithCurrentChatKey: false,
            hasAvatar: true,
        };
    },
    watch: {
        totalUnread(val, old) {
            this.$emit("updateTotalUnread", {
                newVal: val,
                oldVal: old || 0,
            });
        },
    },
    mounted() {
        //   remove active class from other users
        this.db = firebase.database();
        this.ref = firebase.database().ref("private-chats");
        if (this.authUser) {
            if (this.userRole == "model") {
                this.chatKey = this.authUser.uuid + "&&" + this.userData.uuid;
            } else {
                this.chatKey = this.userData.uuid + "&&" + this.authUser.uuid;
            }
        }
        // this.fetchLastMessage();
        if (this.userData && this.userData.avatar) {
            this.avatar = this.userData.avatar
                ? this.userData.avatar
                : "https://via.placeholder.com/50x50";
        }
        this.updateLastMessage();
        this.checkOnlineStatus();

        this.db
            .ref()
            .child("user-online-status")
            .child(this.userData.uuid)
            .on("value", (snap) => {
                if (snap.exists()) {
                    let data = snap.val();
                    this.isOnline = data.is_online;
                    console.log(this.userData );
                    this.$emit("updateUserOnlineStatus", {
                        user_id: this.userData.uuid,
                        is_online: data.is_online || 0,
                    });
                }
            });
        this.isMounted = true;
    },
    computed: {
        lastMessageTime() {
            if (this.lastMessage) {
                return moment(this.lastMessage.send_at).format("hh:mm a");
            }
            return "";
        },
        nameFirstLetter() {
            return this.userData?.name.substring(0, 1)?.toUpperCase();
        },
      lastMessageText(){
          return this.lastMessage.msg ? this.lastMessage.msg.substring(0,25)+'...' : "";
      }
    },
    methods: {
        checkOnlineStatus() {
            this.db
                .ref()
                .child("user-online-status")
                .child(this.userData.uuid)
                .get()
                .then((snap) => {
                    if (snap.exists()) {
                        let data = snap.val();
                        this.isOnline = data.is_online;
                        this.$emit("updateUserOnlineStatus", {
                            user_id: this.userData.uuid,
                            is_online: data.is_online || 0,
                        });
                    }
                });
        },
        selectUser(e) {
            this.userData.is_online = this.isOnline;
            this.$emit("userSelected", this.userData);
            this.selectedUserId = this.userData.uuid;
            this.$store.commit("updateChatKey", this.chatKey);
            this.markAllRead();
            //   remove active class from other users
            // document.querySelectorAll(".user").forEach((user) => {
            //     user.classList.remove("active");
            // });
            // e.target.classList.add("active");
            // remove unread count
            this.totalUnread = 0;
            // this.userData.recent_message_time = "";
            // this.userData.recent_message = "";
        },
        markAllRead() {
            if (this.totalUnread > 0) {
                this.ref
                    .child(`${this.chatKey}/message`)
                    .get()
                    .then((snap) => {
                        var data = snap.val();
                        // data.is_read = true;
                        data.map((item) => {
                            item.is_read = true;
                        });
                        // var newData = { ...data };
                        // console.log('new', newData);
                        this.ref.child(`${this.chatKey}/message`).set(data);
                    });
                //     // .child(this.chatKey)
                //     // .child("message")
                // .child(item)
                // .update(updates);
                // .then((snap) => {
                //     console.log('snap', snap.val());
                //     var msg = {
                //         is_read: true,
                //     };
                //     // msg[0] = true;
                //     this.ref
                //         .child(this.chatKey)
                //         .child("message")
                //         .child(item)
                //         // .child('is_read')
                //         .update(msg);
                // });
                //     });
            }
        },
        changeAvatar() {
            this.hasAvatar = false;
            // this.avatar = "https://via.placeholder.com/50x50";
        },
        updateLastMessage() {
            this.ref
                .child(this.chatKey)
                .child("message")
                .on("value", (msg) => {
                    // try {
                    this.fetchedWithCurrentChatKey = true;
                    let data = msg.val();
                    if (msg.exists()) {
                        this.$store.commit("updateChatKey", this.chatKey);
                        if (data.length > 0) {
                            this.unreadMessages = data.filter((item, key) => {
                                if (
                                    item.is_read == false &&
                                    item.send_by != this.authUser.uuid
                                ) {
                                    return true;
                                }
                                return false;
                            });
                            var old_last_msg = this.lastMessage;
                            this.totalUnread = this.unreadMessages.length;
                            this.lastMessage = data[data.length - 1];
                            if (
                                this.isMounted &&
                                this.lastMessage.send_by !=
                                    this.authUser.uuid &&
                                this.lastMessage.send_at !=
                                    old_last_msg?.send_at
                            ) {
                                try {
                                    var ad = new Audio(
                                        "/assets/notification-alert.mp3"
                                    );
                                    ad.play();
                                } catch (error) {}
                            }
                            this.$emit("updateUserList", {
                                user_id: this.userData.uuid,
                                send_at: this.lastMessage.send_at,
                                is_online: this.isOnline || false
                            });
                        }
                    } else {
                        if (this.IsNotLastMessage == false) {
                            // this.chatKey =
                            //     this.authUser.uuid + "&&" + this.userData.uuid;
                            // this.updateLastMessage();
                            this.IsNotLastMessage = true;
                        }
                    }
                    // } catch (error) {}
                });
            // setTimeout(() => {
            //     if (!this.fetchedWithCurrentChatKey && !this.IsNotLastMessage) {
            //         this.chatKey =
            //             this.authUser.uuid + "&&" + this.userData.uuid;
            //         this.updateLastMessage();
            //         this.fetchedWithCurrentChatKey = true;
            //         this.IsNotLastMessage = true;
            //     }
            // }, 2500);
        },
        fetchLastMessage() {
            this.ref
                .child(this.chatKey)
                .child("message")
                .get()
                .then((msg) => {
                    // try {
                    let data = msg.val();
                    if (msg.exists()) {
                        if (data.length > 0) {
                            this.unreadMessages = data.filter((item, key) => {
                                if (
                                    item.is_read == false &&
                                    item.send_by != this.authUser.uuid
                                ) {
                                    this.keysToUpdate.push(key);
                                    return true;
                                }
                                return false;
                            });
                            this.totalUnread = this.unreadMessages.length;
                            this.lastMessage = data[data.length - 1];
                            this.$emit("updateUserList", {
                                user_id: this.userData.uuid,
                                send_at: this.lastMessage.send_at,
                            });
                        }
                    } else {
                        if (this.IsNotLastMessage == false) {
                            this.chatKey =
                                this.authUser.uuid + "&&" + this.userData.uuid;
                            this.fetchLastMessage();
                            this.IsNotLastMessage = true;
                        }
                    }
                    // } catch (error) {}
                });
        },
    },
};
</script>

<style scoped>
.user {
    transition: all 0.2s ease-in-out;
}
.last_msg_time {
    font-size: 0.6rem;
}
.user_image {
    width: 3rem;
    height: 3rem;
}
.online__status {
    position: absolute;
    bottom: -6%;
    left: 40%;
    width: 0.8rem;
    height: 0.8rem;
    border-radius: 50%;
}
.user_image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}

.user:hover {
    background-color: #26272b;
    /* border-bottom: 1px solid #e5e5e5; */
}

.mr-3 {
    margin-right: 1rem;
}

.px-6 {
    padding-left: 1rem;
    padding-right: 1rem;
}

.active {
    background-color: #26272b;
}

.badge {
    padding: 0.3em 0.6em !important;
}

.badge-pill {
    /* padding-right: 0.6em !important; */
    /* padding-left: 0.6em !important; */
    border-radius: 50%;
    background-color: var(--primary);
}

.message-pill {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    /* width: 1.25rem; */
}

.cursor-pointer {
    cursor: pointer;
}
.bg-green {
    background-color: #198754;
}
.bg-red {
    background-color: #ff0000;
}
.name__label {
    border-radius: 50%;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 1px solid;
}
</style>
