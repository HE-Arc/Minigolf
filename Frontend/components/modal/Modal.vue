<template>
  <base-modal :modal="modal" :width="width" @close="$emit('close')">
    <template v-slot:header>
      <v-list-item-content>
        <v-list-item-title>
          <span class="title">{{ title }}</span>
        </v-list-item-title>
        <v-list-item-subtitle>
          <div class="subtitle">{{ subtitle }}</div>
        </v-list-item-subtitle>
      </v-list-item-content>
    </template>

    <template v-slot:body>
      <slot></slot>
    </template>
  </base-modal>
</template>

<script>
import BaseModal from "./BaseModal";

export default {
  name: "Modal",
  components: { BaseModal },
  props: {
    modal: { type: Boolean },
    title: { type: String },
    subtitle: { type: String },
    width: { type: String }
  },
  methods: {
    close() {
      this.$emit("close");
    }
  }
};
</script>

<style lang="scss" scoped>
.title {
  font-size: 24px;
  font-weight: lighter;
}

.subtitle {
}
</style>
