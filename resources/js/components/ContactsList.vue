<template>
    <div class="contacts-list">
        <ul>
            <li v-for="contact in contacts" :key="contact.id">
                <img :src="contact.image" :alt="contact.name">

                <div class="contact">
                    <p class="name">{{ contact.name}}</p>
                    <p class="email">{{ contact.email}}</p>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "ContactsList",
        props: {
            contacts: {
                type: Array,
                default: []
            }
        }

    }
</script>

<style scoped>

</style>