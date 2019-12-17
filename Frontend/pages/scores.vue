<template>
  <Page title="My scores">
    <template v-slot:body>
      <div v-if="$auth.loggedIn">
        <user-score v-if="games.length" :games="games" />
        <div v-else>
          It seems that you didn't played any game... yet.
        </div>
      </div>
      <div v-else>
        Download the app and
        <v-btn @click="loginDialog = true" color="primary" text x-small>
          login
        </v-btn>
        to see your scores.
      </div>
    </template>

    <login-dialog :dialog-flag="loginDialog" @close="loginDialog = false" />
  </Page>
</template>

<script>
import LoginDialog from "../components/elements/dialogs/LoginDialog";
import UserScore from "../components/ranking/UserScore";
import Page from "../components/Page";

export default {
  name: "scores",
  components: { Page, UserScore, LoginDialog },
  async fetch( { store }) {
    if (store.$auth.loggedIn) {
      await store.dispatch("users/fetch");
      await store.dispatch("scores/fetch");
      await store.dispatch("games/fetchList", store.$auth.user.played);
    }
  },
  data: () => ({
    loginDialog: false
  }),
  computed: {
    games() {
      let games = this.$store.getters["games/byUserId"](this.$auth.user.id);
      return games.sort((a, b) => -(new Date(a.date) - new Date(b.date)));
    }
  }
};
</script>

<style lang="scss" scoped></style>
