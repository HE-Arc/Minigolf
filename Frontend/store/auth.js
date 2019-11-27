// /**
//  * This store is only used in the logging process. To retrieve
//  * the currently connected user use $auth.user
//  */
//
// import endpoints from "../configs/endpoints";
//
// const tokenLength = 36;
//
// export const state = () => ({
//   loading: false,
//   token: "", // password lost token
//   type: ""
// });
//
// export const getters = {};
//
// export const mutations = {
//   SET_TOKEN(state, data) {
//     state.token = data.length === tokenLength ? data : "";
//   },
//   SET_LOADING(state, data) {
//     state.loading = data;
//   },
//   SET_TYPE(state, data) {
//     switch (data) {
//       case "initialization":
//         state.type = "Initialisation";
//         break;
//       case "reinitialization":
//         state.type = "Réinitialisation";
//     }
//   },
//   RESET_DATA(state) {
//     state.token = "";
//     state.type = "";
//     state.loading = false;
//   }
// };
//
// export const actions = {
//   async login({ commit, state }, data) {
//     // let callback = data.callback;
//     // delete data.callback;
//     commit("SET_LOADING", true);
//     try {
//       await this.$auth.loginWith("local", {
//         data: { email: data.email, password: data.password }
//       });
//       let name = "";
//       if (this.$auth.loggedIn) {
//         name = this.$auth.user.name;
//       }
//       this.$notifications("success", `Welcome ${name}`);
//     } catch (e) {
//       let message = "Error!";
//       if (e.response && e.response.status === 401) {
//         message = "Email or password incorrect!";
//       } else if (e.response && e.response.status === 429) {
//         message = "You seems suspicious!!";
//       }
//       this.$notifications("error", message);
//     } finally {
//       commit("RESET_DATA");
//       // callback();
//     }
//   },
//   async lost({ commit, state }, data) {
//     let callback = data.callback;
//     delete data.callback;
//     commit("SET_LOADING", true);
//     try {
//       await this.$axios.post(endpoints.passwordReset, data);
//       let message = `Un email de réinitialisation a été
//         envoyé à l'adresse suivante: ${data.email}`;
//       this.$notifications("success", message);
//     } catch (e) {
//       this.$notifications("error", `Erreur`);
//     } finally {
//       commit("RESET_DATA");
//       callback();
//     }
//   },
//   async update({ commit, state }, data) {
//     let callback = data.callback;
//     delete data.callback;
//     commit("SET_LOADING", true);
//     data["token"] = state.token;
//     try {
//       await this.$axios.post(endpoints.passwordChange, data);
//       this.$notifications("success", `Mot de passe mis à jour.`);
//     } catch (e) {
//       this.$notifications("error");
//     } finally {
//       commit("RESET_DATA");
//       callback();
//     }
//   }
// };
