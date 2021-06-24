<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="offset-md-1 col-md-10 offset-md-1">
          <div class="card mt-2">
            <div class="card-header">Product Information</div>
            <div class="card-body">
              <form
                @submit.prevent="createProduct()"
                @keydown="productForm.onKeydown($event)"
              >
                <div class="form-group">
                  <label for="title">Product name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="title"
                    name="title"
                    v-model="productForm.title"
                    placeholder="Product title"
                    :class="{
                      'is-invalid': productForm.errors.has('title'),
                    }"
                  />
                  <div
                    class="text-danger"
                    v-if="productForm.errors.has('title')"
                    v-html="productForm.errors.get('title')"
                  />
                </div>

                <div class="form-group">
                  <label for="description">About product</label>
                  <textarea
                    class="form-control"
                    id="description"
                    name="description"
                    v-model="productForm.description"
                    rows="3"
                    placeholder="Product description"
                    :class="{
                      'is-invalid': productForm.errors.has('description'),
                    }"
                  ></textarea>
                  <div
                    class="text-danger"
                    v-if="productForm.errors.has('description')"
                    v-html="productForm.errors.get('description')"
                  />
                </div>
                <div class="form-group">
                  <label for="price">Price</label>
                  <input
                    type="number"
                    class="form-control"
                    v-model="productForm.price"
                    name="price"
                  />

                  <div
                    class="text-danger"
                    v-if="productForm.errors.has('price')"
                    v-html="productForm.errors.get('price')"
                  />
                </div>
                <div class="form-group">
                  <label for="description">Image</label>
                  <input
                    type="file"
                    class="form-control-file"
                    @change="onImageChange"
                    :class="{ 'is-invalid': productForm.errors.has('image') }"
                  />
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
//Image upload
import { serialize } from "object-to-formdata";
export default {
  data() {
    return {
      //input form name or any name but v-model will same
      productForm: new Form({
        title: '',
        description: '',
        price: '',
        image: '',
      }),
    };
  },
  methods: {
    createProduct(){
        this.productForm.post('/api/product', {
            transformRequest: [function (data, headers) {
                return objectToFormData(data)
            }],
            onUploadProgress: e => {
                // Do whatever you want with the progress event
                console.log(e)
            }
        }).then(({ data }) => {
            this.productForm.title = '';
            this.productForm.price = '';
            this.productForm.image = '';
            this.productForm.description = '';
            this.$toast.success({
                title:'Success!',
                message:'Product Uploaded successfully.'
            });
        })
    },
    onImageChange(e) {
      const file = e.target.files[0];
      // Do some client side validation...
      this.productForm.image = file;
    },
  },
};
</script>
<style>
</style>
