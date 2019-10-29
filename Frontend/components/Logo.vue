<template>
<div>
  <nuxt-link to="/" class="link-wrapper">
    <div class="logo">
      <v-icon class="icon" :style="iconStyle">mdi-fingerprint</v-icon>
      <span class="text" :style="textStyle">SwipeD</span>
    </div>
  </nuxt-link>
</div>
</template>

<script>
export default {
  name: 'Logo',
  components: {},
  props: {
    nav: { type: Boolean },
  },
  data: () => ({
    offsetTop: 0,
  }),
  computed: {
    textStyle() {
      return {
        'font-size': (this.nav ? '24' : '44') + 'px',
        'color': this.$vuetify.theme.currentTheme.primary
      }
    },
    iconStyle() {
      return {
        'font-size': (this.nav ? '34': '64') + 'px',
      }
    }
  },
};
</script>

<style lang="scss" scoped>
  @import url('https://fonts.googleapis.com/css?family=Work+Sans&display=swap');

  .link-wrapper {
    text-decoration: none;
  }

  .logo {
    margin: 0;
    display: flex;
    align-items: center;
    background-color: #fff;
  
    .icon {
      /*font-size: 2em;*/
    }
  
    .text {
      /*margin-top: 2px;*/
      font-family: "Work Sans", sans-serif;
      font-weight: bold;
    }
  }

</style>
