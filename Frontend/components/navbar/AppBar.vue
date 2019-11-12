<template>
  <v-app-bar
    class="navbar"
    :style="`border-bottom: 2px solid ${$vuetify.theme.currentTheme.primary}`"
    :class="sticky ? 'sticky-nav' : 'normal-nav-position'"
    :elevation="sticky ? '3' : '0'"
    v-scroll="onScroll"
    short
  >
    <div class="nav-elements">
      <nav-logo class="nav-logo" :show="sticky" />

      <Categories class="categories" />

      <v-app-bar-nav-icon class="mobile-button" @click.stop="$emit('drawer')" />

      <darkmode-switch class="dark-mode-switch" />
    </div>
  </v-app-bar>
</template>

<script>
import Logo from "../Logo";
import Categories from "./Categories";
import DarkmodeSwitch from "./DarkmodeSwitch";
import NavLogo from "./NavLogo";

export default {
  name: "AppBar",
  components: { NavLogo, DarkmodeSwitch, Categories, Logo },
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

.nav-elements {
  width: 100%;
  display: flex;
  align-items: center;

  .nav-logo {
    position: absolute;
    @media screen and (max-width: $medium) {
    }
  }

  .categories {
    @media screen and (max-width: $tablet) {
      display: none;
    }
  }

  .mobile-button {
    display: none;
    position: absolute;
    right: 10px;
    top: 5px;
    @media screen and (max-width: $tablet) {
      display: flex;
    }
  }

  .dark-mode-switch {
    @media screen and (max-width: $tablet) {
    }
  }
}

.normal-nav-position {
  top: 160px;
}

.sticky-nav {
  position: sticky;
  top: 0;
}
</style>
