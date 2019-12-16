<template>
  <v-expansion-panels>
    <v-expansion-panel v-for="(game, c) in games" :key="game.id">
      <v-expansion-panel-header>
        <v-row dense>
          <v-col class="number">{{ games.length - c }}</v-col>
          <v-col class="date">
            <v-icon small left>mdi-calendar</v-icon>
            {{ formatDate(game) }}
          </v-col>
          <v-col class="subtitle-2 py-0">
            <v-btn
              text
              small
              color="primary"
              @click.stop="$router.push(`minigolfs/${minigolf(game).slug}`)"
            >
              <v-icon small left>mdi-at</v-icon>
              {{ minigolf(game).name }}
            </v-btn>
          </v-col>
        </v-row>
      </v-expansion-panel-header>
      <v-expansion-panel-content>
        <v-row>
          <v-col>
            <game-recap-card :game="game" />
          </v-col>
        </v-row>
      </v-expansion-panel-content>
    </v-expansion-panel>
  </v-expansion-panels>
</template>

<script>
import ScoreCard from "./UserScoreCard";
import GameRecapCard from "./GameRecapCard";
export default {
  name: "UserScoreCard",
  components: { GameRecapCard, ScoreCard },
  props: {
    games: { type: Array }
  },
  computed: {
    loading() {
      return this.$store.state.scores.loading;
    }
  },
  methods: {
    minigolf(game) {
      return this.$store.getters["minigolfs/byId"](game.minigolf);
    },
    course(game) {
      return this.$store.course["course/byId"](game.course);
    },
    formatDate(game) {
      let options = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
        hour12: false
      };
      return new Date(game.date).toLocaleDateString("en-EN", options);
    }
  }
};
</script>

<style lang="scss" scoped>
.number {
  max-width: 60px;
  &:before {
    content: "#";
    font-weight: bold;
    font-style: italic;
    color: lightgray;
  }
}
</style>
