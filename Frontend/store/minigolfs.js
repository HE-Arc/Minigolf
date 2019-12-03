import Minigolf from '../objects/models/Minigolf';

export const state = () => ({
  data: [],
});

export const getters = {
  byEmail: state => email => state.data.find(i => i.email === email),
};

export const mutations = {
  INIT(state, data) {
    data.forEach(i => state.data.push(new Minigolf(i)));
  },
  CREATE(state, data) {
    state.data.push(new Minigolf(data));
    this.$notifications('success', `${ Minigolf.name } created`);
  },
  UPDATE(state, data) {
    let object = state.data.find(i => i.id === data.id);
    Object.getOwnPropertyNames(data).forEach(
      i => (object[i] = data[i]),
    );
    this.$notifications('success', `${ Minigolf.name } updated`);
  },
  DELETE(state, id) {
    state.data = state.data.filter(i => i.id !== id);
    this.$notifications('success', `${ Minigolf.name } deleted`);
  },
};

export const actions = {
  async fetch({ commit }) {
    await this.$axios
              .get(Minigolf.endpoint())
              .then(res => commit('INIT', res.data))
              .catch(err => this.$notifications('error'));
  },
  create({ commit }, data) {
    this.$axios
        .post(Minigolf.endpoint(), data)
        .then(res => commit('CREATE', res.data))
        .catch(err => this.$notifications('error'));
  },
  update({ commit }, data) {
    this.$axios
        .patch(Minigolf.endpoint(data.id), data)
        .then(res => commit('UPDATE', res.data))
        .catch(err => this.$notifications('error'));
  },
  delete({ commit }, data) {
    this.$axios
        .delete(Minigolf.endpoint(data.id))
        .then(res => commit('DELETE', data.id))
        .catch(err => this.$notifications('error'));
  },
  deleteConfirm({ commit }, data) {
    this.commit('dialog/DELETE', data);
  },
  updateConfirm({ commit }, data) {
    this.commit('dialog/UPDATE', data);
  },
};


