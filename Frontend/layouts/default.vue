<template>
  <v-app id="app">
    <v-content>
      <Logo class="main-logo" width="160" fontsize="4"/>
      <app-bar/>
      <v-container class="main-container" fluid>
        <v-row class="temp-test" align="start" justify="center">
          <v-col xs="12" sm="11" md="10" lg="7">
            <nuxt />
          </v-col>
        </v-row>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
import AppBar from '../components/navbar/AppBar';
import Logo from '../components/Logo';

export default {
  components: {
    Logo,
    AppBar,
  },
  data: () => ({}),
  computed: {},
  methods: {},
  mounted() {}
};
</script>

<style lang="scss">
.container {
  min-height: 0 !important;
}

.main-logo {
  position: absolute;
  margin-left: 5vw;
}

.temp-test{
  margin-top: 200px;
  height: 2000px;
}

.bread-crumb {
  margin-top: -10px;
  margin-bottom: 20px;
}

.footer {
  z-index: 0 !important;
  position: relative;
  /*position: fixed;*/
  bottom: 0;
  width: 100%;
  font-size: 100px;
}
</style>
