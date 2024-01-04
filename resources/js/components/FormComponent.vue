<template>
    <div>
        <form v-on:submit.prevent="newComment">
            <h1 class="h4">Add your comment</h1>
            <textarea name="comment" v-model="message" placeholder="Type here" class="form-control" rows="3"></textarea>
            <br>
            <button type="submit" class="btn btn-default btn-sm"> <i class="ion-chatbox-working"></i> Add comment </button>
        </form>
    </div>
</template>

<script>

    export default {
        props: ['product_id'],
        data() {
            return {
                message:''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            newComment() {
                const params = {
                    comment: this.message,
                    product_id: this.product_id
                };

                this.message = '';

                // Peticion AXIOS
                axios.post('/comment/create', params)
                    .then(
                        (response) => {
                            const comment = response.data;
                            this.$emit('new', comment)
                        }
                    )
            }
        }
    }
</script>
