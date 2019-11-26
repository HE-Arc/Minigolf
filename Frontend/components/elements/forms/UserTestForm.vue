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
      let form = { id: this.form.entityId };
      console.log(this.form);
      this.form.fields.forEach(field => {
        form[field.field] = field.value;
      });
      this.$store.dispatch("users/update", form);
    }
  }
};
</script>

<style lang="scss" scoped></style>
