<template>
  <data-card v-if="courses.length" class="pb-5" title="Courses" :loading="loading">
    <v-tabs v-model="currentTab">
      <v-tab v-for="course in courses" :key="course.id">
        {{course.name}}
      </v-tab>
      <admin-action-create v-if="$auth.loggedIn" class="mr-4" entity-name="course">
        <course-form/>
      </admin-action-create>
    </v-tabs>

    <v-tabs-items v-model="currentTab">
      <v-tab-item v-for="course in courses" :key="course.name">
        <v-card flat>
          <v-hover v-slot:default="{ hover }">
            <v-img
              :src="course.image"
              class="white--text align-end"
              gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
              height="200px"
            >
              <v-expand-transition>
                <div
                  v-if="hover"
                  class="d-flex transition-fast-in-fast-out darken-2 v-card--reveal display-3 white--text"
                  style="height: 100%;"
                  @click="link(course.id)"
                >
                  More...
                </div>
              </v-expand-transition>
            </v-img>
          </v-hover>

          <v-card-title class="card-title">
            <v-icon>mdi-golf</v-icon>
            {{ course.holes.length }}

            <admin-actions
              v-if="$auth.loggedIn"
              class="admin-actions"
              :entity="course"
              @dialog="dialog = true"
            >
              <template v-slot:dialog>
                <base-dialog
                  icon="mdi-pen"
                  :title="course.name"
                  :dialog="dialog"
                  @close="dialog = false"
                >
                  <minigolf-form :minigolf="course" @close="dialog = false" />
                </base-dialog>
              </template>
            </admin-actions>
          </v-card-title>
          <v-card-text>
            {{ course.description }}
          </v-card-text>
        </v-card>
      </v-tab-item>
    </v-tabs-items>
  </data-card>
  
  <data-card v-else class="pb-5" title="Courses" height="460">
    <v-card flat>
      <v-card-text>
        <p>This minigolf doesn't have any course registered.</p>
      </v-card-text>
    </v-card>
  </data-card>
</template>

<script>
import DataCard from "./generics/containers/DataCard";
import AdminActions from "./buttons/AdminActions";
import BaseDialog from "./generics/BaseDialog";
import MinigolfForm from "./forms/MinigolfForm";
import AdminActionCreate from './buttons/AdminActionCreate';
import CourseForm from './forms/CourseForm';

export default {
  components: { CourseForm, AdminActionCreate, MinigolfForm, BaseDialog, AdminActions, DataCard },
  name: "CoursesTabs",
  props: {
    minigolf: { type: Object }
  },
  data: () => ({
    currentTab: null,
    dialog: false
  }),
  methods: {
    link(id) {
      this.$router.push({ path: `/courses/${id}` });
    }
  },
  computed: {
    loading() {
      return this.$store.state.courses.loading;
    },
    courses() {
      return this.$store.getters["courses/byIdList"](this.minigolf.courses);
    }
  },

  mounted() {
    this.$store.dispatch("courses/fetchList", this.minigolf.courses);
  }
};
</script>

<style lang="scss" scoped>
.card-title {
  display: flex;
}

.admin-actions {
  margin-left: auto;
}

.title-container {
  overflow: hidden;
  text-overflow: ellipsis;
}

.v-card--reveal {
  align-items: center;
  font-size: 32px !important;
  bottom: 0;
  justify-content: center;
  opacity: 0.5;
  position: absolute;
  width: 100%;
  background-color: #ec008c !important;
  cursor: pointer;
}
</style>
