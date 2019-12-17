<template>
  <div>
    <div class="wrapper">
      
      <v-tooltip color="purple" top>
        <template v-slot:activator="{ on }">
          <v-btn
            fab
            x-small
            v-on="on"
            color="white"
            elevation="1"
            @click.stop="messageDialog = true"
          >
            <v-icon color="purple">mdi-message-text-outline</v-icon>
          </v-btn>
        </template>
        <span>Send a message to {{ entity.name }}</span>
      </v-tooltip>
      
      <v-tooltip color="purple" top>
        <template v-slot:activator="{ on }">
          <v-btn
            fab
            x-small
            v-on="on"
            color="white"
            elevation="1"
            @click.stop="sendInvitation"
          >
            <v-icon color="purple">mdi-golf-tee</v-icon>
          </v-btn>
        </template>
        <span>Send invite to {{ entity.name }}</span>
      </v-tooltip>
    </div>
    
    <base-dialog
      buttons
      confirm-only
      width="400"
      icon="mdi-message-text-outline"
      confirm-text="Send"
      :disable-confirm="!getForm().isValid()"
      :modal="messageDialog"
      @close="close"
      @confirm="confirm"
    >
      <base-form :form="getForm()" />
    </base-dialog>
    
    
    
    
  </div>
</template>

<script>
import Form from '../../../objects/forms/abstract/Form';
import BaseDialog from '../generics/BaseDialog';
import BaseForm from '../generics/BaseForm';

export default {
  name: "UserActions",
  components: { BaseForm, BaseDialog },
  props: {
    entity: { type: Object }
  },
  data: () => ({
    form: null,
    messageDialog: false,
  }),
  methods: {
    getForm() {
      if (this.form != null) return this.form;

      let form = new Form();
      form.createTextField({
        value: "",
        field: "name",
        label: "Title",
        required: true,
        focus: true,
      });
      form.createTextArea({
        value: "",
        field: "description",
        label: "Message",
        required: true,
      });
      this.form = form;
      return form;
    },
    sendInvitation() {
      this.$notifications('success', "Invitation sent !");
    },
    confirm() {
      this.$notifications('success', "Message sent !");
      this.close();
    },
    close() {
      this.messageDialog = false;
    },
  },
};
</script>

<style lang="scss" scoped>
.wrapper {
  display: flex;
}
</style>
