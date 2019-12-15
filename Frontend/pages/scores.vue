<template>
  <Page :title="`${$user().name}'s scores`">
    
    <template v-slot:body>
      
      <div v-if="$loggedIn()">
        <user-score :games="games"/>
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
import UserScore from '../components/ranking/UserScore';
import Page from '../components/Page';

export default {
  name: "scores",
  components: { Page, UserScore, LoginDialog },
  data: () => ({
    loginDialog: false
  }),
  computed: {
    games() {
      let games = this.$store.getters["games/byUserId"](this.$user().id);
      return games.sort((a, b) => -(new Date(a.date) - new Date(b.date)));
    }
  },
};
</script>

<style lang="scss" scoped></style>
