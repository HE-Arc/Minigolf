// import User from '../objects/User';
//
// export const state = () => ({
//   data: [],
// });
//
// export const getters = {};
//
// export const mutations = {
//   INIT(state, data) {
//     data.forEach(i => state.data.push(new User(i)));
//   },
//   CREATE(state, data) {
//     state.data.push(new User(data));
//     this.$notifications('success', `${ User.string() } created`);
//   },
//   UPDATE(state, data) {
//     let object = state.data.find(i => i.id === data.id);
//     Object.getOwnPropertyNames(data).forEach(
//       i => (object[i] = data[i]),
//     );
//     this.$notifications('success', `${ User.string() } updated`);
//   },
//   DELETE(state, id) {
//     state.data = state.data.filter(i => i.id !== id);
//     this.$notifications('success', `${ User.string() } deleted`);
//   },
// };
//
// export const actions = {
//   async fetch({ commit }) {
//     await this.$axios
//               .get(User.endpoint())
//               .then(res => commit('INIT', res.data))
//               .catch(err => this.$notifications('error'));
//   },
//   create({ commit }, data) {
//     this.$axios
//         .post(User.endpoint(), form(data))
//         .then(res => commit('CREATE', res.data))
//         .catch(err => this.$notifications('error'));
//   },
//   update({ commit }, data) {
//     console.log(`Dispatching update request on object with id ${data.id}`);
//     // this.$axios
//     //     .patch(User.endpoint(data.id), data)
//     //     .then(res => commit('UPDATE', res.data))
//     //     .catch(err => this.$notifications('error'));
//   },
//   delete({ commit }, data) {
//     console.log(`Dispatching delete request on object with id ${data.id}`);
//     // this.$axios
//     //     .delete(User.endpoint(id))
//     //     .then(res => commit('DELETE', id))
//     //     .catch(err => this.$notifications('error'));
//   },
//   deleteConfirm({ commit }, data) {
//     this.commit('dialog/DELETE', data);
//   },
//   updateConfirm({ commit }, data) {
//     this.commit('dialog/UPDATE', data);
//   },
// };
//
//
