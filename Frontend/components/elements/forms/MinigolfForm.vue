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
import Minigolf from "../../../objects/models/Minigolf";

export default {
  props: {
    minigolf: { type: Object }
  },
  data: () => ({
    form: null
  }),
  name: "MinigolfForm",
  components: { BaseForm },
  methods: {
    getForm() {
      if (this.form != null) return this.form;
      let minigolf = this.minigolf ? this.minigolf : new Minigolf();
      this.form = Minigolf.createForm(minigolf);
      return this.form;
    },
    isValid() {
      let form = this.getForm();
      return form.isValid() && form.isDirty();
    },
    close() {
      this.$emit('close')
    },
    confirm() {
      let action = `minigolfs/${this.minigolf ? 'update' : 'create'}`;
      this.$store.dispatch(action, this.form.getForm());
      this.close();
    }
  }
};
</script>

<style lang="scss" scoped></style>
