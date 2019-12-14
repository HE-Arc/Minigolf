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
      <v-list-item-subtitle class="mt-1">
        <a class="mt-2" @click="settingsDialog = true">
          <v-icon small>mdi-settings</v-icon>
          Settings
        </a>
        
        <base-dialog
          icon="mdi-pen"
          :title="user.name"
          :modal="settingsDialog"
          @close="settingsDialog = false"
        >
          <user-form :user="user" @close="settingsDialog = false" />
        </base-dialog>
        
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
import UserForm from '../../elements/forms/UserForm';
import BaseDialog from '../../elements/generics/BaseDialog';
export default {
  name: "User",
  components: { BaseDialog, UserForm, LoginDialog },
  data: () => ({
    modal: false,
    loginDialog: false,
    settingsDialog: false,
  }),
  computed: {
    loggedIn() {
      return this.$auth.loggedIn;
    },
    user() {
      return this.$store.getters['users/byId'](this.$auth.user.id);
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
