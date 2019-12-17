export const state = () => ({});

export const mutations = {};

export const actions = {
  async login({ commit, state }, data) {
    try {
      await this.$auth.loginWith("local", { data: data });

      if (this.$auth.user) {
        this.$notifications("success", `Welcome ${this.$auth.user.name}`);
      }
      if (this.$auth.user.role == "staff" || this.$auth.user.role == "admin") {
        this.dispatch("pages/setStaffPages");
      } else {
        this.dispatch("pages/setUserPages");
      }
    } catch (e) {
      this.$notifications("error");
    }
  },

  async logout({ commit, state }) {
    try {
      await this.$auth.logout();
      this.$notifications("success", `See you later !`);
      this.dispatch("pages/setGuestPages");
    } catch (e) {
      this.$notifications("error");
    }
  }
};
