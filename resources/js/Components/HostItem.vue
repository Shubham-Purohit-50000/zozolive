<template>
  <div class="col-lg-2 col-6">
   <a :href="`/stream/${host.user.username}`" class="card list">
   <span :class="['total_live--icon ', host.is_online ? 'onlineDedector' : 'offlineDedector']">●</span>
            <img
                :src="host.user.live_image"
                class="card-img-top"
                alt="..."
            />
      <div class="caption">
        <span>{{host.user.name}}</span>
      </div>
    </a>
  </div>
</template>

<script>
export default {
  name: "HostItem",
  props: ['host'],
}
</script>
<style>
.onlineDedector{
        position: absolute;
    color: #9fe20d;
    font-size: 20px;
    background: #00000099;
    width: 11%;
}
.offlineDedector{
        position: absolute;
    color: #6b0807;
    font-size: 20px;
    background: #00000099;
    width: 11%;
}
</style>
