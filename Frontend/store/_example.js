// import User from "../objects/models/User";
//
// export const state = () => ({
//   data: []
// });
//
// export const getters = {
//   all: state => state.data,
//   byId: state => id => state.data.find(i => i.id === id),
//   filter: state => query => {
//     let q = query.toLowerCase();
//     let name = i => i.name.toLowerCase().includes(q);
//     let email = i => i.email.toLowerCase().includes(q);
//     let city = i => i.city.toLowerCase().includes(q);
//     return state.data.filter(i => name(i) || email(i) || city(i));
//   }
// };
//
// export const mutations = {
//   INIT(state, data) {
//     data.forEach(i => state.data.push(new User(i).toPojo()));
//   },
//   CREATE(state, data) {
//     state.data.push(new User(data).toPojo());
//     this.$notifications("success", `${User.name} created`);
//   },
//   UPDATE(state, data) {
//     let object = state.data.find(i => i.id === data.id);
//     Object.getOwnPropertyNames(data).forEach(i => (object[i] = data[i]));
//     this.$notifications("success", `${User.name} updated`);
//   },
//   DELETE(state, id) {
//     state.data = state.data.filter(i => i.id !== id);
//     this.$notifications("success", `${User.name} deleted`);
//   }
// };
//
// export const actions = {
//   async fetch({ commit, getters }) {
//     if (getters.all.length) return;
//
//     await this.$axios
//       .get(User.endpoint())
//       .then(res => commit("INIT", res.data))
//       .catch(err => this.$notifications("error"));
//   },
//   create({ commit }, data) {
//     this.$axios
//       .post(User.endpoint(), data)
//       .then(res => commit("CREATE", res.data))
//       .catch(err => this.$notifications("error"));
//   },
//   update({ commit }, data) {
//     this.$axios
//       .patch(User.endpoint(data.id), data)
//       .then(res => commit("UPDATE", res.data))
//       .catch(err => this.$notifications("error"));
//   },
//   delete({ commit }, data) {
//     this.$axios
//       .delete(User.endpoint(data.id))
//       .then(res => commit("DELETE", data.id))
//       .catch(err => this.$notifications("error"));
//   },
//   deleteConfirm({ commit }, data) {
//     this.commit("dialog/DELETE", data);
//   },
//   updateConfirm({ commit }, data) {
//     this.commit("dialog/UPDATE", data);
//   }
// };
