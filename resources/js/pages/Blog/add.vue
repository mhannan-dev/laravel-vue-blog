<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-2">
                        <div class="card-header">Blog Form</div>
                        <div class="card-body">
                            <form
                                @submit.prevent="createBlog()"
                                @keydown="blogForm.onKeydown($event)"
                            >
                                <div class="form-group">

                                </div>

                                <div class="form-group">
                                    <label for="meta_desc"
                                        >Meta Description</label
                                    >
                                    <textarea
                                        class="form-control"
                                        id="meta_desc"
                                        name="meta_desc"
                                        v-model="blogForm.meta_desc"
                                        rows="3"
                                        placeholder="Blog Description"
                                        :class="{
                                            'is-invalid': blogForm.errors.has(
                                                'meta_desc'
                                            )
                                        }"
                                    ></textarea>
                                    <div
                                        class="text-danger"
                                        v-if="
                                            blogForm.errors.has('description')
                                        "
                                        v-html="
                                            blogForm.errors.get('description')
                                        "
                                    />
                                </div>

                                <div class="form-group">
                                    <label for="meta_desc">Description</label>
                                    <textarea
                                        class="form-control"
                                        id="meta_desc"
                                        name="meta_desc"
                                        v-model="blogForm.meta_desc"
                                        rows="3"
                                        placeholder="Blog Description"
                                        :class="{
                                            'is-invalid': blogForm.errors.has(
                                                'meta_desc'
                                            )
                                        }"
                                    ></textarea>
                                    <div
                                        class="text-danger"
                                        v-if="
                                            blogForm.errors.has('description')
                                        "
                                        v-html="
                                            blogForm.errors.get('description')
                                        "
                                    />
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input
                                        type="file"
                                        class="form-control-file"
                                        @change="onImageChange"
                                        :class="{
                                            'is-invalid': blogForm.errors.has(
                                                'image'
                                            )
                                        }"
                                    />
                                    <div
                                        class="text-danger"
                                        v-if="blogForm.errors.has('image')"
                                        v-html="blogForm.errors.get('image')"
                                    />
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </form>
                            ==
                            <form>
                                <div class="row">
                                    <div class="col">
                                         <label for="title">Post heading</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="title"
                                        name="title"
                                        v-model="blogForm.title"
                                        placeholder="Blog title"
                                        :class="{
                                            'is-invalid': blogForm.errors.has(
                                                'title'
                                            )
                                        }"
                                    />
                                    <div
                                        class="text-danger"
                                        v-if="blogForm.errors.has('title')"
                                        v-html="blogForm.errors.get('title')"
                                    />
                                    </div>
                                    <div class="col">
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Last name"
                                        />
                                    </div>
                                </div>
                            </form>
                            ==
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { objectToFormData } from "object-to-formdata";
export default {
    data() {
        return {
            //input form name or any name but v-model will same
            blogForm: new Form({
                title: "",
                description: "",
                image: ""
            })
        };
    },
    methods: {
        createBlog() {
            this.blogForm
                .Blog("/api/Blog", {
                    transformRequest: [
                        function(data, headers) {
                            return objectToFormData(data);
                        }
                    ],
                    onUploadProgress: e => {
                        // Do whatever you want with the progress event
                        console.log(e);
                    }
                })
                .then(({ data }) => {
                    this.blogForm.reset();
                    this.$toast.success({
                        title: "Success!",
                        message: "Blog saved successfully."
                    });
                });
        },
        onImageChange(e) {
            const file = e.target.files[0];
            // Do some client side validation...
            this.blogForm.image = file;
        }
    }
};
</script>
<style></style>
