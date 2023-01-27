<script>
import axios from 'axios';
import { BASE_URL } from '../data/data';
export default {
  name: "DetailsProject",
  data(){
    return {
        project: {}
    }
  },
  methods: 
  {
    getApi(){
        axios.get(BASE_URL + "projects/" + this.$route.params.slug)
            .then(element => {
                this.project = element.data;
                console.log(this.project);
            })
    }
  },
  mounted(){
     this.getApi();
  }
};
</script>


<template>
    <div class="project-details">
    <div class="top">
        <img :src="project.cover_image" :alt="project.image_original_name">
      <h1>
        {{ project.name }}
      </h1>
      <h3>Commisionato da: {{ project.client_name }}</h3>
    </div>
    <div class="bottom">
      <p>
        {{ project.summary }}
      </p>
       <ul>
        <li v-for="(technlogy, key) in project.technologies" :key="key">
            {{ technlogy.name }}
        </li>
      </ul>
      <div v-if="project.type">
        <h5>
            Tipo
        </h5>
        <p>
            {{ project.type.name  }}
        </p>
    </div>
    </div>
  </div>
</template>


<style lang="scss" scoped>

.top {
    img {
        max-width: 300px;
    }
}
</style>