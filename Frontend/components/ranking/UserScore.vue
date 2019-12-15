<template>
  <v-expansion-panels>
    <v-expansion-panel v-for="(game, c) in games" :key="game.id">
      <v-expansion-panel-header>
        <span class="number">#{{ games.length - c }}</span>
        <span class="date">{{ formatDate(game.date) }}</span>
      </v-expansion-panel-header>
      <v-expansion-panel-content>
        <v-row>
          <v-col>
            <game-recap-card :game="game"/>
          </v-col>
        </v-row>
      </v-expansion-panel-content>
    </v-expansion-panel>
  </v-expansion-panels>
</template>

<script>
import ScoreCard from "./ScoreCard";
import GameRecapCard from './GameRecapCard';
export default {
  name: "UserScore",
  components: { GameRecapCard, ScoreCard },
  props: {
    games: { type: Array }
  },
  data: () => ({
  }),
  methods: {
    formatDate(date) {
      let options = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
        hour12: false
      };
      return new Date(date).toLocaleDateString("en-EN", options);
    }
  },
  mounted() {}
};
</script>

<style lang="scss" scoped>
.number {
  max-width: 60px;
}
</style>
