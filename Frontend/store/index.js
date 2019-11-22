
export const actions = {
  async nuxtServerInit({ dispatch }, request) {
    await dispatch("users/fetch");
  }
};

export const strict = false;
