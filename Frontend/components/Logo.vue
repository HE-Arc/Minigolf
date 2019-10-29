<template>
<div>
  <nuxt-link to="/" class="link-wrapper">
    <div class="logo">
      <img class="image" :width="width" src="../assets/logo.png" alt="snase logo"/>
      <span class="text" :style="`font-size:${fontsize}em`">SwipeD</span>
    </div>
  </nuxt-link>
</div>
</template>

<script>
export default {
  name: "Logo",
  components: {},
  props: {
    width: { type: String },
    fontsize: { tyype: String}
  },
  data: () => ({
    offsetTop: 0
  }),
  computed: {}
};
</script>

<style lang="scss" scoped>

  .link-wrapper {
    text-decoration: none;
  }
  
  .logo {
    margin: 0;
    display: flex;
    align-items: center;
    background-color: #fff;
    top: 2px;
    
    .image {
    
    }
    
    .text {
      color: #ec008c;
      letter-spacing: 10px;
    }
  }

</style>
