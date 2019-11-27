<template>
  
  <Section :title="title" :subtitle="subtitle">
    <v-row justify="space-around">
      <v-col
        class="pt-0"
        cols="12"
        md="4"
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
          "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam assumenda blanditiis dolor esse ex fuga id ipsum iure molestiae, mollitia nostrum, numquam omnis perferendis quaerat tenetur unde ut, voluptas voluptatem. "
      },
      {
        title: "Save the planet",
        icon: "mdi-tree-outline",
        content:
          "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam assumenda blanditiis dolor esse ex fuga id ipsum iure molestiae, mollitia nostrum, numquam omnis perferendis quaerat tenetur unde ut, voluptas voluptatem. "
      },
      {
        title: "Meet new people",
        icon: "mdi-share-variant",
        content:
          "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam assumenda blanditiis dolor esse ex fuga id ipsum iure molestiae, mollitia nostrum, numquam omnis perferendis quaerat tenetur unde ut, voluptas voluptatem. "
      }
    ]
  })
};
</script>

<style lang="scss" scoped></style>
