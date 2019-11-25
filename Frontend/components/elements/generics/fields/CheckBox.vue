<template>
  <v-checkbox
    class="mt-0 pt-0"
    v-model="field.value"
    :label="field.label"
    :disabled="field.disabled"
  />
</template>

<script>
export default {
  name: "CheckBox",
  props: {
    field: { type: Object },
  }
};
</script>

<style lang="scss" scoped></style>
