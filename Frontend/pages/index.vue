<template>
  <v-container>
    <v-row>
      <v-col xs="12">
        <v-card>
          <v-card-title class="headline">
            Welcome to SwipeD
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
            <v-btn color="primary" @click.stop="() => (dialog = true)">
              Dialog test
            </v-btn>
            <v-btn color="primary" @click.stop="() => (modal = true)">
              Modal test
            </v-btn>
            <v-btn color="primary" nuxt to="/users">
              Users
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>
    <Dialog warning :modal="dialog" @close="dialog = false">
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur ex
        expedita fugit vero? Aperiam beatae commodi dolores eos fuga fugiat
        laudantium non optio quam quisquam, sit sunt totam ullam veritatis!
      </p>
    </Dialog>
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
import Dialog from "../components/modal/Dialog";

export default {
  name: "Home",
  components: { Dialog, Modal },
  data: () => ({
    modal: false,
    dialog: false
  }),
  mounted() {
    console.log(this.$store.state.swipes.data);
  }
};
</script>

<style></style>
