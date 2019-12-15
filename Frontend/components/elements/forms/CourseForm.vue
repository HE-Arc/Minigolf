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
    course: { type: Object },
    update: { type: Boolean, default: false }
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
      this.$store.dispatch(action, this.form.getForm());
      this.close();
    }
  }
};
</script>

<style lang="scss" scoped></style>
