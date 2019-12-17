<template>
  <v-list>
    <v-list-item v-for="attr in list" :key="attr.name.value">
      <v-list-item-icon v-if="attr.icon">
        <v-icon v-if="attr.icon">{{ attr.icon }}</v-icon>
      </v-list-item-icon>
      
      <v-list-item-content>
        <v-list-item-title>
          <a v-if="attr.link" :href="attr.link">{{ attr.value }}</a>
          <span v-else>{{ attr.value }}</span>
        </v-list-item-title>
        <v-list-item-subtitle v-if="attr.second">
          {{ attr.second }}
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
