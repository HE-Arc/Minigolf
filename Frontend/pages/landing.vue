<template>
  <div>
    <section>
      <parallax-top />
    </section>
    <section>
      <hero-section />
    </section>
    <section>
      <download-section />
    </section>
    <section>
      <register-section />
    </section>
  </div>
</template>

<script>
import ParallaxTop from "../components/landing/ParallaxTop";
import HeroSection from "../components/landing/HeroSection";
import DownloadSection from "../components/landing/DownloadSection";
import RegisterSection from "../components/landing/RegisterSection";
export default {
  name: "landing",
  components: { DownloadSection, HeroSection, ParallaxTop, RegisterSection },
  layout: "landing"
};
</script>

<style lang="scss" scoped></style>
