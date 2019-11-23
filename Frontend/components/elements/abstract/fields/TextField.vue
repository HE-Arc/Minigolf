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
<!--    :rules="field.rules"-->
</template>

<script>
export default {
  name: "TextField",
  props: {
    field: { type: Object },
    focus: { type: Boolean, default: false }
  },
  mounted() {
    console.log(this.field.rules);
  }
};
</script>


<style lang="scss" scoped></style>
