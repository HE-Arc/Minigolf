<template>
  <Page :title="minigolf.name">
    <template v-slot:body>
      
      <v-row justify="center">
        <v-col class="left pr-5" cols="">
          <data-card title="Details" width="400">
            <data-list :list="attributes"/>
          </data-card>
        </v-col>
        <v-col cols="">
          <data-card title="Location">
            <data-list :list="attributes"/>
          </data-card>
        </v-col>
      </v-row>
      
      <v-row>
        <v-col>
          <data-card title="Highscores" width="400">
            <data-list :list="attributes"/>
          </data-card>
        </v-col>
        <v-col>
          <data-card title="Scores" width="400">
            <data-list :list="attributes"/>
          </data-card>
        </v-col>
      </v-row>
      
    </template>
  </Page>
</template>

<script>
import Page from "../../components/Page";
import DataList from '../../components/elements/generics/containers/DataList';
import DataCard from '../../components/elements/generics/containers/DataCard';

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
.map {
  border-radius: 5px;
  background-color: rgba(211, 211, 211, 0.34);
  height: 400px;
}
</style>
