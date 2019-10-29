<template>
  <div>
    <v-btn
      text
      v-if="$auth.loggedIn"
      :color="$colors().primary"
      @click="$store.commit('application/SET_PUBLIC_DRAWER', true)"
    >
      <span class="caption">
        {{ $auth.user.short_name }}
      </span>
      <v-avatar class="ml-2" size="28px">
        <img v-if="$auth.user.picture" :src="$auth.user.picture" alt="Avatar" />
        <v-icon v-else color="green">mdi-account-circle </v-icon>
      </v-avatar>
    </v-btn>

    <v-btn v-else text :color="$colors().primary" @click="() => modal = true">
      <span class="caption">
        Connexion
      </span>
      <v-avatar class="ml-2" size="28px">
        <v-icon>mdi-account-outline</v-icon>
      </v-avatar>
    </v-btn>

    <LoginModal :modal="modal" @close="modal = false" />
  </div>
</template>

<script>
import LoginModal from "../modal/LoginModal";
export default {
  name: "NavLoginButton",
  components: { LoginModal },
  data: () => ({
    modal: false
  })
};
</script>

<style lang="scss" scoped></style>
