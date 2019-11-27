<template>
  <div>
    <section><parallax-top /></section>
    <section><HeroSection /></section>
  </div>
</template>

<script>
import ParallaxTop from "../components/landing/ParallaxTop";
import HeroSection from "../components/landing/HeroSection";
export default {
  name: "landing",
  components: { HeroSection, ParallaxTop },
  layout: "landing"
};
</script>

<style lang="scss" scoped></style>
