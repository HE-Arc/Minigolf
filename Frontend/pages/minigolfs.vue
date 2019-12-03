<template>
  <div>
    <h1>Minigolfs</h1>

    <v-row>
      <v-col cols="12">
        <v-text-field
          v-model="query"
          label="Search"
          hint="Start typing a venue name or a city name"
          clearable
        ></v-text-field>
      </v-col>
    </v-row>

    <v-row>
      <v-col cols="6" v-for="minigolf in results" :key="minigolf.id">
        <minigolf-card :minigolf="minigolf" />
      </v-col>
    </v-row>
  </div>
</template>

<script>
import MinigolfCard from "../components/elements/MinigolfCard";

export default {
  name: "news",
  components: { MinigolfCard },
  data: () => ({
    query: null
  }),
  computed: {
    results() {
      let minigolfs = this.$store.state.minigolfs.data;
      if (this.query) {
        let query = this.query.toLowerCase();
        let name = i => i.name.toLowerCase().includes(query);
        let city = i => i.city.toLowerCase().includes(query);
        return minigolfs.filter(i => name(i) || city(i));
      }
      return minigolfs;
    }
  }
};
</script>

<style lang="scss" scoped></style>
