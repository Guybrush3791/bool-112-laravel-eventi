<template>

    <div>
        <h1>Hello App from Home!</h1>
        <event-component />
    </div>
</template>

<script>
import EventComponent from '/src/components/EventComponent.vue'

export default {
    name: 'HomePage',
    components: {
        EventComponent
    }
}
</script>
