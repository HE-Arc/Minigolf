<template>
  <div v-if="isAdmin" class="admin-actions">
    <v-tooltip color="green" top>
      <template v-slot:activator="{ on }">
        <v-btn
          v-on="on"
          color="green"
          elevation="1"
          @click="createDialog = true"
          fab
          small
        >
          <v-icon color="white" large>mdi-plus</v-icon>
        </v-btn>
      </template>
      <span>Register a new {{ entityName }}</span>
    </v-tooltip>
    <base-dialog
      icon="mdi-plus"
      :title="`Create a ${entityName}`"
      :modal="createDialog"
      @close="createDialog = false"
    >
      <slot></slot>
    </base-dialog>
  </div>
</template>

<script>
  import BaseDialog from '../generics/BaseDialog';
  import MinigolfForm from '../forms/MinigolfForm';
  export default {
    name: 'AdminActionCreate',
    components: { MinigolfForm, BaseDialog },
    props: {
      entityName: { type: String },
    },
    data: () => ({
      createDialog: false
    }),
    computed: {
      isAdmin() {
        return true;
      },
    }
  };
</script>

<style lang="scss" scoped>

</style>
