import Vue from "vue";

const staff = ['staff', 'admin'];

export default async function({ app }) {
  Vue.prototype.$user = () => app.$auth.user;
  Vue.prototype.$loggedIn = () => app.$auth.loggedIn;
  Vue.prototype.$userIsAdmin = () => app.$auth.loggedIn && app.$auth.user.role;
  Vue.prototype.$userIsStaff = () => app.$auth.loggedIn && staff.includes(app.$auth.user.role);
}

