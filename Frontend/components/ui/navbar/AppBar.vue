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
      <pages class="pages" :pages="pages"/>
      <login-button class="login-button" />
      <darkmode-switch class="dark-mode-switch" />
      <v-app-bar-nav-icon class="mobile-button" @click="toggleDrawer"/>
    </div>
  </v-app-bar>
</template>

<script>
import Logo from "../../elements/Logo";
import Pages from "./Pages";
import DarkmodeSwitch from "./DarkmodeSwitch";
import NavLogo from "./NavLogo";
import LoginButton from "./LoginButton";

export default {
  name: "AppBar",
  components: { LoginButton, NavLogo, DarkmodeSwitch, Pages, Logo },
  props: {
    pages: { type: Array }
  },
  data: () => ({
    elevate: true,
    sticky: false,
    stickyHeight: 160
  }),
  methods: {
    onScroll(e) {
      this.sticky = window.pageYOffset >= this.stickyHeight;
    },
    toggleDrawer() {
      this.$store.commit("application/SET_DRAWER", true)
    }
  }
};
</script>

<style lang="scss" scoped>
@import "../../../assets/scss/variables";

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

  .pages {
    @media screen and (max-width: $tablet) {
      display: none;
    }
  }
  
  .login-button {
    @media screen and (max-width: $tablet) {
      display: none;
    }
  }
  
  .mobile-button {
    display: none;
    right: 10px;
    margin-left: 10px;
    @media screen and (max-width: $tablet) {
      display: flex;
    }
  }

  .dark-mode-switch {
    margin-left: auto;
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
