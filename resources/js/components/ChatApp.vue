<template>
    <div class="chat-app">
        <conversation
                :contact="selectContact"
                :messages="messages"></conversation>

        <contactsList
                :contacts="contacts"></contactsList>
    </div>
</template>

<script>
    import axios from 'axios';
    import Conversation from './Conversation';
    import ContactsList from './ContactsList';

    export default {
        props: {
            user: {
                type: Object,
                required: true
            }
        },
        data() {
            return {
                selectedContact: null,
                messages: [],
                contacts: []
            }
        },
        mounted() {
            console.log(this.user);
            
            axios.get('/chat-contacts')
                .then( (response) => {
                    this.contacts = response.data;
                    console.log(response.data);
                });
        },
        components: {
            Conversation,
            ContactsList
        }
    }
</script>
