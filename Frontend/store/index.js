
export const actions = {
  async nuxtServerInit({ dispatch }, request) {
    await dispatch("users/fetch");
    await dispatch("minigolfs/fetch");
  }
};

export const strict = false;
