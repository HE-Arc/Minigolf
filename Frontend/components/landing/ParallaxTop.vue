<template>
  <v-parallax src="01.jpg" height="500">
    <v-layout column align-center justify-center class="white--text">
      <h1 class="main-header white--text mb-2 display-1 text-xs-center">
        The way minigolf was ment to be played...
      </h1>
      <div class="sub-header white--text subheading mb-3 text-xs-center">
        For you and all your friends
      </div>
      <v-btn class="blue lighten-2 mt-5" dark large href="#">
        Get Started
      </v-btn>
    </v-layout>
  </v-parallax>
</template>

<script>
  export default {
    name: 'ParallaxTop',
  };
</script>

<style lang="scss" scoped>
  .main-header {
    font-weight: 900;
    text-shadow: 3px 2px #000;
  }
  
  .sub-header {
    font-weight: 900;
    text-shadow: 2px 2px #000;
  }
</style>
