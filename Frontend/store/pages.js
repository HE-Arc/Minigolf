const pages = {
  minigolfs: { name: "Minigolfs", to: "/minigolfs" },
  users: { name: "Users", to: "/users" },
  scores: { name: "My scores", to: "/scores" },
  about: { name: "About", to: "/about" },
};

const guest = [pages.minigolfs, pages.about];
const user = [pages.minigolfs, pages.scores, pages.about, pages.users];
const staff = [pages.minigolfs, pages.scores, pages.about, pages.users];


export const state = () => ({
  data: guest
});

export const mutations = {
  SET_GUEST(state) {
    state.data = guest;
  },
  SET_USER(state) {
    state.data = user;
  },
  SET_STAFF(state) {
    state.data = staff;
  },
};

export const actions = {
  setGuestPages({ commit }) {
    commit("SET_GUEST");
  },
  setUserPages({ commit }) {
    commit("SET_USER");
  },
  setStaffPages({ commit }) {
    commit("SET_STAFF");
  },
};
