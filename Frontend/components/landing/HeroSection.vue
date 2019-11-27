<template>
  <v-container>
    <v-row class="my-5" justify="center">
      <v-col col="12" class="my-3">
        <div style="text-align: center">
          <h2 class="headline">Let's play</h2>
          <span class="subheading">
            No more restrictions, no more limits
          </span>
        </div>
      </v-col>
    </v-row>
    <v-row column wrap class="my-5 px-5 mx-5" align-center>
      <v-col xs12>
        <v-container grid-list-xl>
          <v-row row wrap align-center>
            <v-col xs12 md4>
              <v-card class="elevation-0 transparent">
                <v-card-title primary-title class="layout justify-center">
                  <v-icon x-large class="blue--text text--lighten-2">
                    mdi-earth
                  </v-icon>
                </v-card-title>
                <v-card-text class="text-xs-center">
                  <div style="text-align: center" class="headline text-xs-center">Reach the world</div>
                </v-card-text>
                <v-card-text>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  Aliquam assumenda blanditiis dolor esse ex fuga id ipsum iure
                  molestiae, mollitia nostrum, numquam omnis perferendis quaerat
                  tenetur unde ut, voluptas voluptatem.
                </v-card-text>
              </v-card>
            </v-col>
            
            <v-col xs12 md4>
              <v-card class="elevation-0 transparent">
                <v-card-title primary-title class="layout justify-center">
                  <v-icon x-large class="blue--text text--lighten-2">
                    mdi-tree-outline
                  </v-icon>
                </v-card-title>
                <v-card-text class="text-xs-center">
                  <div style="text-align: center" class="headline text-xs-center">Save the planet</div>
                </v-card-text>
                <v-card-text>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  Aliquam assumenda blanditiis dolor esse ex fuga id ipsum iure
                  molestiae, mollitia nostrum, numquam omnis perferendis quaerat
                  tenetur unde ut, voluptas voluptatem.
                </v-card-text>
              </v-card>
            </v-col>
            
            <v-col xs12 md4>
              <v-card class="elevation-0 transparent">
                <v-card-title primary-title class="layout justify-center">
                  <v-icon x-large class="blue--text text--lighten-2">
                    mdi-share-variant
                  </v-icon>
                </v-card-title>
                <v-card-text class="text-xs-center">
                  <div style="text-align: center" class="headline text-xs-center">Create new connections</div>
                </v-card-text>
                <v-card-text>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  Aliquam assumenda blanditiis dolor esse ex fuga id ipsum iure
                  molestiae, mollitia nostrum, numquam omnis perferendis quaerat
                  tenetur unde ut, voluptas voluptatem.
                </v-card-text>
              </v-card>
            </v-col>

          </v-row>
        </v-container>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  name: "HeroSection"
};
</script>

<style lang="scss" scoped></style>
