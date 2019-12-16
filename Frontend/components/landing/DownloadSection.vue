<template>
  <v-parallax src="02.jpg" height="380" id="download">
    <div class="wrapper">
      <div class="line-one headline white--text mb-3">
        {{ firstLine }}
      </div>
      <div>
        <em>
          {{ secondLine }}
        </em>
      </div>
      <div class="buttons mt-5">
        <download-button class="mr-5" brand="google" />
        <download-button brand="apple" />
      </div>
    </div>
  </v-parallax>
</template>

<script>
import DownloadButton from "../elements/buttons/DownloadButton";
export default {
  name: "DownloadSection",
  components: { DownloadButton },
  data: () => ({
    firstLine:
      "The free app that makes your life easier is now available on both stores.",
    secondLine: "Download it now and start having fun !"
  })
};
</script>

<style lang="scss" scoped>
.wrapper {
  display: flex;
  flex-direction: column;
  justify-content: center;
  text-align: center;
}
</style>
