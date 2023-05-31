<template>
  <div class="col-lg-2 col-6">
   <a :href="`/stream/${host.user.username}`" class="card list">
   <span class="total_live--icon onlineDedector">●</span>
            <img
                :src="host.user.avatar"
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
</style>
