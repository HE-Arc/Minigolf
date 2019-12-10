<template>
  <v-card :width="width">
    <v-card-title class="subtitle-1 mt-3 mb-2">
      <v-divider class="mr-3" color="primary lighten-1" />
      <span class="font-weight-bold">{{ title }}</span>
      <v-divider class="ml-3" color="primary lighten-1" />
    </v-card-title>
    <v-card-text>
      <slot></slot>
    </v-card-text>
  </v-card>
</template>

<script>
  export default {
    props: {
      title: { type: String },
      width: { type: String },
    },
    name: 'DataCard',
  };
</script>

<style lang="scss" scoped>

</style>
