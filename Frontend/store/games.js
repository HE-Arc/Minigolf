import Game from "../objects/models/Game";

export const state = () => ({
  data: [],
  loading: false
});

export const getters = {
  byId: state => id => state.data.find(i => i.id == id),
  byUserId: state => userId =>
    state.data.filter(i => i.players.includes(userId)),
  byIdList: state => ids => state.data.filter(i => ids.includes(i.id))
};

export const mutations = {
  INIT(state, data) {
    data.forEach(i => state.data.push(new Game(i).toPojo()));
  },
  CREATE(state, data) {
    state.data.push(new Game(data).toPojo());
    this.$notifications("success", `${Game.name} created`);
  },
  ADD(state, data) {
    // console.log(data);
    state.data.push(new Game(data).toPojo());
  },
  UPDATE(state, data) {
    let object = state.data.find(i => i.id === data.id);
    Object.getOwnPropertyNames(data).forEach(i => (object[i] = data[i]));
    this.$notifications("success", `${Game.name} updated`);
  },
  DELETE(state, id) {
    state.data = state.data.filter(i => i.id !== id);
    this.$notifications("success", `${Game.name} deleted`);
  },
  SET_LOADING(state, value) {
    state.loading = value;
  }
};

export const actions = {
  async fetch({ commit }) {
    await this.$axios
      .get(Game.endpoint())
      .then(res => commit("INIT", res.data))
      .catch(err => this.$notifications("error"));
  },
  fetchList({ commit, getters }, data) {
    commit("SET_LOADING", true);
    for (let id of data) {
      if (getters.byId(id) == undefined) {
        this.$axios
          .get(`${Game.endpoint()}/${id}`)
          .then(res => commit("ADD", res.data))
          .catch(err => this.$notifications(err))
          .finally(() => {
            if (data.indexOf(id) == data.length - 1) {
              setTimeout(() => {
                commit("SET_LOADING", false);
              }, 800);
            }
          });
      } else {
        commit("SET_LOADING", false);
      }
    }
  },
  create({ commit }, data) {
    this.$axios
      .post(Game.endpoint(), data)
      .then(res => commit("CREATE", res.data))
      .catch(err => this.$notifications("error"));
  },
  update({ commit }, data) {
    this.$axios
      .patch(Game.endpoint(data.id), data)
      .then(res => commit("UPDATE", res.data))
      .catch(err => this.$notifications("error"));
  },
  delete({ commit }, data) {
    this.$axios
      .delete(Game.endpoint(data.id))
      .then(res => commit("DELETE", data.id))
      .catch(err => this.$notifications("error"));
  },
  deleteConfirm({ commit }, data) {
    this.commit("dialog/DELETE", data);
  },
  updateConfirm({ commit }, data) {
    this.commit("dialog/UPDATE", data);
  }
};
