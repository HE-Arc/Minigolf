<template>
  <v-footer app dark padless absolute>
    <v-card
      flat
      tile
      color="accent"
      class="lighten-1 white--text text-xs-center footer-card"
    >
      <v-card-text>
        <div class="footer-content">
          <div class="button-top">
            <v-btn color="primary" v-scroll-to="'#app'">
              <v-icon left>mdi-arrow-up-thick</v-icon>
              Haut de la page
            </v-btn>
          </div>

          <div class="icons my-3">
            <v-btn
              v-for="icon in icons"
              :key="icon"
              class="mx-3 white--text"
              icon
            >
              <v-icon size="24px">{{ icon }}</v-icon>
            </v-btn>
          </div>

          <div class="copyright">
            Copyright &copy; {{ new Date().getFullYear() }} JrosK
            <br />
            Design & code:
            <a class="link" href="mailto:jrosk.managment@gmail.com">
              JrosK
            </a>
          </div>
        </div>
      </v-card-text>
    </v-card>
  </v-footer>
</template>

<script>
export default {
  name: "Footer",
  data: () => ({
    icons: [
      "mdi-facebook",
      "mdi-twitter",
      "mdi-gmail",
      "mdi-linkedin",
      "mdi-instagram"
    ]
  })
};
</script>

<style lang="scss" scoped>
.footer-card {
  box-shadow: inset 5px 49px 5px -48px rgba(0, 0, 0, 0.75) !important;
  width: 100%;

  .footer-content {
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;

    .copyright {
      .link {
        color: white;
        font-weight: bold;
        font-size: 20px;
        text-decoration: none;
      }
    }
  }
}
</style>
