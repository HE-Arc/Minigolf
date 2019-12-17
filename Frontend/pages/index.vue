<template>
  <div>
    <v-row class="main-row pa-0" align="start" justify="center">
      <v-col class="ma-0 pa-0">
        <parallax-top />
        <hero-section />
        <download-section />
        <register-section />
      </v-col>
    </v-row>
  </div>
</template>

<script>
import ParallaxTop from "../components/landing/ParallaxTop";
import HeroSection from "../components/landing/HeroSection";
import DownloadSection from "../components/landing/DownloadSection";
import RegisterSection from "../components/landing/RegisterSection";

export default {
  components: { DownloadSection, HeroSection, ParallaxTop, RegisterSection },
  // layout: "landing"
};
</script>

<style lang="scss" scoped></style>
