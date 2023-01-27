<script>
import HeaderApp from './components/HeaderApp.vue';
export default {
    name: 'app',
    components: {
      HeaderApp
    }
}
</script>

<template>
  <HeaderApp />
    <router-view> </router-view>
</template>

<style lang="scss">
    @use '../scss/appVue.scss';
</style>
