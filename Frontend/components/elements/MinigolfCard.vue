<template>
  <div>
    <v-hover>
      <template v-slot="{ hover }">
        <v-card
          class="card"
          @click.stop="link(minigolf.id)"
          :ripple="false"
          :elevation="hover ? 12 : 2"
        >
          <v-img
            class="white--text align-end"
            height="200px"
            :src="minigolf.image"
          >
            <div class="admin-actions">
              <v-tooltip color="blue" top>
                <template v-slot:activator="{ on }">
                  <v-btn fab small elevation="1" color="white" v-on="on">
                    <v-icon color="blue">mdi-pen</v-icon>
                  </v-btn>
                </template>
                <span>Edit</span>
              </v-tooltip>
              <v-tooltip color="red" top>
                <template v-slot:activator="{ on }">
                  <v-btn
                    fab
                    small
                    color="white"
                    elevation="1"
                    v-on="on"
                    @click.stop="
                      $store.dispatch('minigolfs/deleteConfirm', minigolf)
                    "
                  >
                    <v-icon color="red">mdi-close</v-icon>
                  </v-btn>
                </template>
                <span>Delete</span>
              </v-tooltip>
            </div>

            <v-card-title>
              <h1
                class="minigolf-name white--text mb-2 display-1 text-xs-center"
              >
                {{ minigolf.name }}
              </h1>
            </v-card-title>
          </v-img>
          <v-card-title class="ma-0 pa-2 card-title">
            <v-list-item three-line class="title-container">
              <v-list-item-content>
                <v-list-item-subtitle class="body-1 font-weight-light">
                  <span v-if="minigolf.discription">
                    {{ minigolf.description }}
                  </span>
                  <span v-else>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Alias eum illo repellat suscipit tempora. A at, dicta,
                    dignissimos enim fuga hic impedit maxime nemo quia repellat
                    sapiente soluta unde voluptatum!
                  </span>
                </v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>
          </v-card-title>
          <v-divider class="mt-6 mx-4"></v-divider>

          <v-card-text>
            <v-chip class="mr-2" color="blue">
              <v-icon color="white" left>mdi-city</v-icon>
              <span style="color: white">{{ minigolf.city }}</span>
            </v-chip>

            <v-tooltip top>
              <template v-slot:activator="{ on }">
                <v-chip class="mr-2" color="blue" v-on="on">
                  <v-icon color="white" left>mdi-golf</v-icon>
                  <span style="color: white">{{ minigolf.courts }}</span>
                </v-chip>
              </template>
              <span>Courts number</span>
            </v-tooltip>
          </v-card-text>
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

.admin-actions {
  position: absolute;
  right: 10px;
  top: 10px;
}

.minigolf-name {
  font-weight: 900;
  text-shadow: 3px 2px #000;
}

.title-container {
  overflow: hidden;
  text-overflow: ellipsis;
}
</style>
