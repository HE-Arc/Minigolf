<template>
  <Page title="About">
    <template v-slot:body>
      <p>
        <span class="display-1">Our little company</span>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad cum dolores
        ea numquam officia quas quod. Dicta eum ipsum natus nulla quam.
        Accusamus cum dicta ea esse laboriosam modi, unde!
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid autem distinctio doloribus eaque explicabo id, ipsam iure, minus nesciunt, nihil nulla officiis omnis possimus praesentium quidem recusandae tenetur voluptate voluptatibus.
      </p>
      <v-timeline class="timeline">
        <v-timeline-item
          v-for="(year, i) in years"
          :key="i"
          :color="year.color"
          small
        >
          <template v-slot:opposite>
            <span
              :class="`headline font-weight-bold ${year.color}--text`"
              v-text="year.year"
            ></span>
          </template>
          <div class="py-4">
            <h2 :class="`headline font-weight-light mb-4 ${year.color}--text`">
              {{ year.title }}
            </h2>
            <div>
              {{ year.content }}
            </div>
          </div>
        </v-timeline-item>
      </v-timeline>
    </template>
  </Page>
</template>

<script>
import Page from "../components/Page";
export default {
  components: { Page },
  name: "about",
  data: () => ({
    years: [
      {
        color: "pink",
        year: "September 2019",
        title: "The beginning",
        content: "On the beginning Nathan and Sol had an amazing idea to change the world. The wanted to create an app that will count the km yous swiped on your phone to rank you against the world.",
      },
      {
        color: "green",
        year: "October 2019",
        title: "Going the wrong way",
        content: "The issue was that actually you can't do that. After many many many hours spent looking for a solution, the good lord Android was strong on his positions. You shall not pass he said, you ain't gonna have the touch event for your app. It was the end of an era.",
      },
      {
        color: "cyan",
        year: "November 2019",
        title: "Join a friend and start again",
        content: "No money in the pocket and the fingers crying after some coding, Nathan and Sol had to find a new good idea. They didn't found one but they found David and he had an idea.",
      },
      {
        color: "amber",
        year: "December 2019",
        title: "Release",
        content: "After hours and hours of hard labour, they finally made id. The first prototype is ready to go.",
      },
    ]
  })
};
</script>

<style lang="scss" scoped>
  .timeline {
    z-index: 0;
    margin-top: 80px;
  }
</style>
