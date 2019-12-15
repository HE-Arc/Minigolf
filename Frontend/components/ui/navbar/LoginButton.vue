<template>
  <div>
    <v-tooltip top>
      <template v-slot:activator="{ on }">
        <div v-on="on">
          <v-btn
            text
            v-if="$loggedIn()"
            color="primary"
            @click="$store.commit('application/SET_DRAWER', true)"
          >
            <span class="caption">{{ $auth.user.name }}</span>
            <v-avatar class="ml-2" size="28px">
              <v-icon color="green">mdi-account-circle </v-icon>
            </v-avatar>
          </v-btn>

          <v-btn
            v-else
            text
            class="mr-5"
            color="primary"
            @click="() => (loginDialog = true)"
          >
            <v-avatar size="28px">
              <v-icon>mdi-account-outline</v-icon>
            </v-avatar>
            <span class="caption pr-0 ml-2">Login</span>
          </v-btn>

          <login-dialog
            :dialog-flag="loginDialog"
            @close="loginDialog = false"
          />
        </div>
      </template>
      <span>{{ $loggedIn() ? 'More...' : 'Connect' }}</span>
    </v-tooltip>
  </div>
</template>

<script>
import LoginDialog from "../../elements/dialogs/LoginDialog";

export default {
  name: "LoginButton",
  components: { LoginDialog },
  data: () => ({
    loginDialog: false
  }),
};
</script>

<style lang="scss" scoped></style>
