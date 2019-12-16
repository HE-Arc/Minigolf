import Vue from "vue";

const staff = ['staff', 'admin'];

export default async function({ app }) {
  Vue.prototype.$isStaff = () => app.$auth.loggedIn && staff.includes(app.$auth.user.role);
  Vue.prototype.$isAdmin = () => app.$auth.loggedIn && app.$auth.user.role == 'admin';
}

