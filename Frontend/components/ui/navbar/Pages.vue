<template>
  <v-row class="pages" align="start" justify="center">
    <v-col class="pages" xs="12" sm="8" lg="7">
      <v-btn
        v-for="(link, i) in pages"
        class="font-weight-regular"
        :to="link.to"
        :key="i"
        nuxt
        text
        small
      >
        {{ link.name }}
      </v-btn>
    </v-col>
  </v-row>
</template>

<script>

export default {
  name: "Pages",
  computed: {
    pages() {
      return this.$store.state.pages.data;
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
