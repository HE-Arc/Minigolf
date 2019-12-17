import Course from "../objects/models/Course";

export const state = () => ({
  data: [],
  loading: false,
});

export const getters = {
  byId: state => id => state.data.find(i => i.id == id),
  byIdList: state => ids => state.data.filter(i => ids.includes(i.id))
};

export const mutations = {
  INIT(state, data) {
    data.forEach(i => state.data.push(new Course(i).toPojo()));
  },
  CREATE(state, data, notify = true) {
    state.data.push(new Course(data).toPojo());
    this.$notifications("success", `${Course.name} created`);
  },
  ADD(state, data) {
    state.data.push(new Course(data).toPojo());
  },
  UPDATE(state, data) {
    let object = state.data.find(i => i.id === data.id);
    Object.getOwnPropertyNames(data).forEach(i => (object[i] = data[i]));
    this.$notifications("success", `${Course.name} updated`);
  },
  DELETE(state, id) {
    state.data = state.data.filter(i => i.id !== id);
    this.$notifications("success", `${Course.name} deleted`);
  },
  SET_LOADING(state, value) {
    state.loading = value;
  }
};

export const actions = {
  async fetch({ commit }) {
    await this.$axios
      .get(Course.endpoint())
      .then(res => commit("INIT", res.data))
      .catch(err => this.$notifications("error"));
  },
  fetchList({ commit, getters }, data) {
    commit("SET_LOADING", true);
    for (let id of data) {
      if (getters.byId(id) == undefined) {
        this.$axios
          .get(`${Course.endpoint()}/${id}`)
          .then(res => commit("ADD", res.data))
          .catch(err => this.$notifications("error"))
          .finally(() => {
            if (data.indexOf(id) == data.length-1) {
              setTimeout(() => {commit("SET_LOADING", false);}, 800);
            }
          })
      } else {
        commit("SET_LOADING", false);
      }
    }
  },
  create({ commit }, data) {
    console.log(data);
    this.$axios
      .post(Course.endpoint(), data)
      .then(res => commit("CREATE", res.data))
      .catch(err => this.$notifications("error"));
  },
  update({ commit }, data) {
    this.$axios
      .patch(Course.endpoint(data.id), data)
      .then(res => commit("UPDATE", res.data))
      .catch(err => this.$notifications("error"));
  },
  delete({ commit }, data) {
    this.$axios
      .delete(Course.endpoint(data.id))
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
