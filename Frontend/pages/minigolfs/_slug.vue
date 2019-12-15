<template>
  <Page>
    <template v-slot:header>
      <v-img
        class="image headline white--text align-end"
        :src="minigolf.image"
        alt="Venue picture"
        height="300"
      >
        <h1 class="image-header">{{ minigolf.name }}</h1>
      </v-img>
    </template>

    <template v-slot:sub-header>
      <div class="my-3 social">
        <div v-for="item in social">
          <v-tooltip :color="item.color" top>
            <template v-slot:activator="{ on }">
              <v-btn
                class="social-link"
                :href="`https://${item.url}`"
                v-on="on"
                elevation="2"
                fab
                small
              >
                <v-icon :color="item.color">{{ item.icon }}</v-icon>
              </v-btn>
            </template>
            <span>Follow {{ minigolf.name }} on {{ item.name }}</span>
          </v-tooltip>
        </div>
      </div>
    </template>

    <template v-slot:body>
      <p class="subtitle-1">
        {{ minigolf.description }}
      </p>
      <v-container fluid>
        
        
        <v-row>
          <v-col>
            <courses-tabs :minigolf="minigolf"/>

          </v-col>
          <v-col>
            <data-card title="Location" min-width="366">
              <Map class="pa-1" :locations="locations" />
            </data-card>
          </v-col>
        </v-row>
        
        
        <v-row class="my-5">
          <v-col>
            <data-card title="Contact">
              <data-list :list="attributes" />
            </data-card>
          </v-col>
          <v-col>
            <data-card title="Highscores">
              <data-list :list="attributes" />
            </data-card>
          </v-col>
          <v-col>
            <data-card title="Scores">
              <data-list :list="attributes" />
            </data-card>
          </v-col>
        </v-row>
      </v-container>
    </template>
  </Page>
</template>

<script>
import Page from "../../components/Page";
import DataList from "../../components/elements/generics/containers/DataList";
import DataCard from "../../components/elements/generics/containers/DataCard";
import Map from "../../components/Map";
import CoursesTabs from '../../components/elements/CoursesTabs';

export default {
  name: "user",
  components: { CoursesTabs, Map, DataCard, DataList, Page },
  data: () => ({
    social: [
      {
        name: "facebook",
        icon: "mdi-facebook",
        color: "blue",
        url: "facebook.com"
      },
      {
        name: "twitter",
        icon: "mdi-twitter",
        color: "#657786",
        url: "twitter.com"
      },
      {
        name: "instagram",
        icon: "mdi-instagram",
        color: "#833AB4",
        url: "instagram.com"
      }
    ]
  }),
  computed: {
    minigolf() {
      let slug = this.$route.params.slug;
      return this.$store.getters["minigolfs/bySlug"](slug);
    },
    attributes() {
      return [
        {
          name: "City",
          value: this.minigolf.city,
          icon: "mdi-city",
          second: this.minigolf.address
        },
        {
          name: "Phone",
          value: this.prettyPhone(this.minigolf.phone),
          link: this.formatPhone(this.minigolf.phone),
          icon: "mdi-phone"
        },
        {
          name: "Email",
          value: this.minigolf.email,
          link: `mailto: ${this.minigolf.email}`,
          icon: "mdi-email-outline"
        }
      ];
    },
    locations() {
      return [{ lat: this.minigolf.lat, lng: this.minigolf.long }];
    }
  },
  methods: {
    prettyPhone(value) {
      let formated = `0${value.slice(1, 3).toString()} ${value[4]}`;
      for (let i = 4; i < value.length; i++) {
        formated += `${value[i]}${i % 2 != 0 ? " " : ""}`;
      }
      return formated.trimEnd();
    },
    formatPhone(value) {
      return `tel:${this.prettyPhone(value)
        .split(" ")
        .join("-")}`;
    }
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
