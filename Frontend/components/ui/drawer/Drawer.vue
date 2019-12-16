<template>
  <v-navigation-drawer app right absolute temporary v-model="drawer">
    <User />
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
import User from "./User";
import DarkmodeSwitch from "../navbar/DarkmodeSwitch";
import links from "../../../configs/links"

export default {
  name: "Drawer",
  components: { DarkmodeSwitch, User },
  computed: {
    pages() {
      return links;
    },
    drawer: {
      get() {
        return this.$store.state.application.drawer;
      },
      set(value) {
        this.$store.commit("application/SET_DRAWER", value);
      }
    }
  }
};
</script>

<style lang="scss" scoped>
@import "../../../assets/scss/variables";

.search {
  display: none;
  @media screen and (max-width: $mobile) {
    display: flex;
  }
}
</style>
