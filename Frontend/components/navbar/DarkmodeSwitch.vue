<template>
  <div class="darkmode-wrapper">
    <v-icon>mdi-theme-light-dark</v-icon>
    <v-switch class="ml-3" hide-details v-model="toggle"></v-switch>
  </div>
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
    }
  }
};
</script>

<style lang="scss" scoped>
  .darkmode-wrapper {
    display: flex;
  }
</style>
