<template>
  <v-list-item two-line>
    <v-list-item-avatar>
      <v-img v-if="loggedIn && user.picture" :src="user.picture"></v-img>
      <v-icon v-else large color="green">mdi-account-circle</v-icon>
    </v-list-item-avatar>

    <v-list-item-content v-if="loggedIn">
      <v-list-item-title>{{ user.email }}</v-list-item-title>
      <v-list-item-subtitle class="mt-1">
        <a class="mt-2" @click="logout">
          <v-icon small>mdi-logout</v-icon>
          Logout
        </a>
      </v-list-item-subtitle>
    </v-list-item-content>

    <v-list-item-content v-else>
      <v-list-item-title>Guest</v-list-item-title>
      <v-list-item-subtitle class="mt-1">
        <a @click="loginDialog = true">
          <v-icon small>mdi-login</v-icon>
          Login
        </a>
        <login-dialog :dialog-flag="loginDialog" @close="loginDialog = false" />
      </v-list-item-subtitle>
    </v-list-item-content>
  </v-list-item>
</template>

<script>
import LoginDialog from "../../elements/dialogs/LoginDialog";
export default {
  name: "User",
  components: { LoginDialog },
  data: () => ({
    modal: false,
    loginDialog: false
  }),
  computed: {
    loggedIn() {
      return this.$auth.loggedIn;
    },
    user() {
      return this.$auth.user;
    }
  },
  methods: {
    async logout() {
      await this.$auth.logout();
      this.$store.commit("application/SET_DRAWER", false);
      this.$router.push("/");
      if (!this.$auth.loggedIn) {
        this.$notifications("success", `Disconnected`);
      }
    }
  }
};
</script>

<style lang="scss" scoped></style>
