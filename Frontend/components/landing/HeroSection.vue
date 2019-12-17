<template>
  
  <Section :title="title" :subtitle="subtitle">
    <v-row justify="space-around">
      <v-col
        class="pt-0"
        cols="12"
        md="4"
        lg="3"
        v-for="column in columns"
        :key="column.title"
      >
        <v-card class="elevation-0">
          <v-card-title class="justify-center">
            <v-icon class="blue--text text--lighten-2" x-large>
              {{ column.icon }}
            </v-icon>
          </v-card-title>

          <v-card-text>
            <div class="headline" style="text-align: center">
              {{ column.title }}
            </div>
            <div class="mt-4">
              {{ column.content }}
            </div>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
    
  </Section>
</template>

<script>
import Section from '../elements/Section';
export default {
  name: "HeroSection",
  components: { Section },
  data: () => ({
    title: "Let's play",
    subtitle: "No more restrictions, no more limits",
    columns: [
      {
        title: "Reach the world",
        icon: "mdi-earth",
        content:
          "Ready to show your golf skills to the world ? This app is used by the most famouse players around the world. Think you can do better than them ?"
      },
      {
        title: "Save the planet",
        icon: "mdi-tree-outline",
        content:
          "No more paper to write down your scores. You and your friends can now play in a Eco-friendly manner and save the planet !"
      },
      {
        title: "Meet new people",
        icon: "mdi-share-variant",
        content:
          "iGolf is the best way to meet new people that share the same interest for the game. Login and browse the players in your region."
      }
    ]
  })
};
</script>

<style lang="scss" scoped></style>
