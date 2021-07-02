<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="offset-md-1 col-md-10  offset-md-1">
                    <div class="card mt-2">
                        <div class="card-header">
                            Tag Form
                        </div>
                        <div class="card-body">
                            <form
                                @submit.prevent="updateTag()"
                                @keydown="tagForm.onKeydown($event)"
                            >
                                <div class="form-group">
                                    <label for="title"
                                        >Tag name</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        title="title"
                                        v-model="tagForm.title"
                                        placeholder="Tag name"
                                        :class="{
                                            'is-invalid': tagForm.errors.has(
                                                'title'
                                            )
                                        }"
                                    />
                                    <div v-if="tagForm.errors.has('title')" v-html="tagForm.errors.get('title')" />
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            tagForm: new Form({
                title: "",
            })
        };
    },
    methods: {
        updateTag(){
            let id = this.$route.params.id;
            this.tagForm.put(`/api/tag/${id}`).then(() => {
                this.$toast.success({
                    title:'Success!',
                    message:'Tag updated successfully.'
                });
            })
        },
        loadTag(){
            let id = this.$route.params.id;
            axios.get(`/api/tag/${id}/edit`).then(response => {
                this.tagForm.title = response.data.title;
            });
        }
    }
};
</script>
<style></style>
