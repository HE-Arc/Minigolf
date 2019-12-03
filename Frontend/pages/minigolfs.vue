<template>
  <Page>
    <div class="header">
      
      <h1 class="page-title display-3">Affiliated minigolfs</h1>

      <div v-if="isAdmin" class="admin-actions">
        <v-tooltip color="green" top>
          <template v-slot:activator="{ on }">
            <v-btn v-on="on" color="green" elevation="1" fab small>
              <v-icon color="white" large>mdi-plus</v-icon>
            </v-btn>
          </template>
          <span>Register a new minigolf</span>
        </v-tooltip>
      </div>
    </div>

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
      <v-col cols="12" sm="6" v-for="minigolf in results" :key="minigolf.id">
        <minigolf-card :minigolf="minigolf" />
      </v-col>
    </v-row>
  </Page>
</template>

<script>
import MinigolfCard from "../components/elements/MinigolfCard";
import Page from "../components/elements/generics/Page";

export default {
  name: "news",
  components: { Page, MinigolfCard },
  data: () => ({
    query: null
  }),
  computed: {
    isAdmin() {
      return true;
    },
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

<style lang="scss" scoped>
  @import "../assets/scss/variables";
  
.header {
  display: flex;
  align-items: center;
  
  @media screen and (max-width: $mobile) {
    flex-direction: column;
  }

  .page-title {
    margin-right: auto;
  }

  .admin-actions {
    margin-left: auto;
    
    @media screen and (max-width: $mobile) {
      margin: 15px auto auto 0;
    }
  }
}
</style>
