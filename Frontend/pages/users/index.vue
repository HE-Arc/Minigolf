<template>
  <Page title="Users">
    <template v-if="$isStaff()" v-slot:header-side>
      <admin-action-create entity-name="user" class="admin-actions">
        <user-form />
      </admin-action-create>
    </template>
    <template v-slot:sub-header>
      <v-text-field
        v-model="query"
        label="Search"
        hint="Start typing a user name, email address or city name"
        clearable
      />
    </template>
    <template v-slot:body>
      <v-row v-if="users.length" justify="start">
        <v-col cols="10" class="ml-0 pl-0">
          <v-list rounded subheader dense>
            <v-list-item-group color="primary">
              <user-list-element
                v-for="user in users"
                :key="user.id"
                :user="user"
              />
            </v-list-item-group>
          </v-list>
        </v-col>
      </v-row>
      <v-row v-else>
        <v-col cols="12" sm="6">
          <p>No results matching</p>
        </v-col>
      </v-row>
    </template>
  </Page>
</template>

<script>
import Page from "../../components/Page";
import UserListElement from "../../components/elements/UserListElement";
import AdminActionCreate from "../../components/elements/buttons/AdminActionCreate";
import UserForm from "../../components/elements/forms/UserForm";

export default {
  components: { UserForm, AdminActionCreate, UserListElement, Page },
  async fetch({ store }) {
    await store.dispatch("users/fetch");
  },
  data: () => ({
    query: null,
    createDialog: false,
    dialog: false,
    results: []
  }),
  methods: {
    create() {
      const user = {
        name: "George",
        email: "george@gmail.com",
        password: "lala"
      };
      this.$store.dispatch("users/create", user);
    }
  },
  watch: {
    query() {
      return this.users;
    }
  },
  computed: {
    users() {
      let query = this.query ? this.query : "";
      return this.$store.getters["users/filter"](query);
    }
  },
};
</script>

<style lang="scss" scoped>
@import "../../assets/scss/variables";

.header {
  display: flex;
  align-items: center;

  @media screen and (max-width: $mobile) {
    flex-direction: column;
  }

  .page-title {
    margin-right: auto;
  }

  .admin-actions {
    margin-left: auto;

    @media screen and (max-width: $mobile) {
      margin: 15px auto auto 0;
    }
  }
}
</style>
