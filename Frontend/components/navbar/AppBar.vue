<template>
  <v-app-bar
    class="navbar"
    :class="sticky ? 'sticky' : 'normal'"
    :elevation="sticky ? '3' : '0'"
    short
    v-scroll="onScroll"
  >
    <v-row justify="space-between" align="center">
      <v-col class="nav-logo" xs="2" grow>
        <transition name="fade">
          <Logo class="nav-logo" width="60" fontsize="2" v-show="sticky" />
        </transition>
      </v-col>

      <v-spacer />

      <v-col class="categories">
        lala
      </v-col>

      <v-col class="search" grow>
<!--        <search-nav />-->
        <span>SEARCH</span>
      </v-col>

      <v-spacer />

<!--      <v-col class="user" shrink>-->
<!--        <nav-login-button />-->
<!--      </v-col>-->

      <v-col v-if="$route.path.startsWith('/search')" class="icon mr-2" shrink>
        <v-btn
          @click="() => $store.commit('filters/SET_MODAL', true)"
          :color="$colors().secondary"
          text
          fab
        >
          <v-icon>mdi-filter</v-icon>
        </v-btn>
      </v-col>

      <v-col class="icon" shrink>
        <v-btn to="/search" fab text>
          <v-icon>mdi-account-search-outline</v-icon>
        </v-btn>
      </v-col>

      <v-col class="nav-icon" shrink>
        <v-app-bar-nav-icon @click.stop="$emit('drawer')" />
      </v-col>
    </v-row>

  </v-app-bar>
</template>

<script>
// import Logo from "../Logo";
// import Categories from "./Categories";
// import SearchNav from "../search/SearchNav";
// import NavLoginButton from "./NavLoginButton";

import Logo from '../Logo';
export default {
  name: "AppBar",
  components: {
    Logo,
    // NavLoginButton,
    // SearchNav,
    // Logo,
    // Categories
  },
  props: {
    drawer: { type: Boolean }
  },
  data: () => ({
    elevate: true,
    sticky: false,
    stickyHeight: 140,
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
  border-bottom: 2px solid $primary !important;
}

.nav-logo {
  /*margin-top: 2px!important;*/
  @media screen and (max-width: $medium) {
  }
}

.categories {
  display: block;
  @media screen and (max-width: $medium) {
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
.icon {
  display: none;
  @media screen and (max-width: $mobile) {
    display: flex;
  }
}
.nav-icon {
  display: none;
  @media screen and (max-width: $medium) {
    display: flex;
  }
}

.normal {
  top: 140px;
}

.sticky {
  position: sticky;
  top: 0;
}
</style>
