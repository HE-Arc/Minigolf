<template>
  <v-form ref="form">
    <v-container fluid>
      <v-row justify="space-around">
<!--          :cols="field.cols ? field.cols : 12"-->
        <v-col
          class="my-0 py-0"
          :cols="field.cols"
          v-for="(field, i) in form.fields"
          :key="i"
        >
          <text-field v-if="isTextField(field)" :field="field" />
          <check-box v-if="isCheckBox(field)" :field="field" />
          <text-area v-if="isTextArea(field)" :field="field" />
        </v-col>
      </v-row>
      <slot name="bottom"></slot>

      <confirm-button-group
        v-if="buttons"
        :disable-confirm="disableConfirm"
        :confirm-text="confirmText"
        :confirm-only="confirmOnly"
        @reset-form="resetForm"
        @confirm="confirm"
        @close="close"
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
    buttons: { type: Boolean, default: false },
    disableConfirm: { type: Boolean },
    confirmOnly: { type: Boolean, default: false },
    confirmText: { type: String },
    confirmIcon: { type: String }
  },
  methods: {
    resetForm() {
      this.$refs.form.resetValidation();
    },
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
