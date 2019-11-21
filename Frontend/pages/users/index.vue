<template>
  <div>
    <h1>user list</h1>
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
  </div>
</template>

<script>
export default {
  name: "user-list"
};
</script>

<style lang="scss" scoped></style>
