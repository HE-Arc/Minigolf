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

            <v-btn color="primary" @click.stop="() => (modal = true)">
              Modal test
            </v-btn>
            <v-btn color="primary" nuxt to="/inspire">
              Continue
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>

    <base-modal
      :modal="modal"
      @close="modal = false"
      width="650"
      headline="A Modal"
      type="edit"
    >
      <template v-slot:body>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias
          aperiam cumque eaque, eos esse est fuga illo molestiae nam odit qui
          quia quo quod repudiandae sed soluta ullam unde voluptates.
        </p>
      </template>
    </base-modal>
  </v-container>
</template>

<script>
import BaseModal from "../components/base-components/BaseModal";
export default {
  components: { BaseModal },
  data: () => ({
    modal: false
  })
};
</script>

<style></style>
