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
    name: 'DeleteDialog',
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
        return this.state.delete;
      },
      commit() {
        return "dialog/DELETE";
      },
      dispatch() {
        return `${this.object.storeName}/delete`;
      },
      actionName() {
        return "delete";
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
