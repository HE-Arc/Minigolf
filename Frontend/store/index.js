export const actions = {
  async nuxtServerInit({ dispatch }, request) {
    await dispatch("users/fetch");
  }
};
