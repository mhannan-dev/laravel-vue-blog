<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="offset-md-1 col-md-10 offset-md-1">
                    <div class="card mt-2">
                        <div class="card-header">Category Form</div>
                        <div class="card-body">
                            <form
                                @submit.prevent="createCategory()"
                                @keydown="categoryForm.onKeydown($event)"
                            >
                                <div class="form-group">
                                    <label for="title">Category name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="title"
                                        name="title"
                                        v-model="categoryForm.title"
                                        placeholder="Category name"
                                        :class="{
                                            'is-invalid': categoryForm.errors.has(
                                                'title'
                                            )
                                        }"
                                    />
                                    <div class="text-danger"
                                        v-if="categoryForm.errors.has('title')"
                                        v-html="categoryForm.errors.get('title')"
                                    />
                                </div>
                                <div class="form-group">
                                  <label for="image">Image</label>
                                  <input
                                    type="file"
                                    class="form-control-file"
                                    @change="onImageChange"
                                    :class="{ 'is-invalid': categoryForm.errors.has('image') }"
                                  />
                                    <div class="text-danger"
                                        v-if="
                                            categoryForm.errors.has('image')
                                        "
                                        v-html="
                                            categoryForm.errors.get('image')
                                        "
                                    />
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
import { objectToFormData } from 'object-to-formdata';
export default {
    data() {
        return {
            //input form name or any name but v-model will same
            categoryForm: new Form({
                title: '',
                image: ''
            })
        };
    },
    methods: {
        createCategory(){
            this.categoryForm.post('/api/category', {
                transformRequest: [function (data, headers) {
                    return objectToFormData(data)
                }],
                onUploadProgress: e => {
                    // Do whatever you want with the progress event
                    console.log(e)
                }
            }).then(({ data }) => {
                this.categoryForm.reset();
                this.$toast.success({
                    title:'Success!',
                    message:'Category saved successfully.'
                });
            })
        },
        onImageChange(e) {
          const file = e.target.files[0];
          // Do some client side validation...
          this.categoryForm.image = file;
        },
      },
};
</script>
<style></style>
