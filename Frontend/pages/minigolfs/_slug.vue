<template>
  <Page>
    <h1>{{ minigolf.name }}</h1>
    <br>
    <br>
    <pre>
      {{ minigolf }}
    </pre>
  </Page>
</template>

<script>
  import Page from '../../components/elements/generics/Page';
  export default {
    name: 'user',
    components: { Page },
    computed: {
      minigolf() {
        let slug = this.$route.params.slug;
        return this.$store.getters["minigolfs/bySlug"](slug);
      },
    },
  };
</script>

<style lang="scss" scoped>

</style>
