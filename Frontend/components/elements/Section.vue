<template>
  <v-container class="wrapper">
    <v-row class="my-5" justify="center">
      <v-col cols="11" md="9" class="mt-3">
        <div style="text-align: center">
          <h2 class="headline">{{ title }}</h2>
          <div>{{ subtitle }}</div>
        </div>
      </v-col>
    </v-row>
    
    <v-row justify="center">
      
      <v-col class="pt-0" :cols="cols" :md="cols - 2">
        
        <slot></slot>
        
      </v-col>
    </v-row>
    
  </v-container>
</template>

<script>
  export default {
    props: {
      title: { type: String },
      subtitle: { type: String },
      cols: { type: String, default: "11" },
    },
    name: 'Section',
  };
</script>

<style lang="scss" scoped>
.wrapper {
  margin-top: 30px;
  margin-bottom: 60px;
}
</style>
