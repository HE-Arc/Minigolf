<template>
  <v-row align="start" justify="center">
    <v-col class="categories" xs="12" sm="8" lg="7">
      <v-btn
        v-for="(link, i) in links"
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
  name: "Categories",
  data: () => ({
    links: [
      { name: "Laderboard", to: "" },
      { name: "Numbers", to: "" },
      { name: "Download", to: "" },
      { name: "About", to: "" },
      { name: "Contact", to: "" }
    ]
  })
};
</script>

<style lang="scss" scoped>

</style>
