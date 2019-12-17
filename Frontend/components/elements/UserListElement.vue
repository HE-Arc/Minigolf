<template>
  <div>
    <v-list-item inactive>
      <v-list-item-icon>
        <v-icon>mdi-account-circle</v-icon>
      </v-list-item-icon>
      <v-list-item-content>
        <v-list-item-title>{{ user.name }}</v-list-item-title>
        <v-list-item-subtitle>
          <v-icon small>mdi-city</v-icon>
          {{ user.city }}
        </v-list-item-subtitle>
        <v-list-item-subtitle v-if="$isStaff()">
          <v-icon small>mdi-email-outline</v-icon>
          {{ user.email }}
        </v-list-item-subtitle>
      </v-list-item-content>
      <div>
        <v-row align="center">
          <user-actions :entity="user" />
          <v-col>
            <admin-actions
              v-if="$isStaff()"
              :entity="user"
              @dialog="dialog = true"
            >
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
          </v-col>
        </v-row>
      </div>
    </v-list-item>
    <v-divider></v-divider>
  </div>
</template>

<script>
import AdminActions from "./buttons/AdminActions";
import BaseDialog from "./generics/BaseDialog";
import UserForm from "./forms/UserForm";
import UserActions from "./buttons/UserActions";
export default {
  name: "UserListElement",
  components: { UserActions, UserForm, BaseDialog, AdminActions },
  props: {
    user: { type: Object }
  },
  data: () => ({
    dialog: false
  })
};
</script>

<style lang="scss" scoped></style>
