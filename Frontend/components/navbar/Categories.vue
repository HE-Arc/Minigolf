<template>
  <div class="categories">
    <v-menu
      bottom
      offset-y
      open-on-hover
      transition="scroll-y-transition"
      v-for="category in categories"
      :key="category.id"
    >
      <template v-slot:activator="{ on }">
        <v-btn
          nuxt
          text
          small
          v-on="on"
          class="font-weight-regular"
          :to="`/category/${category.id}`"
          :color="$colors().primary"
        >
          {{ category.name }}
        </v-btn>
      </template>

      <v-list shaped dense>
        <v-list-item-group color="primary">
          <v-subheader style="color: #5c5c5c;">ARTICLES</v-subheader>
          <v-list-item
            nuxt
            v-for="article in articles(category.id)"
            :key="article.id"
            :to="`/article/${article.id}`"
          >
            <v-list-item-content>
              <v-list-item-subtitle>{{ article.title }}</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-menu>
  </div>
</template>

<script>
export default {
  name: "Categories",
  computed: {
    categories() {
      return this.$store.state.categories.data.filter(i => i.published);
    }
  },
  methods: {
    articles(id) {
      return this.$store.getters["categories/articles"](id).filter(
        i => i.published
      );
    }
  }
};
</script>

<style lang="scss" scoped>

</style>
