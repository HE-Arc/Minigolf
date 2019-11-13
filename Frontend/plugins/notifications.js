// Accessible trough `context.app.$notifications` in async data
// And trough `this.$notifications` in stores

export default ({ app }, inject) => {
  inject(
    "notifications",
    (type, message, displayMode = "", position = "bottomCenter") => {
      let obj = {
        position: position,
        message: message,
        displayMode: displayMode,
        timeout: 2000,
      };
      // let obj = { position: position, displayMode: "once", message: message };
      switch (type) {
        case "success":
          // obj.title = "Succès";
          app.$notify.success(obj);
          break;
        case "warning":
          // obj.title = "Attention";
          app.$notify.warning(obj);
          break;
        case "error":
          obj.message = message ? message : "Une erreur est survenue";
          app.$notify.error(obj);
          console.log("Error");
          break;
        case "info":
          // obj.title = "Info";
          app.$notify.info(obj);
          break;
      }
    }
  );
};
