<template>
  <v-container>
    <v-row>
      <v-col xs="12">
        <v-card>
          <v-card-title class="headline">
            Welcome to iGolf
          </v-card-title>
          <v-card-text>
            <p>Work in progress</p>
            <hr class="my-3" />
            <a href="https://nuxtjs.org/" target="_blank">
              Documentation
            </a>
            <br />
            <a href="https://github.com/nuxt/nuxt.js" target="_blank">
              GitHub
            </a>
          </v-card-text>
          <v-card-actions>
            <v-spacer />
            <v-btn color="primary" @click.stop="() => (modal = true)">
              Modal test
            </v-btn>
            <v-btn color="primary" nuxt to="/users">
              Users test
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>
    <Modal
      :modal="modal"
      @close="modal = false"
      title="A Modal"
      subtitle="It's subtitle"
    >
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aperiam
        cumque eaque, eos esse est fuga illo molestiae nam odit qui quia quo
        quod repudiandae sed soluta ullam unde voluptates.
      </p>
    </Modal>
  </v-container>
</template>

<script>
import Modal from "../components/modal/Modal";
import Dialog from "../components/modal/dialog/Dialog";
import Form from '../objects/forms/abstract/Form';

export default {
  name: "Home",
  components: { Dialog, Modal },
  data: () => ({
    modal: false,
    dialog: false
  }),
  mounted() {
    // const name = new TextField({field: "name", label: "Name", required: true});
    // const email = new TextField({field: "email", label: "Email", type: "email", min: 4, max: 30});
    // const ready = new CheckBox({field: "ready", label: "Ready"});
    // const form = new Form([name, ready, email]);
    
    const form = new Form();
    form.createTextField({field: "name", label: "Name", required: true});
    form.createTextField({field: "email", label: "Email", type: "email", min: 4, max: 30});
    form.createCheckBox({field: "ready", label: "Ready"});
    
    console.log(form.textFields());
  }
};
</script>

<style></style>
