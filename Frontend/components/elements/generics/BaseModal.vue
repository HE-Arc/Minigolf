<template>
  <v-dialog
          persistent
          v-model="modal"
          :width="width"
          v-shortkey="['esc']"
          @shortkey.native="$emit('close')"
          @click:outside="!confirmation ? close : null">
    <v-card class="pa-4">
      <v-list>
        <v-list-item>
          <slot name="header"></slot>

          <v-list-item-avatar v-if="!confirmation" class="close-button">
            <v-btn text small @click="close()">
              <v-icon color="pink">mdi-close</v-icon>
            </v-btn>
          </v-list-item-avatar>
        </v-list-item>
      </v-list>

      <v-card-text class="pb-0">
        <slot name="body"></slot>
      </v-card-text>

      <v-card-actions class="pt-0">
        <slot name="actions"></slot>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
export default {
  name: "BaseModal",
  props: {
    modal: { type: Boolean },
    width: { type: String, default: "650" },
    confirmation: { type: Boolean, default: false }
  },
  computed: {},
  methods: {
    close() {
      this.$emit("close");
    }
  }
};
</script>

<style lang="scss" scoped>
.close-button {
  position: absolute;
  right: 0;
  margin-top: -30px;
}
</style>
