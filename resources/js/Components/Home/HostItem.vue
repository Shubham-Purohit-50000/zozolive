<template>
    <div class="col-lg-2 col-6">
        <a :href="`/stream/${host.user.username}`" class="card list">
            <span class="total_live--icon onlineDedector badge bg-success"
               v-if="host.is_online" >Live</span
            >
            <span class="total_live--icon onlineDedector badge bg-warning"
               v-else-if="host.user.is_online" >Online</span
            >
            <span class="total_live--icon onlineDedector badge bg-danger"
               v-else>Offline</span
            >
            <img v-if="host.is_online"
                :src="host.user.live_image"
                class="card-img-top"
                alt="..."
            /> 
            <img v-else
              :src="'/images/'+host.user.profile_image"
                class="card-img-top"
                alt="..."
            />
            <div class="caption">
                <span>{{ host.user.name }}</span>
                <img :src="host.cflag" />
            </div>
        </a>
    </div>
</template>

<script>
export default {
    props: ["host"],
};
</script>

<style>
.onlineDedector {
    position: absolute;
    font-size: 10px;
    margin: 5px;
}
.bg-success {
    background: rgb(11, 162, 64) !important;
}
.bg-warning {
    background: rgb(200, 129, 7) !important;
}
.bg-danger {
    background: rgb(200, 23, 7) !important;
}
</style>

<style scoped>
@media screen and (max-width: 440px){
    .card-img-top{
        height: 12rem !important;
    }
}
</style>