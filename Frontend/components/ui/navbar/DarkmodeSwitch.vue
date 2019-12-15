<template>
  <v-tooltip top>
    <template v-slot:activator="{ on }">
      <div v-on="on" class="darkmode-wrapper">
        <v-icon class="icon" @click="() => (toggle = !toggle)">
          mdi-theme-light-dark
        </v-icon>
        <v-switch class="ml-3" v-model="toggle" hide-details />
      </div>
    </template>
    <span>Toggle darkmode</span>
  </v-tooltip>
</template>

<script>
export default {
  name: "DarkmodeSwitch",
  data: () => ({
    toggle: false
  }),
  watch: {
    toggle(value) {
      this.$vuetify.theme.dark = value;
      this.notify();
    }
  },
  methods: {
    notify() {
      let message = `Darkmod ${this.$vuetify.theme.dark ? "on" : "off"}`;
      this.$notifications("info", message);
    }
  }
};
</script>

<style lang="scss" scoped>
.darkmode-wrapper {
  transform: scale(0.8);
  display: flex;
  align-items: baseline;
}
</style>
