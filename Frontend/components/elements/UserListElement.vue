<template>
  <v-list-item inactive>
    <v-list-item-icon>
      <v-icon>mdi-account-circle</v-icon>
    </v-list-item-icon>
    <v-list-item-content>
      <v-list-item-title v-text="user.name"></v-list-item-title>
      <v-list-item-subtitle v-text="user.email"></v-list-item-subtitle>
    </v-list-item-content>
    <div>
      <admin-actions :entity="user" @dialog="dialog = true">
        <template v-slot:dialog>
          <base-dialog
            icon="mdi-pen"
            :title="user.name"
            :modal="dialog"
            @close="dialog = false"
          >
            <user-form :user="user" @close="dialog = false" />
          </base-dialog>
        </template>
      </admin-actions>
    </div>
  </v-list-item>
</template>

<script>
import AdminActions from "./buttons/AdminActions";
import BaseDialog from "./generics/BaseDialog";
import UserForm from "./forms/UserForm";
export default {
  components: { UserForm, BaseDialog, AdminActions },
  props: {
    user: { type: Object }
  },
  data: () => ({
    dialog: false
  }),

  name: "UserListElement"
};
</script>

<style lang="scss" scoped></style>
