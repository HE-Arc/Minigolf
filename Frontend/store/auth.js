export const state = () => ({
});

export const mutations = {
};

export const actions = {
  async login({ commit, state }, data) {
    try {
      await this.$auth.loginWith("local", {data: data});

      if (this.$auth.user) {
        this.$notifications("success", `Welcome ${this.$auth.user.name}`);
      }
      this.dispatch("pages/setStaffPages")
    } catch (e) {
      this.$notifications("error");
    }
  },

  async logout({ commit, state }) {
    try {
      await this.$auth.logout();
      this.$notifications("success", `See you later !`);
      this.dispatch("pages/setGuestPages")
    } catch (e) {
      this.$notifications("error");
    }
  },
};
