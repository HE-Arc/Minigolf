<template>
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

<script>
  export default {
    name: 'ConfirmButtonGroup',
    props: {
      confirmText: { type: String, default: "Yes"},
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

</style>
