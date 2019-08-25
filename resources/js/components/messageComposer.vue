<template>
    <div class="composer">
        <textarea
                v-model="message"
                @keydown.enter="send"
                placeholder="Message..." cols="30" rows="10"></textarea>
    </div>
</template>

<script>
    export default {
        name: "messageComposer",

        data () {
            return {
                message: ''
            }
        },

        methods: {
            send() {
                if (this.message === '') {
                    return;
                }

                this.$emit('send', this.message);
                this.message = '';
            }
        }

    }
</script>

<style scoped>

</style>