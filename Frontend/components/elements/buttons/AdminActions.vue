<template>
  <div>
    <div class="admin-actions">
      
      <v-tooltip color="blue" top>
        <template v-slot:activator="{ on }">
          <v-btn
            fab
            x-small
            v-on="on"
            color="white"
            elevation="1"
            @click.stop="$emit('dialog')"
          >
            <v-icon color="blue">mdi-pen</v-icon>
          </v-btn>
        </template>
        <span>Edit {{ entity.name }}</span>
      </v-tooltip>
      
      <v-tooltip color="red" top>
        <template v-slot:activator="{ on }">
          <v-btn
            fab
            x-small
            v-on="on"
            color="white"
            elevation="1"
            @click.stop="deleteEntity"
          >
            <v-icon color="red">mdi-close</v-icon>
          </v-btn>
        </template>
        <span>Delete {{ entity.name }}</span>
      </v-tooltip>
    </div>
    <slot name="dialog"></slot>
  </div>
</template>

<script>
export default {
  name: "AdminActions",
  props: {
    entity: { type: Object }
  },
  methods: {
    deleteEntity() {
      let action = `${this.entity.storeName}/deleteConfirm`;
      this.$store.dispatch(action, this.entity);
    }
  }
};
</script>

<style lang="scss" scoped>

</style>
