<template>
  <div>
    <v-hover>
      <template v-slot="{ hover }">
      <v-card class="card" @click="link(minigolf.id)" :elevation="hover ? 12 : 2">
        <v-img
          class="white--text align-end"
          height="200px"
          :src="minigolf.image"
        >
          <v-card-title>
            <h1 class="minigolf-name white--text mb-2 display-1 text-xs-center">
              {{ minigolf.name }}
            </h1>
          </v-card-title>
        </v-img>
        <v-card-title class="ma-0 pa-2 card-title">
          <v-list-item three-line class="title-container">
            <v-list-item-content>
              <v-list-item-subtitle class="body-1 font-weight-light">
                {{ minigolf.description }}
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias
                eum illo repellat suscipit tempora. A at, dicta, dignissimos
                enim fuga hic impedit maxime nemo quia repellat sapiente soluta
                unde voluptatum!
              </v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-card-title>
      </v-card>
      </template>
    </v-hover>
  </div>
</template>

<script>
export default {
  name: "MinigolfCard",
  props: {
    minigolf: { type: Object }
  },
  methods: {
    link(id) {
      this.$router.push({ path: `/minigolf/${id}` });
    }
  }
};
</script>

<style lang="scss" scoped>
@import "../../assets/scss/variables";

.minigolf-name {
  font-weight: 900;
  text-shadow: 3px 2px #000;
}

.title-container {
  overflow: hidden;
  text-overflow: ellipsis;
}
</style>
