<template>
  <v-app id="app" :style="appStyle">
    <drawer />

    <v-content class="main-content">
      <div class="logo-container">
        <Logo class="main-logo" />
      </div>
      <app-bar />
      <v-container class="main-container" fluid>
        <nuxt />
      </v-container>
    </v-content>
    <Footer class="footer" />

    <delete-dialog />
  </v-app>
</template>

<script>
import Breadcrumb from "../components/elements/Breadcrumb";
import Logo from "../components/elements/Logo";

import Footer from "../components/ui/Footer";
import AppBar from "../components/ui/navbar/AppBar";

import DeleteDialog from "../components/elements/dialogs/DeleteDialog";
import Drawer from "../components/ui/Drawer";

export default {
  components: {
    Drawer,
    DeleteDialog,
    Breadcrumb,
    Footer,
    Logo,
    AppBar
  },
  computed: {
    appStyle() {
      return {
        "background-color": this.$vuetify.theme.currentTheme.background,
        "--primary-color": this.$vuetify.theme.currentTheme.primary
      };
    }
  },
};
</script>

<style lang="scss">
.logo-container {
  margin-top: 40px;
  position: absolute;
  margin-left: 5vw;
}
.main-content {
  min-height: 1200px;
}

.main-container {
  margin-top: 100px;
}

.footer {
  z-index: 0 !important;
  position: relative;
  bottom: 0;
  width: 100%;
  font-size: 100px;
}
</style>
