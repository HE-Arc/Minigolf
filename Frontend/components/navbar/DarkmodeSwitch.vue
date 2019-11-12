<template>
  <v-switch
    hide-details
    v-model="toggle"
    prepend-icon="mdi-theme-light-dark"
  ></v-switch>
</template>

<script>
export default {
  name: "Darkmode",
  data: () => ({
    toggle: false,
  }),
  watch: {
    toggle(value) {
      this.$vuetify.theme.dark = value;
    },
  },
};
</script>

<style lang="scss" scoped></style>
