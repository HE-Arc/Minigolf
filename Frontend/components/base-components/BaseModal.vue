<template>
  <v-dialog
    v-model="modal"
    :width="width"
    persistent
    @click:outside="close()"
  >
    <v-card class="pa-4">
        <v-list>
          <v-list-item>
          
<!--            <v-list-item-icon>-->
<!--              <v-icon color="pink">mdi-star</v-icon>-->
<!--            </v-list-item-icon>-->
    
            <v-list-item-content>
              <v-list-item-title>
                <span class="title">Header</span>
              </v-list-item-title>
              <v-list-item-subtitle>
                <div class="subtitle">Sub</div>
              </v-list-item-subtitle>
            </v-list-item-content>
    
            <v-list-item-avatar>
              <v-icon class="close-icon" color="pink">mdi-close</v-icon>
            </v-list-item-avatar>
          </v-list-item>
          
        </v-list>

      <v-card-text>
        <slot name="body"></slot>
      </v-card-text>
    </v-card>
  </v-dialog>
</template>

<script>
export default {
  name: "BaseModal",
  props: {
    width: { type: String, default: "600" },
    headline: { type: String },
    title: { type: String },
    modal: { type: Boolean },
    type: { type: String }
  },
  computed: {
    icon() {
      switch (this.type) {
        case "add":
          return "mdi-plus";
        case "update":
          return "mdi-cogs";
        case "edit":
          return "mdi-pencil";
        case "ergo":
          return "mdi-account";

        case "login":
          return "mdi-account-circle-outline";
        case "lost":
          return "mdi-lock-reset";
      }
    }
  },
  methods: {
    close() {
      this.$emit('close');
    },
  },
};
</script>

<style lang="scss" scoped>
@import "../../assets/scss/variables";

.close-icon {
  /*color: #a5a5a5;*/
  /*font-weight: lighter !important;*/
  position: absolute;
  top: 0;
}
</style>
