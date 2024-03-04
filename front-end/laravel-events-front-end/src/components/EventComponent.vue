<template>
    <h1>Events</h1>
    <div v-if="selectedEvent != null">
        <!-- close button -->
        <button @click="selectedEvent = null">Close</button>
        <br>
        <label for="title">Title: </label>
        <span id="title">
            <b>
                {{ selectedEvent.title }}
            </b>
        </span>
        <br>
        <label for="description">Description: </label>
        <span id="description">
            <b>
                {{ selectedEvent.description }}
            </b>
        </span>
        <br>
        <label for="date">Date: </label>
        <span id="date">
            <b>
                {{ selectedEvent.date }}
            </b>
        </span>
        <br>
        <label for="location">Location: </label>
        <span id="location">
            <b>
                {{ selectedEvent.location }}
            </b>
        </span>
        <br>
        <label for="location">User: </label>
        <span id="location">
            <b>
                {{ selectedEvent.user.name }}
            </b>
            (
                <b>
                    {{ selectedEvent.user.email }}
                </b>
            )
        </span>
    </div>
    <ul v-else>
        <li v-for="event in events" :key="event.id">
            <a href="#" @click="selectedEvent = event">
                {{ event.title }}
            </a>
        </li>
    </ul>
</template>

<script>
import axios from 'axios'

export default {
    name: 'EventComponent',
    data() {
        return {
            events: [],
            selectedEvent: null
        }
    },
    mounted() {

        axios.get("http://localhost:8000/api/v1/events/")
        .then(response => {

            const data = response.data;
            this.events = data;
            console.log(data);
        })
        .catch(error => {
            console.log(error)
        })
    }
}
</script>

<style scoped>
ul {
    list-style: none;
}
</style>
