import Minigolf from '../objects/models/Minigolf';

export const state = () => ({
  data: [],
});

export const getters = {
  byId: state => id => state.data.find(i => i.id == id),
  bySlug: state => slug => state.data.find(i => i.slug === slug),
  filter: state => query => {
    let q = query.toLowerCase();
    let name = i => i.name.toLowerCase().includes(q);
    let city = i => i.city.toLowerCase().includes(q);
    return state.data.filter(i => name(i) || city(i));
  }
};

export const mutations = {
  INIT(state, data) {
    data.forEach(i => state.data.push(new Minigolf(i).toPojo()));
  },
  CREATE(state, data) {
    state.data.push(new Minigolf(data).toPojo());
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


