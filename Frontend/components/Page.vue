<template>
  <div class="wrapper">
    <div class="header">
      <h1 class="page-title display-3">{{ title }}</h1>
      <slot name="header-side"></slot>
    </div>
    <v-row>
      <v-col class="sub-header" cols="12">
        <slot name="sub-header"></slot>
      </v-col>
    </v-row>
    <slot name="body"></slot>
  </div>
</template>

<script>
export default {
  props: {
    title: { type: String }
  },
  name: "Page"
};
</script>

<style lang="scss" scoped>
@import "../assets/scss/variables";

.wrapper {
  margin-top: 30px;
  margin-bottom: 150px;
}

.header {
  display: flex;
  align-items: center;

  @media screen and (max-width: $mobile) {
    flex-direction: column;
  }
}

.sub-header {
  min-height: 50px;
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
</style>
