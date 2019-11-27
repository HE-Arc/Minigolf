<template>
  <v-form ref="form">
    <v-container fluid>
      <div v-for="(field, i) in form.fields" :key="i">
        <text-field v-if="isTextField(field)" :field="field" />
        <check-box v-if="isCheckBox(field)" :field="field" />
        <text-area v-if="isTextArea(field)" :field="field" />
      </div>

      <slot name="bottom"></slot>

      <confirm-button-group
        v-if="buttons"
        :confirm-text="confirmText"
        :icon="icon"
        @close="close"
        @confirm="confirm"
      />
    </v-container>
  </v-form>
</template>

<script>
import ConfirmButtonGroup from "../buttons/ConfirmButtonGroup";
import TextField from "./fields/TextField";
import CheckBox from "./fields/CheckBox";
import TextArea from "./fields/TextArea";

export default {
  name: "BaseForm",
  components: { TextArea, CheckBox, TextField, ConfirmButtonGroup },
  props: {
    form: { type: Object },
    resetFlag: { type: Boolean },
    buttons: { type: Boolean, default: false },
    confirmText: { type: String, default: "Send" },
    icon: { type: String, default: "mdi-check" }
  },
  watch: {
    resetFlag(value) {
      if (!value) this.$refs.form.resetValidation();
    }
  },
  methods: {
    isTextField(field) {
      return field.fieldType == "TextField";
    },
    isTextArea(field) {
      return field.fieldType == "TextArea";
    },
    isCheckBox(field) {
      return field.fieldType == "CheckBox";
    },
    isSelectList(field) {
      return field.fieldType == "SelectList";
    },
    close() {
      this.$emit("close");
    },
    confirm() {
      this.$emit("confirm");
    }
  },
  mounted() {
    this.$emit("form-initialized", this.$refs.form);
  }
};
</script>

<style lang="scss" scoped></style>
