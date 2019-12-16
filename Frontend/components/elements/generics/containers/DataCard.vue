<template>
  <v-card
    :height="height"
    :width="width"
    :min-width="minWidth"
    :loading="loading"
  >
    <v-card-title v-if="title" class="subtitle-1">
      <v-divider class="mr-3" color="primary lighten-1" />
      <span class="font-weight-bold">{{ title }}</span>
      <v-divider class="ml-3" color="primary lighten-1" />
    </v-card-title>
    <v-card-text class="pa-0">
      <slot></slot>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  props: {
    title: { type: String },
    height: { type: String },
    width: { type: String },
    minWidth: { type: String },
    loading: { type: Boolean, default: false }
  },
  name: "DataCard"
};
</script>

<style lang="scss" scoped></style>
