<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Edit category - {{ categoryForm.title }} </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 offset-3">
                                <form @submit.prevent="updateCategory">
                                    <div class="form-group">
                                        <label for="">Post Title</label>
                                          <input type="text" v-model="categoryForm.title" class="form-control" name="title" placeholder="Category name" :class="{ 'is-invalid': categoryForm.errors.has('title') }">

                                    </div>

                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="">Image</label>
                                                <input type="file" class="form-control-file"  @change="onImageChange" :class="{ 'is-invalid': categoryForm.errors.has('image') }">

                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Update category</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { objectToFormData } from 'object-to-formdata'

export default {
    data(){
        return {
            categoryForm: new Form({
                title: '',
                image: '',
                _method: 'put',
            }),
        }
    },
    methods: {
        loadCategory(){
            //let id = this.$route.params.id;
            axios.get(`/api/category/${this.$route.params.id}/edit`).then(response => {
                let category = response.data;
                console.log(category);
                this.categoryForm.title =  response.data.title;
                this.image =  response.data.image;
            });
        },
        updateCategory(){
            let id = this.$route.params.id;
            this.categoryForm.post(`/api/category/`+id, {
                transformRequest: [function (data, headers) {
                    return objectToFormData(data)
                }],
                onUploadProgress: e => {
                    // Do whatever you want with the progress event
                    console.log(e)
                }
            }).then(({ data }) => {
                this.image = data.image;
                this.$toast.success({
                    title:'Success!',
                    message:'Post saved successfully.'
                });
            })
        },
        onImageChange(e){
            const file = e.target.files[0]
            // Do some client side validation...
            this.categoryForm.image = file
        },
    },
    mounted(){
        this.loadCategory();
    }
}
</script>

<style>

</style>
