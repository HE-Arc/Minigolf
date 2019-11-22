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
      
      <confirm-button-group :confirm-text="confirmText"
                            @close="close"
                            @confirm="confirm"/>
    </template>
  </base-modal>
</template>

<script>
import BaseModal from '../../elements/abstract/BaseModal';
import ConfirmButtonGroup from '../buttons/ConfirmButtonGroup';

export default {
  name: 'Dialog',
  components: { ConfirmButtonGroup, BaseModal },
  props: {
    modal: { type: Boolean },
    width: { type: String },
    confirmText: { type: String, default: 'Yes' },
    info: { type: Boolean, default: false },
    warning: { type: Boolean, default: false },
    danger: { type: Boolean, default: false },
  },
  computed: {
    icon() {
      if (this.warning) {
        return 'mdi-alert-circle-outline';
      } else if (this.danger) {
        return 'mdi-alert-circle-outline';
      } else {
        return 'mdi-information-outline';
      }
    },
    color() {
      let color = 'blue';
      if (this.warning) {
        color = 'orange';
      } else if (this.danger) {
        color = 'red';
      }
      return `${ color } darken-1`;
    },
  },
  methods: {
    close() {
      this.$emit('close');
    },
    confirm() {
      this.$emit('confirm');
    },
  },
};
</script>

<style lang="scss" scoped>
.header-icon {
  font-size: 54px !important;
}
</style>
