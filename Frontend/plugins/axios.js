export default function({ $axios, redirect }) {
  $axios.onRequest(config => {
    if (process.env.DEV === 'true') {
      console.log('Making request to ' + config.url)
    }
    // if (this.$store.getters.isAuthenticated()) {
    //   if (this.$store.getters.isExpired()) {
    //     this.$store.dispatch('user/refresh');
    //   }
    // config.headers.common['Authorization'] = `Bearer
    // ${store.getters['user/getToken']}`; }
  })

  $axios.onError(error => {
    // const code = parseInt(error.response && error.response.status);
    // redirect("/400");
  })
}
