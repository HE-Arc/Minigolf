<template>
  <Page title="Affiliated minigolfs">
    <template v-if="$auth.loggedIn" v-slot:header-side>
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
      <v-row v-if="minigolfs.length">
        <v-col
          cols="12"
          sm="6"
          v-for="minigolf in minigolfs"
          :key="minigolf.id"
        >
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
  async fetch({ store }) {
    await store.dispatch("minigolfs/fetch");
  },
  data: () => ({
    query: null
  }),
  watch: {
    query() {
      return this.minigolfs;
    }
  },
  computed: {
    minigolfs() {
      let query = this.query ? this.query : "";
      return this.$store.getters["minigolfs/filter"](query);
    }
  }
};
</script>

<style lang="scss" scoped></style>
