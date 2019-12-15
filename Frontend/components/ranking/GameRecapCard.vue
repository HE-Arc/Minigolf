<template>
  <v-card flat class="test">
    <v-card-title>
      <v-row align="center">
        <v-col>Game id: {{ game.id }}</v-col>
        <v-spacer />
        <v-col class="subtitle-2">Token: {{ game.token }}</v-col>
      </v-row>
    </v-card-title>
    <v-card-text>
      <score-card
        title="Your score:"
        :player="$user()"
        :scores="playerScores($user().id, game)"
      />
      <br />
      <b>Players:</b>
      <v-chip
        v-for="player in players(game)"
        :key="player.id"
        class="ma-2"
        color="info"
        outlined
        pill
      >
        {{ player.name }}
        <v-icon right>mdi-account-outline</v-icon>
      </v-chip>
    </v-card-text>
    <v-card-actions>
      <v-btn
        text
        x-small
        color="primary"
        @click="show = !show"
      >
       Full score sheet
        <v-icon>{{ show ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
        
      </v-btn>
    </v-card-actions>

    <v-expand-transition>
      <div v-show="show">
        <v-divider></v-divider>

        <v-card-text>
          I'm a thing. But, like most politicians, he promised more than he could deliver. You won't have time for sleeping, soldier, not with all the bed making you'll be doing. Then we'll go with that data file! Hey, you add a one and two zeros to that or we walk! You're going to do his laundry? I've got to find a way to escape.
        </v-card-text>
      </div>
    </v-expand-transition>
  </v-card>
</template>

<script>
  import ScoreCard from './ScoreCard';
  export default {
    name: 'GameRecapCard',
    components: { ScoreCard },
    props: {
      game: { type: Object },
    },
    data: () => ({
      show: false ,
    }),
    methods: {
      playerScores(player, game) {
        let scores = this.$store.getters["scores/byGameId"](game.id);
        return scores.filter(i => i.user == player);
      },
      players(game) {
        return game.players.map(id => this.$store.getters["users/byId"](id));
      },
    }
  };
</script>

<style lang="scss" scoped>

</style>
