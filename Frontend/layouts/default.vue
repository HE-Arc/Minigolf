<template>
  <v-app
    id="app"
    :style="appStyle"
  >
    <v-content>
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
import Footer from '../components/Footer';

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
        'background-color': this.$vuetify.theme.currentTheme.background,
        '--primary-color': this.$vuetify.theme.currentTheme.primary
      };
    }
  },
};
</script>

<style lang="scss">
.container {
  min-height: 0 !important;
}

.logo-container {
  margin-top: 40px;
  /*margin-bottom: 10px;*/
  position: absolute;
  margin-left: 5vw;
}

.main-row {
  margin-top: 200px;
  height: 2000px;
}

/*.bread-crumb {*/
/*  margin-top: -10px;*/
/*  margin-bottom: 20px;*/
/*}*/

.footer {
  z-index: 0 !important;
  position: relative;
  /*position: fixed;*/
  bottom: 0;
  width: 100%;
  font-size: 100px;
}
</style>
