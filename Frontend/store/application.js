
export const state = () => ({
  drawer: false,
});

export const mutations = {
  SET_DRAWER(state, value) {
    state.drawer = value;
  },
};
