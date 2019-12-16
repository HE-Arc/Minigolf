<template>
  <v-card flat class="test">
    <v-card-title>
      <v-row align="center">
        <v-col>Game id: {{ game.id }}</v-col>
        <v-spacer />
        <v-col>
          <v-chip class="ma-2" color="blue" outlined label>
            <v-icon left>mdi-barcode-scan</v-icon>
            {{ game.token }}
          </v-chip>
        </v-col>
      </v-row>
    </v-card-title>
    <v-card-text>
      <v-card outlined>
        <v-card-text>
          <user-score-card
            title="Your scores"
            :player="$user()"
            :scores="playerScores($user().id)"
          />
        </v-card-text>
      </v-card>
      <v-card class="mt-5" outlined>
        <v-card-text>
          <div class="mt-5">
            Players:
          </div>
          <v-chip
            v-for="player in players"
            :key="player.id"
            class="ma-2"
            color="info"
            :outlined="!isWinner(player)"
            pill
          >
            {{ player.name }}
            <v-icon v-if="!isWinner(player)" right>mdi-account-outline</v-icon>
            <v-icon v-else color="orange" right>mdi-crown-outline</v-icon>
          </v-chip>
        </v-card-text>
      </v-card>
      
      <v-card-actions>
        <v-btn text x-small color="primary" @click="show = !show">
          Full score sheet
          <v-icon>{{ show ? "mdi-chevron-up" : "mdi-chevron-down" }}</v-icon>
        </v-btn>
      </v-card-actions>
  
      <v-expand-transition>
        <div v-show="show">
          <v-card outlined class="mt-5">
            <v-card-text>
              <all-scores-card :scores="allScores" />
            </v-card-text>
          </v-card>
        </div>
      </v-expand-transition>
    </v-card-text>

  </v-card>
</template>

<script>
import UserScoreCard from "./UserScoreCard";
import AllScoresCard from "./AllScoresCard";

export default {
  name: "GameRecapCard",
  components: { AllScoresCard, UserScoreCard },
  props: {
    game: { type: Object }
  },
  data: () => ({
    show: false
  }),
  computed: {
    players() {
      return this.game.players.map(id => this.$store.getters["users/byId"](id));
    },
    allScores() {
      let allScores = { players: null, winner: null };
      let bestScore = 1000;
      allScores.players = this.players.map(i => {
        return { player: i.name, scores: this.playerScores(i.id) };
      });
      allScores.players.forEach(scores => {
        let t = 0;
        scores.scores.forEach(score => {
          t += score.score;
        });
        if (t < bestScore) {
          bestScore = t;
          allScores.winner = scores.player;
        }
        scores["total"] = t;
        t = 0;
      });
      return allScores;
    }
  },
  methods: {
    isWinner(player) {
      return this.allScores.winner == player.name;
    },
    playerScores(player) {
      let scores = this.$store.getters["scores/byGameId"](this.game.id);
      return scores.filter(i => i.user == player);
    }
  }
};
</script>

<style lang="scss" scoped></style>
