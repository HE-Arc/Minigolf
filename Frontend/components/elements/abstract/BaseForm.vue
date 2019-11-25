<template>
  <v-form ref="form">
    <v-container fluid>
      
      <div v-for="(field, i) in form.fields" :key="i">
        <text-field v-if="isTextField(field)" :field="field" :focus="i == 0" />
        <check-box v-if="isCheckBox(field)" :field="field" />
        <text-area v-if="isTextArea(field)" :field="field" />
      
      
      </div>
      
      <slot name="bottom"></slot>
      
      <confirm-button-group :confirm-text="confirmText"
                            @close="close"
                            @confirm="confirm"/>
    </v-container>
  </v-form>
</template>

<script>
  import ConfirmButtonGroup from '../buttons/ConfirmButtonGroup';
  import TextField from './fields/TextField';
  import CheckBox from './fields/CheckBox';
  import TextArea from './fields/TextArea';
  import Form from '../../../objects/forms/abstract/Form';
  import User from '../../../objects/models/User';

  export default {
    name: 'BaseForm',
    components: { TextArea, CheckBox, TextField, ConfirmButtonGroup },
    props: {
      // form: { type: Object },
      form: { type: Object },
      confirmText: { type: String, default: 'Send' },
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
    }
  };
</script>

<style lang="scss" scoped>

</style>
