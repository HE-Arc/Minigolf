<template>
  <tbody>
    <tr>
      <td class="header"><v-icon small>mdi-golf</v-icon></td>
      <td v-for="i in scores.players[0].scores.length" :key="i">
        <b>{{ i }}</b>
      </td>
    </tr>
    <tr v-for="line in scores.players" :key="line.player">
      <td class="header" :class="{'winner': scores.winner == line.player}">
        {{ line.player }}
      </td>
      <td v-for="score in line.scores" :style="userStyle(line.player)">
        {{ score.score }}
      </td>
      <td></td>
      <td :class="{'winner': scores.winner == line.player}">
        {{ line.total }}
      </td>
    </tr>
  </tbody>
</template>

<script>
export default {
  name: "AllScoresCard",
  props: {
    scores: { type: Object }
  },
  methods: {
    userStyle(user) {
      if (user == this.$auth.user.name) {
        return {
          borderBottom: "1px solid #9575CD",
          borderTop: "1px solid #9575CD"
        };
      }
    }
  },
};
</script>

<style lang="scss" scoped>
tbody {
  overflow-y: scroll;

  .header {
    width: 90px;
    font-weight: bold;
  }

  td {
    width: 30px;
  }

  .winner {
    background-color: rgba(144, 238, 144, 0.65);
    padding-left: 7px;
    border-radius: 15px;
  }
}
</style>
