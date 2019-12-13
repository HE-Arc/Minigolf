<template>
  <v-breadcrumbs class="pl-0" :items="breadCrumb" divider="-" />
</template>

<script>
export default {
  name: "Breadcrumb",
  computed: {
    breadCrumb() {
      let routes = this.$router.options.routes;

      let list =
        this.$route.path != "/"
          ? this.$route.path.replace("/", "").split("/")
          : [];

      return [{ path: "/", name: "home" }, ...list].map(name =>
        this.createNode(routes.find(route => route.name == name) || name)
      );
    }
  },
  methods: {
    createNode(route) {
      return {
        text: route.name || route,
        to: route.path || null,
        exact: true,
        disabled: !(route instanceof Object)
      };
    }
  }
};
</script>

<style lang="scss"></style>
