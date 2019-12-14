export const state = () => ({
  user: null
});

export const mutations = {
  SET_USER(state, data) {
    state.user = data;
  },
};

export const actions = {

  async login({ commit, state }, data) {
    try {
      await this.$auth.loginWith("local", {data: data});
      commit("SET_USER", this.getters["users/byId"](this.$auth.user.id));
      this.$notifications("success", `Welcome ${state.user.name}`);
    } catch (e) {
      this.$notifications("error", e.response);
    }
  },

  async logout({ commit, state }) {
    try {
      await this.$auth.logout();
      this.$notifications("success", `See you later !`);
      commit("SET_USER", null);
    } catch (e) {
      this.$notifications("error", e.response);
    }
  },
};
