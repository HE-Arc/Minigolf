<template>
  <v-row class="main-row" align="start" justify="center">
    <v-col cols="12" xs="12" sm="11" md="10" lg="7">
      <Breadcrumb class="breadcrumb" />
    </v-col>
    <v-col cols="12" xs="12" sm="11" md="10" lg="7">
      <div class="wrapper">
        <v-row v-if="title">
          <v-col class="header">
            <h1 class="page-title display-2">{{ title }}</h1>
            <slot name="header-side"></slot>
          </v-col>
        </v-row>
        <slot v-else name="header"></slot>
        <v-row>
          <v-col class="sub-header" cols="12">
            <slot name="sub-header"></slot>
          </v-col>
        </v-row>
        <slot name="body"></slot>
      </div>
    </v-col>
  </v-row>
</template>

<script>
import Breadcrumb from "./elements/Breadcrumb";
export default {
  name: "Page",
  components: { Breadcrumb },
  props: {
    title: { type: String }
  }
};
</script>

<style lang="scss" scoped>
@import "../assets/scss/variables";

.wrapper {
  margin-top: 30px;
  margin-bottom: 50px;
  min-height: 720px;
  @media screen and (max-width: $mobile) {
    min-height: auto;
  }
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
