<template>
  <div>
    {{ title }}
    <tbody>
      <tr>
        <td class="header"><v-icon small>mdi-golf</v-icon></td>
        <td v-for="score in formatedScore" :key="score.hole">
          <b>{{ score.hole }}</b>
        </td>
      </tr>
      <tr>
        <td class="header">Score</td>
        <td v-for="score in formatedScore" :key="score.hole">
          {{ score.score }}
        </td>
        <td></td>
        <td class="total">{{ this.total }}</td>
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
  data: () => ({
    total: 0
  }),

  computed: {
    formatedScore() {
      let scores = [];
      this.total = 0;
      for (let i = 0; i < this.scores.length; i++) {
        this.total += this.scores[i].score;
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

  .total {
    background-color: rgba(144, 238, 144, 0.65);
    border-radius: 15px;
    padding-left: 7px;
    
  }
}
</style>
