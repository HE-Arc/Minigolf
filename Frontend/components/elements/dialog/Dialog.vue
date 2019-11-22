<template>
  <base-modal :modal="modal" :width="width" @close="close" confirmation>
    <template v-slot:header>
      <v-list-item-content>
        <v-list-item-avatar>
          <v-icon class="header-icon" :color="color">
            {{ icon }}
          </v-icon>
        </v-list-item-avatar>
      </v-list-item-content>
    </template>

    <template v-slot:body>
      <slot></slot>
    </template>

    <template v-slot:actions>
      <v-row justify="center">
        <v-col cols="3">
          <v-btn
            text
            block
            color="green darken-1"
            v-shortkey="['enter']"
            @shortkey.native="confirm"
            @click="confirm"
          >
            <v-icon left class="mb-1">mdi-check</v-icon>
            {{ confirmText }}
          </v-btn>
        </v-col>
        <v-col cols="3">
          <v-btn color="error darken-1" @click="close" text block>
            <v-icon left class="mb-1">mdi-cancel</v-icon>
            Cancel
          </v-btn>
        </v-col>
      </v-row>
    </template>
  </base-modal>
</template>

<script>
import BaseModal from "../../elements/abstract/BaseModal";
export default {
  name: "Dialog",
  components: { BaseModal },
  props: {
    modal: { type: Boolean },
    width: { type: String },
    confirmText: { type: String, default: "Yes"},
    info: { type: Boolean, default: false },
    warning: { type: Boolean, default: false },
    danger: { type: Boolean, default: false }
  },
  computed: {
    icon() {
      if (this.warning) {
        return "mdi-alert-circle-outline";
      } else if (this.danger) {
        return "mdi-alert-circle-outline";
      } else {
        return "mdi-information-outline";
      }
    },
    color() {
      let color = "blue";
      if (this.warning) {
        color = "orange";
      } else if (this.danger) {
        color = "red";
      }
      return `${color} darken-1`;
    }
  },
  methods: {
    close() {
      this.$emit("close");
    },
    confirm() {
      this.$emit("confirm");
    }
  }
};
</script>

<style lang="scss" scoped>
.header-icon {
  font-size: 54px !important;
}
</style>
