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
            <v-btn color="primary" @click.stop="() => (loginDialog = true)">
              Login test
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>
    <login-dialog :dialog="loginDialog" @close="loginDialog = false">
    
    </login-dialog>
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
import Modal from "../components/elements/Modal";
import LoginDialog from '../components/elements/dialogs/LoginDialog';

export default {
  name: "Home",
  components: { LoginDialog, Modal },
  data: () => ({
    loginDialog: false,
    modal: false,
    dialog: false
  })
};
</script>

<style></style>
