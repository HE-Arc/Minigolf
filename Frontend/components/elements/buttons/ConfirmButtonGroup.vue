<template>
  <v-row class="ma-0 pa-0" justify="center">
    <v-col>
      <v-btn
        text
        block
        color="green darken-1"
        v-shortkey="['enter']"
        @shortkey.native="confirm"
        @click="confirm"
        :disabled="disableConfirm"
      >
        <v-icon left class="mb-1">{{ icon }}</v-icon>
        {{ confirmText }}
      </v-btn>
    </v-col>
    
    <v-col v-if="!confirmOnly">
      <v-btn
        text
        block
        color="error darken-1"
        @click="close"
      >
        <v-icon left class="mb-1">mdi-cancel</v-icon>
        Cancel
      </v-btn>
    </v-col>
  </v-row>
</template>

<script>
export default {
  name: "ConfirmButtonGroup",
  props: {
    confirmText: { type: String, default: "Yes" },
    disableConfirm: { type: Boolean, default: false },
    confirmOnly: { type: Boolean, default: false },
    icon: { type: String, default: "mdi-check" }
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

<style lang="scss" scoped></style>
