<template>
  <v-app id="app" :style="appStyle">
    <drawer :pages="pages"/>

    <v-content class="main-content">
      <div class="logo-container">
        <Logo class="main-logo" />
      </div>
      <app-bar :pages="pages"/>
      <v-container fluid>
        <v-row class="main-row" align="start" justify="center">
          <v-col cols="12" xs="12" sm="11" md="10" lg="7">
            <Breadcrumb class="breadcrumb" />
          </v-col>
          <v-col cols="12" xs="12" sm="11" md="10" lg="7">
            <nuxt />
          </v-col>
        </v-row>
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
import Drawer from "../components/ui/drawer/Drawer";

export default {
  components: {
    Drawer,
    DeleteDialog,
    Breadcrumb,
    Footer,
    Logo,
    AppBar
  },
  data: () => ({
    pages: [
      { name: "Minigolfs", to: "/minigolfs" },
      { name: "Laderboard", to: "/laderboard" },
      { name: "Download", to: "/users" },
      { name: "About", to: "/about" },
    ]
  }),

  computed: {
    appStyle() {
      return {
        "background-color": this.$vuetify.theme.currentTheme.background,
        "--primary-color": this.$vuetify.theme.currentTheme.primary
      };
    }
  }
};
</script>

<style lang="scss">
.main-content {
  min-height: 1200px;

  .logo-container {
    margin-top: 40px;
    position: absolute;
    margin-left: 5vw;
  }

  .main-row {
    margin-top: 200px;
  }
  
  .breadcrumb {
    margin-top: 30px;
  }
}

.footer {
  z-index: 0 !important;
  position: relative;
  bottom: 0;
  width: 100%;
  font-size: 100px;
}
</style>
