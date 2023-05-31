<template>
    <UserLayout>
        <section class="section" v-if="hosts && hosts.length">
            <h3 class="mb-4">My Favorites</h3>
            <div class="row align-items-top">
                <HostItem v-for="host in hosts" :key="host.uuid" :host="host" />
            </div>
        </section>
        <section v-else class="d-flex justify-content-center align-items-center no_favorite">
            <div >
                <h3 class="mb-4">Your Favorites list is empty.</h3>
                <p class="mb-2">Choose models you like and add them to Favorites.</p>
                <p>All your favorites models will be shown here.</p>
                <a href="/" class="btn show_model--btn mt-2">Show Models</a>
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
};
</script>

<style scoped>
.show_model--btn{
    background-color: var(--primary);
    color: #fff;
    padding-left: 1rem;
    padding-right: 1rem;
    border-radius: 2rem;
}
.no_favorite{
    height: 40vh;
}
</style>
