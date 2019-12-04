<template>
  <base-form
    confirm-only
    buttons
    confirm-text="Update"
    :disable-confirm="!isValid()"
    :form="getForm()"
    @confirm="confirm()"
    @close="close()"
  />
</template>

<script>
import BaseForm from "../generics/BaseForm";
import User from "../../../objects/models/User";

export default {
  props: {
    user: { type: Object }
  },
  data: () => ({
    form: null,
    resetFlag: false,
  }),
  name: "UserForm",
  components: { BaseForm },
  methods: {
    getForm() {
      if (this.form != null) return this.form;
      let user = this.user ? this.user : new User();
      this.form = User.createForm(user);
      return this.form;
    },
    isValid() {
      let form = this.getForm();
      return form.isValid() && form.isDirty();
    },
    close() {
      this.$emit('close');
    },
    confirm() {
      let action = `users/${this.user ? 'update' : 'create'}`;
      this.$store.dispatch(action, this.form.getForm());
      this.close();
    }
  }
};
</script>

<style lang="scss" scoped></style>
