<template>
    <div class="comments">
        <h2 class="h3">What do you think? (#3)</h2>
        <br>
        <div class="wrapper">
            <div class="content">
                <comment-component
                    v-for="(comment, index) in comments"
                    v-bind:key="comment.id"
                    v-bind:comment="comment"
                    v-on:delete="deleteComment(index)"
                    v-on:update="updateComment(index, ...arguments)"
                ></comment-component>
            </div>
        </div>
        <br>
        <form-component v-on:new="addComment" v-bind:product_id="id_product"></form-component>
    </div>
</template>

<script>
    export default {
        props: ['id_product'],
        data() {
            return {
                comments: []
            }
        },
        mounted() {
            axios.get('/comments/'+this.id_product)
                .then((response) => {
                    this.comments = {};
                    this.comments = response.data;
                })
        },
        methods: {
            addComment(comment) {
                this.comments.push(comment);
            },
            deleteComment(index) {
                this.comments.splice(index, 1)
            },
            updateComment(index, comment) {
                this.comments[index] = comment;
            }
        }
    }
</script>
