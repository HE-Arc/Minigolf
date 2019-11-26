<template>
  <base-modal :modal="modal" :width="width" @close="close" confirmation>
    <template v-slot:header>
      <v-list-item-content>
        <v-list-item-avatar>
          <v-icon class="header-icon" :color="getColor">
            {{ getIcon }}
          </v-icon>
        </v-list-item-avatar>
      </v-list-item-content>
    </template>

    <template v-slot:body>
      <slot></slot>
    </template>

    <template v-slot:actions>
      <confirm-button-group
        :confirm-text="confirmText"
        :disable-confirm="disableConfirm"
        @close="close"
        @confirm="confirm"
      />
    </template>
  </base-modal>
</template>

<script>
import BaseModal from "../../elements/generics/BaseModal";
import ConfirmButtonGroup from "../buttons/ConfirmButtonGroup";

export default {
  name: "Dialog",
  components: { ConfirmButtonGroup, BaseModal },
  props: {
    modal: { type: Boolean },
    width: { type: String },
    icon: {type: String },
    confirmText: { type: String, default: "Yes" },
    disableConfirm: { type: Boolean, default: false},
    info: { type: Boolean, default: false },
    warning: { type: Boolean, default: false },
    danger: { type: Boolean, default: false },
  },
  computed: {
    getIcon() {
      if (this.warning) {
        return "mdi-alert-circle-outline";
      } else if (this.danger) {
        return "mdi-alert-circle-outline";
      } else if (this.info) {
        return "mdi-information-outline";
      } else {
        return this.icon;
      }
    },
    getColor() {
      let color = "primary lighten-1";
      if (this.warning) {
        color = "orange darken-1";
      } else if (this.danger) {
        color = "red darken-1";
      } else if (this.info) {
        color = "blue darken-1";
      }
      return `${color}`;
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
  font-size: 64px !important;
}
</style>