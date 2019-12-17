<template>
  <base-form
    confirm-only
    buttons
    confirm-text="Send"
    :disable-confirm="!isValid()"
    :form="getForm()"
    @confirm="confirm()"
    @close="close()"
  />
</template>

<script>
import BaseForm from "../generics/BaseForm";
import Course from "../../../objects/models/Course";

export default {
  props: {
    update: { type: Boolean, default: false },
    minigolf: { type: Object },
  },
  data: () => ({
    form: null,
    resetFlag: false
  }),
  name: "CourseForm",
  components: { BaseForm },
  methods: {
    getForm() {
      if (this.form != null) return this.form;
      let course = this.course ? this.course : new Course();
      this.form = Course.createForm(course);
      return this.form;
    },
    isValid() {
      let form = this.getForm();
      return form.isValid() && form.isDirty();
    },
    close() {
      this.$emit("close");
    },
    confirm() {
      let action = `courses/${this.course ? "update" : "create"}`;
      let form = this.form.getForm();
      form['minigolf_id'] = this.minigolf.id;
      this.$store.dispatch(action, form);
      this.close();
    }
  },
  mounted() {
  }
};
</script>

<style lang="scss" scoped></style>
