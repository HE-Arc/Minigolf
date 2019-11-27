<template>
  <Section :title="title" :subtitle="subtitle" cols="8">
    <base-form :form="getForm()" confirm-text="Send" @confirm="sendAction" />

    <v-row justify="center">
      <v-col cols="11" class="ma-0 pa-0">
        <v-btn
          text
          block
          color="green darken-1"
          :disabled="!getForm().isValid()"
        >
          <v-icon class="mr-4">mdi-send</v-icon>
          <span>Send</span>
        </v-btn>
      </v-col>
    </v-row>
  </Section>
</template>

<script>
import Section from "../elements/Section";
import BaseForm from "../elements/generics/BaseForm";
import Form from "../../objects/forms/abstract/Form";
import Rules from "../../objects/forms/abstract/Rules";
export default {
  name: "RegisterSection",
  components: { BaseForm, Section },
  data: () => ({
    title: "Do you own a venue?",
    subtitle: "Register now and be part of the future",
    form: null
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
        required: true
      });
      form.createTextField({
        value: "",
        field: "website",
        label: "Website",
        placeholder: "https://my-minigolf.com"
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
