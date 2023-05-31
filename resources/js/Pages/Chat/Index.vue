<template>
    <UserLayout>
        <div class="row">
            <div class="col-md-4 h-78 chat__users--wrapper">
                <div class="card card-custom h-100">
                    <div class="card-header">
                        <!-- <div class="d-flex justify-content-end">
                            <div class="form-check form-switch">
                                <input
                                    class="form-check-input cursor-pointer"
                                    type="checkbox"
                                    id="flexSwitchCheckDefault"
                                    @input="changeUserStatus"
                                    :checked="onlineStatus"
                                />
                                <label
                                    class="form-check-label"
                                    for="flexSwitchCheckDefault"
                                ></label>
                            </div>
                        </div> -->
                        <input
                            type="text"
                            class="form-control search__input form-control-solid py-6 text-white bg-transparent"
                            name="search"
                            placeholder="Search by username..."
                            v-model="search_user"
                        />
                    </div>
                    <hr />
                    <div class="card-body p-0 overflow-y-auto users__list">
                        <ChatUser
                            v-for="user in filteredUsers"
                            :key="user.uuid"
                            :user="user"
                            :selected-user="selectedUser"
                            @userSelected="userSelected"
                            @updateUserOnlineStatus="updateUserOnlineStatus"
                            :auth-user="authUser"
                            @updateUserList="updateUserList"
                        />
                    </div>
                </div>
            </div>
            <div class="col-md-8 h-78 msgs__list--wrapper">
                <div class="card card-custom h-100 msgs__list">
                    <Message
                        v-if="selectedUser"
                        :selected-user="selectedUser"
                        :auth-user="authUser"
                        :agoraChannel="agoraChannel"
                        :authuserid="authuserid"
                        :appCertificate="appCertificate"
                        :currentUser="currentUser"
                        :isCustomer="isCustomer"
                    />
                </div>
            </div>
        </div>
    </UserLayout>
</template>

<script>
import ChatUser from "./Shared/ChatUser.vue";
import Message from "./Shared/Message.vue";
import UserLayout from "@/Layouts/UserLayout";
import firebase from "@/firebase";

export default {
    components: {
        UserLayout,
        ChatUser,
        Message,
    },
    props: {
        users: {
            type: Array,
            default: () => [],
        },
        authuseruid: {
            type: [String, Number],
        },
        authuserid: {
            type: String,
        },
        agora_id: {
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
    provide() {
        return {
            db: this.db,
            userRole: this.userRole,
        };
    },
    data() {
        return {
            messages: {},
            selectedUser: null,
            isLoading: true,
            allUsers: this.$props.users,
            db: "",
            firebase_data: [],
            chatKey: "",
            ref: "",
            search_user: "",
            onlineStatus: false,
        };
    },
    async mounted() {
        this.db = firebase.database();
        this.ref = firebase.database().ref();
        await this.changeUserStatus(true);
        this.checkOnlineStatus();
        document.addEventListener("visibilitychange", (e) => {
            if (document.visibilityState === "visible") {
                this.changeUserStatus(true);
            } else {
                setTimeout(() => {
                    this.changeUserStatus(false);
                }, 10000 * 60);
            }
        });
        // window.addEventListener("focus", (e) => {
        //     this.changeUserStatus(true);
        // });
    },
    // watch: {
    //     messages(val) {
    //         if (val.length > 0) {
    //             this.allUsers.forEach((user) => {
    //                 if (user.user_id == this.selectedUser.user_id) {
    //                     let total_msg = this.messages.length;
    //                     user.recent_message =
    //                         this.messages[total_msg - 1].message || "";
    //                     user.recent_message_time =
    //                         this.messages[total_msg - 1].recent_message_time ||
    //                         "";
    //                 }
    //             });
    //         }
    //     },
    // },
    computed: {
        authUser() {
            return this.$page.props.auth.user;
        },
        userRole() {
            return this.$page.props.auth.user_role;
        },
        filteredUsers() {
            if (this.search_user) {
                let users = this.allUsers;

                return users.filter((item) => {
                    return item.name
                        .toLowerCase()
                        .includes(this.search_user.toLowerCase());
                });
            }
            return this.allUsers;
        },
    },
    methods: {
        updateUserOnlineStatus(data) {
            let index = this.allUsers.findIndex(
                (item) => item.uuid == data.user_id
            );
            if (index != -1) {
                Object.assign(this.allUsers[index], {
                    is_online: data.is_online,
                });
            }
            this.allUsers.sort((newItem, oldItem) => {
                let new_is_online = newItem.is_online || false;
                let old_is_online = oldItem.is_online || false;
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
        checkOnlineStatus() {
            this.ref
                .child("user-online-status")
                .child(this.authuserid)
                .get()
                .then((snap) => {
                    if (snap.exists()) {
                        let data = snap.val();
                        this.onlineStatus = data.is_online;
                        if (this.selectedUser) {
                            this.selectedUser.is_online = true;
                        }
                    }
                });
        },
        updateUserList(data) {
            let index = this.allUsers.findIndex(
                (item) => item.uuid == data.user_id
            );
            if (index != -1) {
                Object.assign(this.allUsers[index], {
                    send_at: data.send_at,
                    is_online: data.is_online,
                });
                // this.allUsers.sort((newItem, oldItem) => {
                //     let new_is_online = newItem.is_online || false;
                //     let old_is_online = oldItem.is_online || false;
                //     if (
                //         new_is_online === old_is_online &&
                //         (newItem.send_at || oldItem.send_at)
                //     ) {
                //         return (
                //             new Date(oldItem.send_at) -
                //             new Date(newItem.send_at)
                //         );
                //     }
                //     return old_is_online - new_is_online;
                //     // if (oldItem.send_at) {
                //     // let newDate = new Date(newItem.send_at);
                //     // let oldDate = new Date(oldItem.send_at);
                //     // return oldDate - newDate;
                //     // } else {
                //     //     console.log("else");
                //     //     return newItem.send_at ? 1 : 0;
                //     // }
                // });
            }
        },
        userSelected(user) {
            this.selectedUser = null;
            setTimeout(() => {
                this.selectedUser = user;
                this.chatKey =
                    this.authUser.uuid + "&&" + this.selectedUser.user_id;
                // this.fetchMessages();
            }, 500);
            var deviceWidth = document.documentElement.clientWidth;
            if (deviceWidth <= 768) {
                $('.msgs__list--wrapper').css('display', 'block');
                $('.chat__users--wrapper').css('display','none')
            }
        },
        async fetchMessages() {
            this.ref
                .child("private-chats")
                .child(this.chatKey)
                .child("message")
                .get()
                .then((snap) => {
                    if (snap.exists()) {
                        // this.chatKey = Object.keys(snap.val());
                        // console.log(this.chatKey);
                        this.messages = Object.values(snap.val());
                        // this.filtered_data = this.firebase_data.filter((item) => {
                        //     return (
                        //         item.user_ids.includes(this.selectedUser.user_id) &&
                        //         item.user_ids.includes(this.authUser.id)
                        //     );
                        // });
                        // this.db
                        //     .ref("messages/" + this.chatKey + "/message")
                        //     .set(e.message);
                        // console.log("snap", snap.val());
                    }
                });
            // var snap = await ref.child("messages").get();
            // if (snap.exists()) {
            //     this.chatKey = Object.keys(snap.val());
            //     this.firebase_data = Object.values(snap.val());
            //     this.filtered_data = this.firebase_data.filter((item) => {
            //         return (
            //             item.user_ids.includes(this.selectedUser.user_id) &&
            //             item.user_ids.includes(this.authUser.id)
            //         );
            //     });
            //     this.messages = this.filtered_data;
            // }
        },
        changeUserStatus(val) {
            this.ref.child("user-online-status").child(this.authuserid).set({
                is_online: val,
                updated_at: new Date().toLocaleString(),
            });
        },
        // fetchMessages(user = this.selectedUser, oldMessageIds = []) {
        //     this.isLoading = true;
        //     if (user) {
        //         axios
        //             .post("/chat/messages", {
        //                 patient_user_id: user.user_id,
        //                 old_message_ids: oldMessageIds,
        //             })
        //             .then((response) => {
        //                 if (this.messages.length > 0)
        //                     this.messages = [
        //                         ...this.messages,
        //                         ...response.data,
        //                     ];
        //                 else this.messages = response.data;
        //                 this.isLoading = false;
        //             });
        //     }
        // },
    },
};
</script>

<style scoped>
.h-78 {
    height: 78.5vh;
}
.card {
    background-color: #333;
    /* height: 76vh !important; */
}
.msgs__list {
    margin-bottom: 0 !important;
}
.card-header {
    background-color: #333;
}

.bg-transparent {
    background-color: #333;
}

/* .h-100 {
    min-height: 76vh;
    max-height: 70vh;
} */

.h-90 {
    height: 100%;
}

.users__list::-webkit-scrollbar {
    display: none;
}
.search__input {
    outline: none;
}
.search__input:focus {
    border: 1px solid var(--primary);
    box-shadow: none !important;
}

.users__list {
    -ms-overflow-style: none; /* IE and Edge */
    scrollbar-width: none;
}

.overflow-y-auto {
    overflow-y: auto;
}

@media screen and (max-width: 768px){
    .msgs__list--wrapper{
        display: none;
    }
}
</style>
