<template>
  <div>
    <h1>user list</h1>
    <v-row align="center">
      <v-col cols="8">
        <ul>
          <li v-for="user in $store.state.users.data" :key="user.id">
            <v-row align="center">
              <v-col class="py-0" cols="4">{{ user.name }}</v-col>
              <v-col class="py-0" cols="2">
                <v-row align="center">
                  <v-btn
                    fab
                    text
                    x-small
                    color="info"
                    @click="$store.dispatch('users/updateConfirm', user)"
                  >
                    <v-icon>mdi-pen</v-icon>
                  </v-btn>
                  <v-btn
                    fab
                    text
                    x-small
                    color="red"
                    @click="$store.dispatch('users/deleteConfirm', user)"
                  >
                    <v-icon>mdi-close</v-icon>
                  </v-btn>
                </v-row>
              </v-col>
            </v-row>
          </li>
        </ul>
        <v-btn class="mt-2" color="primary" nuxt @click="create">
          create test
        </v-btn>
      </v-col>
      <v-col>
        <user-test-form />
      </v-col>
    </v-row>
  </div>
</template>

<script>
import BaseForm from "../../components/elements/generics/BaseForm";
import UserTestForm from '../../components/elements/forms/UserTestForm';

export default {
  name: "user-list",
  components: { UserTestForm, BaseForm },
  methods: {
    create() {
      const user = {
        name: "George",
        email: "george@gmail.com",
        password: "lala"
      };
      this.$store.dispatch("users/create", user);
    }
  }
};
</script>

<style lang="scss" scoped></style>
