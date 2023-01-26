<script>
import axios from "axios";
export default {
  name: "app",
  data() {
    return {
      baseUrl: "http://127.0.0.1:8000/api/",
      projects: [],
      pagination: {
        current: 1,
        lastPage: null,
      },
    };
  },
  methods: {
    getApi(page) {
      this.pagination.current = page;
      axios
        .get(this.baseUrl + "projects", {
          params: {
            page: this.pagination.current,
          },
        })
        .then((risultato) => {
          this.projects = risultato.data.projects.data;
          this.pagination.lastPage = risultato.data.projects.last_page
          console.log(this.pagination.lastPage);
        });
    },
  },
  mounted() {
    this.getApi(1);
  },
};
</script>

<template>
  <div class="main-container">
    <div v-for="project in projects" :key="project.id" class="project-card">
      <div class="top">
        <h1>
          {{ project.name }}
        </h1>
        <h3>Commisionato da: {{ project.client_name }}</h3>
      </div>
      <div class="bottom">
        <p>
          {{ project.summary }}
        </p>
        <ul v-if="project.technologies.length > 0">
          <li v-for="(technlogy, key) in project.technologies" :key="key">
            {{ technlogy.name }}
          </li>
        </ul>
        <div v-if="project.type">
          <h5>Tipo</h5>
          <p>
            {{ project.type.name }}
          </p>
        </div>
      </div>
    </div>
    <div>
            <button
            :disabled="pagination.current == pagination.lastPage"
            @click="getApi(pagination.current + 1)" >
                &rarr;
            </button>
            <button
            :disabled="pagination.current == 1"
            @click="getApi(pagination.current - 1)" >
                &larr;
            </button>
        </div>
  </div>
</template>


<style lang="scss">
@use "../scss/appVue.scss";
</style>
