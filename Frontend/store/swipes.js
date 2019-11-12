import Category from "../objects/Swipe";

const endpoint = id => Category.endpoint(id);
const create = data => new Category(data);

export const state = () => ({
  data: []
});

export const getters = {

};

export const mutations = {
  INIT(state, data) {
    data.forEach(i => state.data.push(create(i)));
  },
};

export const actions = {
  async fetch({ commit }) {
    await this.$axios
      .get(endpoint())
      .then(res => commit("INIT", res.data))
      .catch(err => console.log(err));
      // .catch(err => this.$notifications("error"));
  },
};


