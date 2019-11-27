<template>
  <Section :title="title" :subtitle="subtitle" :cols="6">
    <base-form
      :form="getForm()"
      confirm-text="Send"
      @confirm="sendAction"
      buttons
    />
  </Section>
</template>

<script>
import Section from "../elements/Section";
import BaseForm from "../elements/generics/BaseForm";
import Form from '../../objects/forms/abstract/Form';
import Rules from '../../objects/forms/abstract/Rules';
export default {
  name: "RegisterSection",
  components: { BaseForm, Section },
  data: () => ({
    title: "Do you own a venue?",
    subtitle: "Register now and be part of the future"
  }),
  methods: {
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
        field: "venue",
        label: "Venue name",
        placeholder: "My amazing minigolf",
        required: true,
      });
      form.createTextField({
        value: "",
        field: "city",
        label: "City",
        placeholder: "Brussels",
        required: true,
      });
      form.createTextField({
        value: "",
        field: "address",
        label: "Address",
        placeholder: "Avenue neuve 232c",
        required: true,
      });
      this.form = form;
      return form;
    },
    sendAction() {
      console.log("Send");
    }
  }
};
</script>

<style lang="scss" scoped></style>
