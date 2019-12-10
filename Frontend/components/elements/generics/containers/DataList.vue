<template>
  <v-list>
    <v-list-item v-for="attr in list">
      <v-list-item-content>
        <v-list-item-title>{{ attr.name }}</v-list-item-title>
        <v-list-item-subtitle>
          {{ attr.value }}
        </v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>
  </v-list>
</template>

<script>
import DataCard from "./DataCard";
export default {
  components: { DataCard },
  props: {
    title: { type: String },
    list: { type: Array, default: [] },
    width: { type: String }
  },
  name: "DataList"
};
</script>

<style lang="scss" scoped></style>
