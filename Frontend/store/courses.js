import Course from '../objects/models/Course';

export const state = () => ({
  data: [],
});

export const getters = {
};

export const mutations = {
  INIT(state, data) {
    data.forEach(i => state.data.push(new Course(i)));
  },
  CREATE(state, data) {
    state.data.push(new Course(data));
    this.$notifications('success', `${ Course.name } created`);
  },
  UPDATE(state, data) {
    let object = state.data.find(i => i.id === data.id);
    Object.getOwnPropertyNames(data).forEach(
      i => (object[i] = data[i]),
    );
    this.$notifications('success', `${ Course.name } updated`);
  },
  DELETE(state, id) {
    state.data = state.data.filter(i => i.id !== id);
    this.$notifications('success', `${ Course.name } deleted`);
  },
};

export const actions = {
  async fetch({ commit }) {
    await this.$axios
              .get(Course.endpoint())
              .then(res => commit('INIT', res.data))
              .catch(err => this.$notifications('error'));
  },
  create({ commit }, data) {
    this.$axios
        .post(Course.endpoint(), data)
        .then(res => commit('CREATE', res.data))
        .catch(err => this.$notifications('error'));
  },
  update({ commit }, data) {
    this.$axios
        .patch(Course.endpoint(data.id), data)
        .then(res => commit('UPDATE', res.data))
        .catch(err => this.$notifications('error'));
  },
  delete({ commit }, data) {
    this.$axios
        .delete(Course.endpoint(data.id))
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


