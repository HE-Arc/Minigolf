require("dotenv").config();

export default {
  mode: "universal",
  /*
   ** Headers of the page
   */
  head: {
    title: process.env.npm_package_name || "",
    meta: [
      { charset: "utf-8" },
      { name: "viewport", content: "width=device-width, initial-scale=1" },
      {
        hid: "description",
        name: "description",
        content: process.env.npm_package_description || ""
      }
    ],
    link: [{ rel: "icon", type: "image/x-icon", href: "/favicon.ico" }]
  },
  /*
   ** Customize the progress-bar color
   */
  loading: { color: "#fff" },
  /*
   ** Global CSS
   */
  css: [],
  /*
   ** Plugins to load before mounting the App
   */
  plugins: [
    "~/plugins/axios.js",
    "~/plugins/vuetify.js",
    "~/plugins/injections.js",
    "~/plugins/vue-scrollto.js",
    "~/plugins/notifications.js",
    { src: '~/plugins/vue-shortkey.js', mode: 'client' },
  ],
  axios: {
    // proxyHeaders: false
    baseURL: process.env.API_HOST
  },
  auth: {
    strategies: {
      local: {
        endpoints: {
          login: { url: "auth/login/", method: "post", propertyName: "token" },
          user: { url: "users/profile", method: "get", propertyName: "" },
          logout: false
        }
      }
    }
  },
  /*
   ** Nuxt.js dev-modules
   */
  buildModules: [],
  /*
   ** Nuxt.js modules
   */
  modules: [
    "@nuxtjs/axios",
    "@nuxtjs/auth",
    "nuxt-izitoast",
    ['nuxt-gmaps', { key: process.env.MAPS_API }]
  ],
  /*
   ** Build configuration
   */
  build: {
    /*
     ** You can extend webpack config here
     */
    extend(config, ctx) {}
  }
};
