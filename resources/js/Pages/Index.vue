<template>
    <UserLayout>
        <div class="special-deals" v-if="!authUser || (authUser && authRole == 'user')">
            <div class="text-white">Special Deal - 50% OFF</div>
            <div class="text-golden">JOIN NOW - ENJOY 50% DISCOUNT</div>
            <a href="/buy-token"  class="bg-golden get__token">
                GET TOKENS
            </a>
        </div>
        <section class="section">
            <div class="row align-items-top" v-if="getHostData && getHostData.length > 0">
                <HostItem v-for="host in getHostData" :key="host.uuid" :host="host" />
            </div>
          <div v-else>
            <h3 class="text-center mt-5 mb-3">No Host online...</h3>
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
        this.$store.commit("setAllHosts", this.hosts);
    },
    computed: {
        getHostData() {
            return this.$store.state.hosts;
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
