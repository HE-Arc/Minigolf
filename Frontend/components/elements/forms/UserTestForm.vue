<template>
  <base-form buttons :form="getForm()" @confirm="confirm" />
</template>

<script>
import BaseForm from "../generics/BaseForm";
import User from "../../../objects/models/User";

export default {
  name: "UserTestForm",
  components: { BaseForm },
  data: () => ({
    form: null
  }),
  methods: {
    getForm() {
      if (this.form != null) return this.form;
      this.form = User.createForm(this.$store.state.users.data[1]);
      return this.form;
    },
    confirm() {
      this.$store.dispatch("users/update", this.form.getForm());
    }
  }
};
</script>

<style lang="scss" scoped></style>
