export const state = () => ({
  data: [],
  delete: null,
  update: null,
});

export const mutations = {
  DELETE(state, object) {
    state.delete = object;
  },
  UPDATE(state, object) {
    state.update = object;
  }
};
