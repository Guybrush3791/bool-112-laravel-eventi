<template>
  <!-- <event-component /> -->
  <router-view></router-view>
</template>

<script>
import EventComponent from '/src/components/EventComponent.vue'

export default {
  name: 'App',
  components: {
    EventComponent
  }
}
</script>
