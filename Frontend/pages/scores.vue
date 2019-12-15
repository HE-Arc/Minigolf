<template>
  <div>
    <h1>Scores</h1>
    <div v-if="$loggedIn()">
      <h3>games</h3>
      <ul>
        <li v-for="game in games">
          {{ game.id }}
        </li>
      </ul>
      <h3>scores</h3>
      <ul>
        <li v-for="score in scores">
          {{ score.score }}
        </li>
      </ul>
    </div>
    <div v-else>
      Download the app and
      <v-btn @click="loginDialog = true" color="primary" text x-small>
        login
      </v-btn>
      to see your scores.
    </div>

    <login-dialog :dialog-flag="loginDialog" @close="loginDialog = false" />
  </div>
</template>

<script>
import LoginDialog from "../components/elements/dialogs/LoginDialog";

export default {
  name: "scores",
  components: { LoginDialog },
  data: () => ({
    loginDialog: false,
  }),
  computed: {
    scores() {
      return this.$store.getters["scores/byUserId"](this.$user().id);
    },
    games() {
      return this.$store.getters["games/byUserId"](this.$user().id);
    }
  },
  mounted() {
    setTimeout(() => {
      console.log(this.scores)
    }, 500);
  }
};
</script>

<style lang="scss" scoped></style>
