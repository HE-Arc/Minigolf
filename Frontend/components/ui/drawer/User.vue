<template>
  <v-list-item v-if="loggedIn" two-line>
    <v-list-item-avatar>
      <v-icon large color="green">mdi-account-circle</v-icon>
    </v-list-item-avatar>
    <v-list-item-content>
      <v-list-item-title>{{ user.email }}</v-list-item-title>
      <v-list-item-subtitle class="mt-1">
        <a class="mt-2" @click="logoutAction">
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
  </v-list-item>

  <v-list-item v-else two-line>
    <v-list-item-avatar>
      <v-icon large color="blue">mdi-account-circle</v-icon>
    </v-list-item-avatar>

    <v-list-item-content>
      <v-list-item-title>Guest</v-list-item-title>
      <v-list-item-subtitle class="mt-1">
        <a @click="loginDialog = true">
          <v-icon small>mdi-login</v-icon>Login
        </a>
        <login-dialog :dialog-flag="loginDialog" @close="loginDialog = false" />
      </v-list-item-subtitle>
    </v-list-item-content>
  </v-list-item>
</template>

<script>
import LoginDialog from "../../elements/dialogs/LoginDialog";
import UserForm from "../../elements/forms/UserForm";
import BaseDialog from "../../elements/generics/BaseDialog";
export default {
  name: "User",
  components: { BaseDialog, UserForm, LoginDialog },
  data: () => ({
    modal: false,
    loginDialog: false,
    settingsDialog: false
  }),
  computed: {
    loggedIn() {
      return this.$store.state.auth.user != null;
    },
    user() {
      return this.$store.state.auth.user;
    }
  },
  methods: {
    logoutAction() {
      this.$store.dispatch("auth/logout")
    }
  }
};
</script>

<style lang="scss" scoped></style>
