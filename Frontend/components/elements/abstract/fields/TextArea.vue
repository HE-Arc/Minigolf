<template>
  <v-textarea
    :label="field.label"
    :required="field.required"
    :rules="field.rules"
    v-model="field.value"
    :counter="field.counter"
    outlined
  />
</template>

<script>
export default {
  name: "TextArea",
  props: {
    field: { type: Object }
  }
};
</script>

<style lang="scss" scoped></style>
