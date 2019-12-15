<template>
  <Page>
    <template v-slot:header>
      <v-img
        class="image headline white--text align-end"
        :src="course.image"
        alt="course image"
        height="300"
      >
        <h1 class="image-header">{{ course.name }}</h1>
      </v-img>
    </template>

    <template v-slot:sub-header> </template>

    <template v-slot:body>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi,
        commodi cupiditate dolores, dolorum eius expedita, facilis illum impedit
        labore magnam modi necessitatibus nisi quia reiciendis sapiente soluta
        sunt unde.
      </p>
      <course-laderboard :holesIds="course.holes"></course-laderboard>
    </template>
  </Page>
</template>

<script>
import Page from "../../components/Page";
import DataList from "../../components/elements/generics/containers/DataList";
import DataCard from "../../components/elements/generics/containers/DataCard";
import Map from "../../components/Map";
import CoursesTabs from "../../components/elements/CoursesTabs";
import CourseLaderboard from '../../components/ranking/CourseLaderboard';

export default {
  name: "course",
  components: { CourseLaderboard, CoursesTabs, Map, DataCard, DataList, Page },
  data: () => ({
  }),
  computed: {
    id() {
      return this.$route.params.id;
    },
    course() {
      return this.$store.getters["courses/byId"](this.id);
    }
  },
  mounted() {
    this.$store.dispatch("courses/fetchList", [this.id]);
  }
};
</script>

<style lang="scss" scoped>
.image {
  border-radius: 5px;
  filter: opacity(0.8);
}

.image-header {
  font-weight: 900;
  text-shadow: 3px 2px #000;
  padding-bottom: 20px;
  padding-left: 20px;
  line-height: 1em;
}

.social {
  display: flex;
  max-width: 300px;

  .social-link {
    margin-right: 20px;
  }
}

.map {
  border-radius: 5px;
  background-color: rgba(211, 211, 211, 0.34);
  height: 400px;
}
</style>
