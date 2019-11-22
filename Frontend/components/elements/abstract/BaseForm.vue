<template>
  <v-form ref="form">
    <v-container fluid>
      
      <div v-for="(field, i) in form.fields" :key="i">
        <text-field v-if="isTextField(field)" :field="field" :focus="i == 0"/>
      
      
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

  export default {
    name: 'BaseForm',
    components: { TextField, ConfirmButtonGroup },
    props: {
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
      console.log(this.form)
    }
  };
</script>

<style lang="scss" scoped>

</style>
