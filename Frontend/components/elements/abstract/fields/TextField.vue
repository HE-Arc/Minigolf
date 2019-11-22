<template>
  <v-text-field
    outlined
    v-model="field.value"
    :autofocus="focus"
    :required="field.required"
    :label="field.label"
    :counter="field.counter"
    :type="field.type"
    :append-icon="field.icon"
    :clearable="field.clearable"
  />
</template>

<script>
export default {
  name: "TextField",
  props: {
    field: { type: Object },
    focus: { type: Boolean, default: false }
  }
};
</script>

<style lang="scss" scoped></style>
