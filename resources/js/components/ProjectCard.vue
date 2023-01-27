    <script>
export default {
  name: "ProjectCard",
  props: {
    cardTitle: String,
    cardClient: String,
    cardDescription: String,
    cardTechnologies: Object,
    cardType: Object,
    cardSlug: String
  },
};
</script>

<template>
  <div class="project-card">
    <div class="top">
      <h1>
        {{ cardTitle }}
      </h1>
      <h3>Commisionato da: {{ cardClient }}</h3>
    </div>
    <div class="bottom">
      <p>
        {{ cardDescription }}
      </p>
      <ul v-if="cardTechnologies.length > 0">
        <li v-for="(technlogy, key) in cardTechnologies" :key="key">
            {{ technlogy.name }}
        </li>
      </ul>
      <div v-if="cardType">
        <h5>
            Tipo
        </h5>
        <p>
            {{ cardType.name  }}
        </p>
    </div>
    {{ cardSlug }}
    </div>
  </div>
  <router-link :to="{name: 'details_project', params: {slug:cardSlug} }"> DETTAGLIO PROGETTO </router-link>
</template>


<style lang="scss" scoped>

</style>