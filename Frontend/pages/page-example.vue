<template>
  <v-container>
    <v-row>
      <v-col xs="12">
        <v-card>
          <v-card-title class="headline">
            PageA
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
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import Modal from "../components/elements/Modal";
import Dialog from "../components/modal/dialog/Dialog";

export default {
  name: "page-example",
  components: { Dialog, Modal },
  data: () => ({
    modal: false,
    dialog: false
  }),
};
</script>

<style></style>
