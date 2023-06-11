<template>
    <div class="col-lg-2 col-6">
        <a :href="`/stream/${host.user.username}`" class="card list">
            <span class="total_live--icon onlineDedector badge bg-success"
                >Live</span
            >
            <img :src="host.user.live_image" class="card-img-top" alt="..." />
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
    background: rgb(11, 162, 64) !important;
    margin: 5px;
}
</style>

<style scoped>
@media screen and (max-width: 440px){
    .card-img-top{
        height: 12rem !important;
    }
}
</style>