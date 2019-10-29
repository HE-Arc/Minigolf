<template>
  <v-app-bar
    class="navbar"
    :style="`border-bottom: 2px solid ${$vuetify.theme.currentTheme.primary}`"
    :class="sticky ? 'sticky' : 'normal'"
    :elevation="sticky ? '3' : '0'"
    v-scroll="onScroll"
    short
  >
    <div class="nav-logo" cols="2">
      <transition name="fade">
        <Logo class="nav-logo" v-show="sticky" nav />
      </transition>
    </div>
    
    <Categories class="categories"/>
    
    <div class="mobile-icon" shrink>
      <v-app-bar-nav-icon @click.stop="$emit('drawer')" />
    </div>
  </v-app-bar>
</template>

<script>
import Logo from "../Logo";
import Categories from './Categories';

export default {
  name: "AppBar",
  components: { Categories, Logo },
  props: {
    drawer: { type: Boolean }
  },
  data: () => ({
    elevate: true,
    sticky: false,
    stickyHeight: 160,
    links: [
      { name: "Laderboard", to: "" },
      { name: "Numbers", to: "" },
      { name: "Download", to: "" },
      { name: "About", to: "" },
      { name: "Contact", to: "" }
    ]
  }),
  methods: {
    onScroll(e) {
      this.sticky = window.pageYOffset >= this.stickyHeight;
    }
  }
};
</script>

<style lang="scss" scoped>
@import "../../assets/scss/variables";

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}

.fade-enter,
.fade-leave-to {
  opacity: 0;
}

.navbar {
  z-index: 2;
}

.nav-logo {
  position: absolute;
  top: 4px;
  @media screen and (max-width: $medium) {
  }
}

.categories {
  /*display: block;*/
  @media screen and (max-width: $tablet) {
    display: none;
  }
}

.search {
  display: block;
  @media screen and (max-width: $mobile) {
    display: none;
  }
}

.user {
  display: flex;
  @media screen and (max-width: $medium) {
    display: none;
  }
}

.mobile-icon {
  display: none;
  position: absolute;
  right: 10px;
  top: 5px;
  @media screen and (max-width: $tablet) {
    display: flex;
  }
}

.normal {
  top: 160px;
}

.sticky {
  position: sticky;
  top: 0;
}
</style>
