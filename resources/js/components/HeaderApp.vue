<script>
export default {
    name: 'HeaderApp'
}
</script>

<template>

<ul class="nav-header">
    <router-link :to="{name: 'home'}"> HOME </router-link>
    <router-link :to="{name: 'about'}"> ABOUT </router-link>
    <router-link :to="{name: 'projects'}"> PROJECTS </router-link>
    <router-link :to="{name: 'contacts'}"> CONTATTI </router-link>
</ul>

</template>



<style lang="scss" scoped>
    .nav-header {
        text-align: center;
    }
</style>
