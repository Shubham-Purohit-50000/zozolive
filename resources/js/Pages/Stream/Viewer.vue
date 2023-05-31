<template>
  <div>
    <video ref="video" autoplay></video>
  </div>
</template>

<script>
import Hls from 'hls.js';

export default {
name: "Viewer",
  mounted() {
    this.loadStream();
  },
  methods: {
    loadStream() {
      const video = this.$refs.video;

      // Create an HLS stream and attach it to the video element
      const hls = new Hls();
      hls.loadSource('/api/start-stream?user_id=1');
      hls.attachMedia(video);
      hls.on(Hls.Events.MANIFEST_PARSED, function () {
        video.play();
      });
    }
  }
};
</script>
