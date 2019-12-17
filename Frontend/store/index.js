
export const actions = {
  async nuxtServerInit({ dispatch }, request) {
    await dispatch("minigolfs/fetch");

    if (request.$auth.loggedIn) {
      const role = request.$auth.user.role;
      await dispatch("users/fetch");

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
