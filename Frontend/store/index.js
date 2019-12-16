
export const actions = {
  async nuxtServerInit({ dispatch }, request) {

    if (request.$auth.loggedIn) {
      const role = request.$auth.user.role;

      await dispatch("scores/fetch");

      if (role == "staff" || role == "admin") {
        await dispatch("pages/setStaffPages");
      } else {
        await dispatch("pages/setUserPages");
      }
    } else {
        await dispatch("pages/setGuestPages")
    }
  }
};

export const strict = false;
