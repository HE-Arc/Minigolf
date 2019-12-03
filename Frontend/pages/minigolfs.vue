<template>
  <div>
    <h1>Minigolfs</h1>
    
    <v-row>
      <v-col cols="6" v-for="minigolf in $store.state.minigolfs.data" :key="minigolf.id">
        <minigolf-card :minigolf="minigolf"/>
      </v-col>
    </v-row>
    

  </div>
</template>

<script>
  import MinigolfCard from '../components/elements/MinigolfCard';
  export default {
    name: 'news',
    components: { MinigolfCard },
    mounted() {
      console.log(this.$store.state.minigolfs.data)
    }
  };
</script>

<style lang="scss" scoped>

</style>
