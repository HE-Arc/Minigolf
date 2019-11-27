<template>
  <div>
    <parallax-top />
    <hero-section />
    <download-section />
    <register-section />
  </div>
</template>

<script>
import ParallaxTop from "../components/landing/ParallaxTop";
import HeroSection from "../components/landing/HeroSection";
import DownloadSection from "../components/landing/DownloadSection";
import RegisterSection from "../components/landing/RegisterSection";

export default {
  components: { DownloadSection, HeroSection, ParallaxTop, RegisterSection },
  layout: "landing"
};
</script>

<style lang="scss" scoped></style>
