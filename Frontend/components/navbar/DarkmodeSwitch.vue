<template>
  <v-tooltip top>
    <template v-slot:activator="{ on }">
      <div v-on="on" class="darkmode-wrapper">
        <v-icon @click="() => toggle = !toggle">mdi-theme-light-dark</v-icon>
        <v-switch class="ml-3" v-model="toggle" hide-details/>
      </div>
    </template>
    <span>Toggle darkmode</span>
  </v-tooltip>
</template>

<script>
export default {
  name: "Darkmode",
  data: () => ({
    toggle: false
  }),
  watch: {
    toggle(value) {
      this.$vuetify.theme.dark = value;
      this.notify()
    }
  },
  methods: {
    notify() {
      let message = `Darkmod ${this.$vuetify.theme.dark ? 'on' : 'off'}`;
      this.$notifications("info", message);
    },
  },
};
</script>

<style lang="scss" scoped>
.darkmode-wrapper {
  display: flex;
}
</style>
