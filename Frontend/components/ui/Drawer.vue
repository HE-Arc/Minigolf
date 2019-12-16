<template>
  <v-navigation-drawer app right temporary v-model="drawer">
    <v-list-item v-if="$auth.loggedIn" two-line>
      <v-list-item-avatar>
        <v-icon large color="green">mdi-account-circle</v-icon>
      </v-list-item-avatar>
      <v-list-item-content>
        <v-list-item-title>{{ $auth.user.email }}</v-list-item-title>
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
            :title="$auth.user.name"
            :modal="settingsDialog"
            @close="settingsDialog = false"
          >
            <user-form :user="$auth.user" @close="settingsDialog = false" />
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
          <login-dialog
            :dialog-flag="loginDialog"
            @close="loginDialog = false"
          />
        </v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>
    
    <v-divider />
    <v-list>
      <v-list-item v-for="page in pages" :key="page.name" :to="page.to">
        <v-list-item-content>
          <v-list-item-subtitle v-text="page.name"></v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>
    </v-list>
  </v-navigation-drawer>
</template>

<script>
import DarkmodeSwitch from "./navbar/DarkmodeSwitch";
import LoginDialog from "../elements/dialogs/LoginDialog";
import UserForm from "../elements/forms/UserForm";
import BaseDialog from "../elements/generics/BaseDialog";

export default {
  name: "Drawer",
  components: { DarkmodeSwitch, BaseDialog, UserForm, LoginDialog },
  data: () => ({
    modal: false,
    loginDialog: false,
    settingsDialog: false
  }),
  computed: {
    pages() {
      return this.$store.state.pages.data;
    },
    drawer: {
      get() {
        return this.$store.state.application.drawer;
      },
      set(value) {
        this.$store.commit("application/SET_DRAWER", value);
      }
    }
  },
  methods: {
    logoutAction() {
      this.$store.dispatch("auth/logout");
    }
  }
};
</script>

<style lang="scss" scoped>
@import "../../assets/scss/variables";

.search {
  display: none;
  @media screen and (max-width: $mobile) {
    display: flex;
  }
}
</style>
