<template>
  <v-container fluid>
    <v-row>
      <v-col>
        <v-card>
          <v-data-table
            dense
            v-model="selected"
            disable-pagination
            hide-default-footer
            single-select
            show-select
            :sort-by="['number']"
            :loading="loading"
            :headers="headers"
            :items="holes"
            class="elevation-1 py-5 px-1 myTable"
            @click:row="clickRow"
          >
          </v-data-table>
        </v-card>
      </v-col>

      <v-col>
        <v-card>
          <v-data-table
            dense
            disable-pagination
            hide-default-footer
            :sort-by="['number']"
            :loading="loading"
            :headers="headers"
            :items="holes"
            class="elevation-1 py-5 px-1"
          ></v-data-table>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  name: "CourseLaderboard",
  props: {
    holesIds: { type: Array }
  },
  data: () => ({
    selected: []
  }),
  methods: {
    clickRow(e) {
      this.selected = this.selected.length && this.selected[0] == e ? [] : [e];
    }
  },
  computed: {
    loading() {
      return this.$store.state.holes.loading;
    },
    holes() {
      return this.$store.getters["holes/byIdList"](this.holesIds);
    },
    headers() {
      return [
        { text: "Hole", value: "number" },
        { text: "Count", value: "count" },
        { text: "Best", value: "best" },
        { text: "Worse", value: "worse" },
        { text: "Average", value: "average" },
        { text: "Median", value: "median" }
      ];
    }
  },
  mounted() {
    this.$store.dispatch("holes/fetchList", this.holesIds);
  }
};
</script>

<style lang="scss" scoped>

.v-data-table {
  &::v-deep tbody {
    tr {
      &:hover {
        background-color: rgba(149, 117, 205, 0.46) !important;
      }
    }
  }
}

</style>
