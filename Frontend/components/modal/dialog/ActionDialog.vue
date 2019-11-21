<template>
  <Dialog danger :modal="modal" @close="close" @confirm="confirm">
    <p v-if="modal" class="headline">
      Are you sure you want to {{ actionName }} <br>
      <span :style="nameStyle">{{ object.name }}</span> ?
    </p>
  </Dialog>
</template>

<script>
  import Dialog from './Dialog';

  export default {
    name: 'ActionDialog',
    components: { Dialog },
    props: {
      delete: { type: Boolean, default: false },
      update: { type: Boolean, default: false },
    },
    computed: {
      state() {
        return this.$store.state.dialog
      },
      object() {
        if (this.delete) return this.state.delete;
        if (this.update) return this.state.update;
      },
      commit() {
        if (this.delete) return "dialog/DELETE";
        if (this.update) return "dialog/UPDATE";
      },
      dispatch() {
        if (this.delete) return `${this.object.storeName}/delete`;
        if (this.update) return `${this.object.storeName}/update`;
      },
      actionName() {
        if (this.delete) return "delete";
        if (this.update) return "update";
      },
      modal: {
        get() {
          return this.object != null;
        },
        set(value) {
          this.$store.commit(this.commit, value);
        },
      },
      nameStyle() {
        return { 'color': this.$vuetify.theme.currentTheme.info };
      },
    },
    methods: {
      confirm() {
        this.$store.dispatch(this.dispatch, this.object);
        this.close();
      },
      close() {
        this.$store.commit(this.commit, null);
      },
    },
  };
</script>

<style lang="scss" scoped>
  
  p {
    text-align: center;
  }

</style>
