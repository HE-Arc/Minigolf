
export const actions = {
  async nuxtServerInit({ dispatch }, request) {
    await dispatch("users/fetch");
    await dispatch("minigolfs/fetch");
    // await dispatch("courses/fetch");
    // await dispatch("games/fetch");
  }
};

export const strict = false;
