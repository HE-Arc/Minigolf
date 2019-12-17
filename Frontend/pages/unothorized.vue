<template>
  <Page title="Unauthorized access">
    <template v-slot:body>
      <p>Unauthorized access. Redirection in {{ time }} second{{ plural }}</p>
    </template>
  </Page>
</template>

<script>
import Page from "../components/Page";
export default {
  name: "unauthorized",
  components: { Page },
  data: () => ({
    time: 3
  }),
  computed: {
    plural() {
      return this.time > 1 ? "s" : "";
    }
  },
  watch: {
    time(newValue, oldValue) {
      if (newValue <= 0) {
        setTimeout(() => {
          this.$router.push("/");
        }, 500);
      }
    }
  },
  mounted() {
    setInterval(() => {
      if (this.time > 0) {
        this.time--;
      }
    }, 1000);
  }
};
</script>

<style lang="scss" scoped></style>
