<template>
  <div class="wrapper">
    <slot></slot>
  </div>
</template>

<script>
  export default {
    props: {
      name: { type: String },
    },
    name: 'Page',
  };
</script>

<style lang="scss" scoped>
  
  .wrapper {
    margin-top: 30px;
    margin-bottom: 150px;
  }
</style>
