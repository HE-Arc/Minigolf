<template>
  <Page title="Affiliated minigolfs">
    <template v-slot:header-side>
      <admin-action-create entity-name="minigolf" class="admin-actions">
        <minigolf-form />
      </admin-action-create>
    </template>
    <template v-slot:sub-header>
      <v-text-field
        v-model="query"
        label="Search"
        hint="Start typing a venue name or a city name"
        clearable
      />
    </template>
    <template v-slot:body>
  
      <v-row v-if="results.length">
        <v-col cols="12" sm="6" v-for="minigolf in results" :key="minigolf.id">
          <minigolf-card :minigolf="minigolf" />
        </v-col>
      </v-row>
      <v-row v-else>
        <v-col cols="12" sm="6">
          <p>No results matching</p>
        </v-col>
      </v-row>
    </template>
  </Page>
</template>

<script>
import MinigolfCard from "../../components/elements/MinigolfCard";
import Page from "../../components/Page";
import AdminActionCreate from "../../components/elements/buttons/AdminActionCreate";
import MinigolfForm from "../../components/elements/forms/MinigolfForm";

export default {
  components: { MinigolfForm, AdminActionCreate, Page, MinigolfCard },
  data: () => ({
    query: null,
    results: []
  }),
  watch: {
    query(value) {
      this.results = this.$store.state.minigolfs.data;
      if (this.query) {
        let query = value.toLowerCase();
        let name = i => i.name.toLowerCase().includes(query);
        let city = i => i.city.toLowerCase().includes(query);
        this.results = this.results.filter(i => name(i) || city(i));
      }
    }
  },
  computed: {
    isAdmin() {
      return true;
    }
  },
  mounted() {
    this.results = this.$store.state.minigolfs.data;
  }
};
</script>

<style lang="scss" scoped>

</style>
