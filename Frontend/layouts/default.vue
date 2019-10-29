<template>
  <v-app id="app">
    <v-content>
      <!-- Provides the application the proper gutter -->
      <v-container class="main-container" fluid>
        <!--                  align-content="start"-->
        <v-row align="start" justify="center">
          <v-col xs="12" sm="11" md="10" lg="7">
            <!--            <Logo class="logo" width="280"/>-->
            <!--              <bread-crumb class="bread-crumb" />-->
            <nuxt />
          </v-col>
        </v-row>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
// import AppBar from "../components/navbar/AppBar";
// import Logo from "../components/Logo";
// import Footer from "../components/footer/Footer";
// import BreadCrumb from "../components/widgets/BreadCrumb";

export default {
  components: {
    // BreadCrumb,
    // Footer,
    // Logo,
    // AppBar
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
