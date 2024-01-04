<template>
    <div>
        <h3>{{ comment.user.name }}</h3>
        <label>Creado: {{ comment.created_at | formatDateCreated }}</label><br>
        <label>Modificado: {{ comment.updated_at | formatDateUpdated }}</label>
        <div v-if="editMode">
            <textarea name="comment" v-model="comment.comment" placeholder="Type here" class="form-control" rows="3">

            </textarea>
            <br>
            <button v-on:click="onClickUpdate" class="btn btn-success btn-sm"> <i class="ion-chatbox-working"></i> Save comment </button>
            <button v-on:click="onClickCancel" class="btn btn-default btn-sm"> <i class="ion-chatbox-working"></i> Cancel </button>
        </div>
        <div v-else>
            <p>
                {{ comment.comment }}
            </p>

            <button v-on:click="onClickEdit" class="btn btn-primary btn-sm"> <i class="ion-chatbox-working"></i> Edit comment </button>
            <button v-on:click="onClickDelete" class="btn btn-danger btn-sm"> <i class="ion-chatbox-working"></i> Delete comment </button>
        </div>
        <div id="modalDelete" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirmar eliminación</h4>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" id="role_id" name="role_id">
                        <p>¿Esta seguro de eliminar el siguiente comentario?</p>
                        <p id="descriptionDelete"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button v-on:click="deleteComment" class="btn btn-danger">Eliminar</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        props: ['comment'],
        data() {
            return {
                editMode: false,
                deleteMode: false
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            onClickDelete() {
                this.deleteMode = true;
                $('#modalDelete').modal('show');
                /*axios.delete('/comment/delete/'+this.comment.id)
                    .then(
                        () => {
                            this.$emit('delete')
                        }
                    )*/
            },
            deleteComment() {
                $('#modalDelete').modal('hide');
                axios.delete('/comment/delete/'+this.comment.id)
                    .then(
                        () => {
                            this.$emit('delete')
                        }
                    )
            },
            onClickEdit() {
                this.editMode = true
            },
            onClickCancel() {
                this.editMode = false
            },
            onClickUpdate() {
                const params = {
                    comment: this.comment.comment
                };

                this.editMode = false;

                axios.put('/comment/update/'+this.comment.id, params)
                    .then(
                        (response) => {
                            this.$emit('update', response.data)
                        }
                    )
            }
        },
        filters: {
            formatDateCreated: function (value) {
                if (value)
                {
                    moment.locale('es');
                    return moment(String(value)).format('LLLL');
                }
            },

            formatDateUpdated: function (value) {
                if (value)
                {
                    moment.locale('es');
                    return moment(String(value)).fromNow();
                }
            }
        }
    }
</script>
