<template>
  <v-app id="app" :style="appStyle">
    <v-content class="main-content">
      <div class="logo-container">
        <Logo class="main-logo" />
      </div>
      <app-bar />
      <v-container fluid>
        <v-row class="main-row" align="start" justify="center">
          <v-col xs="12" sm="11" md="10" lg="7">
            <nuxt />
          </v-col>
        </v-row>
      </v-container>
    </v-content>

    <Footer class="footer" />
  </v-app>
</template>

<script>
import AppBar from "../components/navbar/AppBar";
import Logo from "../components/Logo";
import Footer from "../components/Footer";

export default {
  components: {
    Footer,
    Logo,
    AppBar
  },
  data: () => ({}),
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
  height: 1200px;

  .logo-container {
    margin-top: 40px;
    position: absolute;
    margin-left: 5vw;
  }

  .main-row {
    margin-top: 200px;
  }
}

.footer {
  z-index: 0 !important;
  position: relative;
  bottom: 0;
  width: 100%;
  font-size: 100px;
}

/*.bread-crumb {*/
/*  margin-top: -10px;*/
/*  margin-bottom: 20px;*/
/*}*/
</style>
