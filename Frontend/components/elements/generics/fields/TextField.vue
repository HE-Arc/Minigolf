<template>
  <v-text-field
    outlined
    v-model="field.value"
    :autofocus="field.focus"
    :required="field.required"
    :label="field.label"
    :counter="field.counter"
    :prepend-inner-icon="field.icon"
    :clearable="field.clearable"
    :placeholder="field.placeholder"
    :type="fieldType"
    :append-icon="revealIcon"
    @click:append="revealPassword = !revealPassword"
    :rules="field.rules"
  />
</template>

<script>
export default {
  name: "TextField",
  props: {
    field: { type: Object },
    focus: { type: Boolean, default: false }
  },
  data: () => ({
    revealPassword: false
  }),
  computed: {
    fieldType() {
      if (this.field.type == "password") {
        return this.revealPassword ? "text" : "password";
      }
      return this.field.type;
    },
    revealIcon() {
      if (this.field.type == "password") {
        return this.revealPassword ? "mdi-eye" : "mdi-eye-off";
      }
      return "";
    }
  },
};
</script>


<style lang="scss" scoped></style>
