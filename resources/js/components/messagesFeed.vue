<template>
    <div class="feed">
        <ul v-if="contact">
            <li
                    v-for="message in messages"
                    :class="`message${message.to == contact.id ? ' sent' : 'received'}`"
                    :key="message.id" @click="selectContact(index)" :class="{'selected' : index == selected}">
                        <div class="text">
                            {{ message.text }}
                        </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "messagesFeed",

        data () {
            return {
                selected: 0
            };
        },

        props: {
            contact: {
                type: Object
            },
            messages: {
                type: Array,
                required: true
            }
        },

        methods: {
            selectContact(index, contact) {
                this.selected = index;
                this.$emit('selected', contact);
            }
        }
    }
</script>

<style scoped>

</style>