<template>
    <UserLayout>
        <div class="special-deals" v-if="!authUser || (authUser && authRole == 'user')">
            <div class="text-white">Special Deal - 50% OFF</div>
            <div class="text-golden">JOIN NOW - ENJOY 50% DISCOUNT</div>
            <a href="/buy-token"  class="btn btn-success" v-if="authUser">
                <img src="/assets/coin2.png" width="18" class="mb-2px"/>  BUY TOKEN
            </a>  
            <a href="javascript::void();" data-bs-toggle="modal" data-bs-target="#basicModal"  class="btn btn-success" v-else>
                <img src="assets/coin2.png" width="18" class="mb-2px"/> BUY TOKEN
            </a>
        </div>
        <section class="section">
            <div class="row align-items-top">
                <div class="col-md-12 mb-3">
                    <h4>Live Users</h4>
                    <hr class="mb-5"/>
                    <div class="mb-5 row align-items-top" v-if="getLiveUserData.length > 0">
                        <HostItem v-for="host in getLiveUserData" :key="host.uuid" :host="host" />
                    </div>
                    <div class="mb-5" v-else>
                        No live user found 
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <h4>Online Users</h4>
                    <hr class="mb-5"/>
                    <div class="mb-5 row align-items-top" v-if="getOnlineUserData.length > 0">
                        <HostItem v-for="host in getOnlineUserData" :key="host.uuid" :host="host" />
                    </div>
                    <div class="mb-5" v-else>
                        No Online user found 
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <h4>Offline Users</h4>
                    <hr class="mb-5"/>
                    <div class="mb-5 row align-items-top" v-if="getOfflineUserData.length > 0">
                        <HostItem v-for="host in getOfflineUserData" :key="host.uuid" :host="host" />
                    </div>
                    <div class="mb-5" v-else>
                        No Offline user found 
                    </div>
                </div>

            </div>
         
            <div class="row alignitem_center" v-if="getHostData && getHostData.length > 5">
                <div class="col-md-5 border_botton"></div>
                <div class="col-md-2 text-center">
                    <button class="btn btn-default see-more-button">
                        See More
                    </button>
                </div>
                <div class="col-md-5 border_botton"></div>
            </div>
        </section>
    </UserLayout>
</template>

<script>
import HostItem from "@/Components/Home/HostItem.vue";
import UserLayout from "@/Layouts/UserLayout.vue";
export default {
    components: { HostItem, UserLayout },
    props: ["hosts"],
    mounted() {
        // this.$store.commit("setAllHosts", this.hosts);
    },
    computed: {
        getHostData() { 
            return this.hosts;
        },
        getLiveUserData() {
            return this.hosts.filter(node=>node.is_online===1)
        },
        getOnlineUserData() {
            return this.hosts.filter(node=>node.user.is_online===1 && node.is_online!==1)
        },
        getOfflineUserData() {
            return this.hosts.filter(node=>node.user.is_online!==1 && node.is_online!==1)
        },
        authUser() {
            console.warn('auth',this.$page.props);
            return this.$page?.props.auth?.user;
        },
        authRole() {
            console.warn('role',this.$page);
            return this.$page?.props.auth?.user_role;
        },
    },
};

// $(document).ready(function() {
//     navigator.mediaDevices.getUserMedia({ audio: true, video: true })
//       .then(function(stream) {
//         console.log('Camera and microphone permission granted!');
//         // Do something with the stream if needed
//       })
//       .catch(function(error) {
//         console.log('Error accessing camera and microphone:', error);
//       });
// });

</script>

<style scoped>
.special-deals {
    background-color: rgb(14, 122, 14);
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.6rem 0.8rem;
    margin-bottom: 1rem;
    font-weight: 600;
}
.text-golden {
    color: rgb(231, 169, 13);
}
.bg-golden {
    background-color: rgb(231, 169, 13);
}
.get__token {
    color: #000;
    padding: 0.4rem 1rem;
    border-radius: 2rem;
    border: none;
    outline: none;
}
</style>
