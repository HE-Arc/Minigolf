export const actions = {
  async nuxtServerInit({ dispatch }, request) {
    await dispatch("swipes/fetch");
  }
};
