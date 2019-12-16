<template>
  <Page :title="title">
    <template v-slot:body>
      <nuxt-link class="ml-2" to="/">Go back home</nuxt-link>
    </template>
  </Page>
</template>

<script>
import Page from "../components/Page";
export default {
  components: { Page },
  props: ["error"],
  data: () => ({
  }),
  computed: {
    title() {
      let message = "Unexpected error";
      let error = this.error.statusCode;
      if (error == 404) {
        message = "It's just a 404";
      }
      return message;
    },
  },
};
</script>
