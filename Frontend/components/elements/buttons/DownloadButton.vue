<template>
  <v-btn class="black lighten-2 mt-5 download-btn" :href="link" dark x-large>
    <v-icon class="mr-4" x-large>{{ icon }}</v-icon>
    <div class="text">
      <div>{{ firstLine }}</div>
      <div class="second-line">{{ secondLine }}</div>
    </div>
  </v-btn>
</template>

<script>
export default {
  name: "DownloadButton",
  props: {
    brand: { type: String },
    link: { type: String, default: "#" }
  },
  data: () => ({
    icon: null,
    firstLine: null,
    secondLine: null
  }),

  mounted() {
    if (this.brand == "google") {
      this.icon = "mdi-google-play";
      this.firstLine = "Get it on";
      this.secondLine = "Google Play";
    } else {
      this.icon = "mdi-apple";
      this.firstLine = "Download on the";
      this.secondLine = "App Store";
    }
  }
};
</script>

<style lang="scss" scoped>
.download-btn {
  border-radius: 10px;
  text-transform: none;

  .second-line {
    font-weight: bold;
    font-size: 20px;
  }
}
</style>
