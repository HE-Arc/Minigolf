<template>
  <Page>
    <template v-slot:header>
      <v-img
        class="image display-1 white--text align-end"
        :src="minigolf.image"
        height="300"
      >
        <h1 class="image-header">{{ minigolf.name }}</h1>
      </v-img>
    </template>

    <template v-slot:body>
      <v-row justify="center">
        <v-col class="left pr-5" cols="">
          <data-card title="Details" width="400">
            <data-list :list="attributes" />
          </data-card>
        </v-col>
        <v-col cols="">
          <data-card title="Location">
            <data-list :list="attributes" />
          </data-card>
        </v-col>
      </v-row>

      <v-row>
        <v-col>
          <data-card title="Highscores" width="400">
            <data-list :list="attributes" />
          </data-card>
        </v-col>
        <v-col>
          <data-card title="Scores" width="400">
            <data-list :list="attributes" />
          </data-card>
        </v-col>
      </v-row>
    </template>
  </Page>
</template>

<script>
import Page from "../../components/Page";
import DataList from "../../components/elements/generics/containers/DataList";
import DataCard from "../../components/elements/generics/containers/DataCard";

export default {
  name: "user",
  components: { DataCard, DataList, Page },
  computed: {
    minigolf() {
      let slug = this.$route.params.slug;
      return this.$store.getters["minigolfs/bySlug"](slug);
    },
    attributes() {
      const minigolf = this.minigolf;
      return [
        { name: "Name", value: minigolf.name },
        { name: "City", value: minigolf.city },
        { name: "Phone", value: minigolf.phone, icon: "" },
        { name: "Address", value: minigolf.address, icon: "" },
        { name: "Email", value: minigolf.email, icon: "" }
      ];
    }
  }
};
</script>

<style lang="scss" scoped>
.image {
  border-radius: 5px;
  filter: opacity(0.8);
}

.image-header {
  font-weight: 900;
  text-shadow: 3px 2px #000;
  padding-bottom: 40px;
  padding-left: 20px;
}

.map {
  border-radius: 5px;
  background-color: rgba(211, 211, 211, 0.34);
  height: 400px;
}
</style>
