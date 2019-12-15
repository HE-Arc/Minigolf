<template>
  <div>
    <v-hover>
      <template v-slot="{ hover }">
        <v-card
          class="card"
          @click.stop="link(minigolf.slug)"
          :ripple="false"
          :elevation="hover ? 12 : 2"
        >
          <v-img
            class="white--text align-end"
            height="200px"
            :src="minigolf.image"
          >
            <admin-actions
              v-if="$loggedIn()"
              class="admin-actions"
              :entity="minigolf"
              @dialog="dialog = true"
            >
              <template v-slot:dialog>
                <base-dialog
                  icon="mdi-pen"
                  :title="minigolf.name"
                  :modal="dialog"
                  @close="dialog = false"
                >
                  <minigolf-form :minigolf="minigolf" @close="dialog = false" />
                </base-dialog>
              </template>
            </admin-actions>

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
                  <span v-if="minigolf.description">
                    {{ minigolf.description }}
                  </span>
                  <span v-else>...</span>
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
                  <span style="color: white">{{ minigolf.courses.length }}</span>
                </v-chip>
              </template>
              <span>Courses number</span>
            </v-tooltip>
          </v-card-text>
        </v-card>
      </template>
    </v-hover>
  </div>
</template>

<script>
import BaseDialog from "./generics/BaseDialog";
import MinigolfForm from "./forms/MinigolfForm";
import AdminActions from "./buttons/AdminActions";
export default {
  name: "MinigolfCard",
  components: { AdminActions, MinigolfForm, BaseDialog },
  props: {
    minigolf: { type: Object }
  },
  data: () => ({
    dialog: false,
  }),
  methods: {
    link(slug) {
      this.$router.push({ path: `/minigolfs/${slug}` });
    },
    confirm() {}
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
