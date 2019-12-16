<template>
  <div>
    {{ title }}
    <v-divider style="width:45%" />
    <tbody>
      <tr>
        <td class="header"><v-icon small>mdi-golf</v-icon></td>
        <td v-for="score in formatedScore" :key="score.hole">
          {{ score.hole }}
        </td>
      </tr>
      <tr>
        <td class="header">Score</td>
        <td v-for="score in formatedScore" :key="score.hole">
          {{ score.score }}
        </td>
      </tr>
    </tbody>
  </div>
</template>

<script>
export default {
  name: "ScoreCard",
  props: {
    player: { type: Object },
    scores: { type: Array },
    title: { type: String }
  },
  computed: {
    formatedScore() {
      let scores = [];
      for (let i = 0; i < this.scores.length; i++) {
        scores.push({ hole: i + 1, score: this.scores[i].score });
      }
      return scores;
    }
  },
  mounted() {
    this.formatedScore;
  }
};
</script>

<style lang="scss" scoped>
tbody {
  overflow-y: scroll;

  .header {
    width: 60px;
    font-weight: bold;
  }

  td {
    width: 30px;
  }
}
</style>
