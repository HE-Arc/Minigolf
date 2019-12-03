<template>
  <base-dialog
    confirm-only
    width="400"
    icon="mdi-account-circle-outline"
    confirm-text="Login"
    :disable-confirm="!getForm().isValid()"
    :modal="dialogFlag"
    @close="close"
    @confirm="confirm"
  >
    <base-form :form="getForm()" />
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
    dialogFlag: { type: Boolean, default: false }
  },
  data: () => ({
    form: null
  }),
  methods: {
    confirm() {
      this.loginAction();
      this.close();
    },
    close() {
      this.$emit("close");
    },
    getForm() {
      if (this.form != null) return this.form;

      let form = new Form();
      form.createTextField({
        value: "admin@test.com",
        field: "email",
        label: "Email",
        type: "email",
        required: true,
        placeholder: "john@myemail.com",
        focus: true,
        min: 4,
        max: 30,
        rules: [Rules.email]
      });
      form.createTextField({
        value: "toptal00",
        field: "password",
        label: "Password",
        type: "password",
        required: true,
        min: 6
      });
      this.form = form;
      return form;
    },
    loginAction() {
      let form = this.form.getForm();
      // this.$store.dispatch("auth/login", form);
      this.$auth.loginWith("local", { data: form });
    }
  }
};
</script>

<style lang="scss" scoped>
p {
  text-align: center;
}
</style>
