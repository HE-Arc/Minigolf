<template>
  <base-dialog
    width="400"
    icon="mdi-account-circle-outline"
    confirm-text="Submit"
    :disable-confirm="!getForm().isValid()"
    :modal="dialog"
    @close="close"
    @confirm="confirm"
  >
    <base-form :form="getForm()" :active="dialog"/>
  </base-dialog>
</template>

<script>
import BaseDialog from "../generics/BaseDialog";
import BaseForm from "../generics/BaseForm";
import Form from "../../../objects/forms/abstract/Form";
import Rules from "../../../objects/forms/abstract/Rules";

export default {
  name: "LoginDialog",
  components: { BaseForm, BaseDialog },
  props: {
    dialog: { type: Boolean, default: false }
  },
  data: () => ({
    form: null,
  }),
  methods: {
    confirm() {
      console.log("Confirmed");
      this.loginAction();
      this.close();
    },
    close() {
      console.log("Closed");
      this.$emit("close");
    },
    getForm() {
      if (this.form != null) return this.form;
      
      let form = new Form();
      form.createTextField({
        value: "",
        field: "email",
        label: "Email",
        type: "email",
        required: true,
        placeholder: "john@myemail.com",
        min: 4,
        max: 30,
        rules: [Rules.email]
      });
      form.createTextField({
        value: "",
        field: "password",
        label: "Password",
        type: "password",
        required: true,
        min: 8
      });
      this.form = form;
      return form;
    },
    loginAction() {
      let form = this.form.getForm();
      this.$store.dispatch("auth/update", form);
    },
  }
};
</script>

<style lang="scss" scoped>
p {
  text-align: center;
}
</style>
