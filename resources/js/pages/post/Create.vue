<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="offset-md-1 col-md-10 offset-md-1">
          <div class="card mt-2">
            <div class="card-header">Post Form</div>
            <div class="card-body">
              <form
                @submit.prevent="createPost()"
                @keydown="postForm.onKeydown($event)"
              >
                <div class="form-group">
                  <label for="title">Post heading</label>
                  <input
                    type="text"
                    class="form-control"
                    id="title"
                    name="title"
                    v-model="postForm.title"
                    placeholder="Post title"
                    :class="{
                      'is-invalid': postForm.errors.has('title'),
                    }"
                  />
                  <div
                    v-if="postForm.errors.has('title')"
                    v-html="postForm.errors.get('title')"
                  />
                </div>

                <div class="form-group">
                  <label for="description"
                    >Description</label
                  >
                  <textarea
                    class="form-control"
                    id="description"
                    name="description"
                    v-model="postForm.description"
                    rows="3"
                    placeholder="Post description"
                    :class="{
                      'is-invalid': postForm.errors.has('description'),
                    }"
                  ></textarea>
                  <div
                    v-if="postForm.errors.has('description')"
                    v-html="postForm.errors.get('description')"
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
export default {
  data() {
    return {
      //input form name or any name but v-model will same
      postForm: new Form({
        title: "",
        description: "",
      }),
    };
  },
  methods: {
    createPost() {
      this.postForm
        .post("/api/post/add", { name: this.title, description: this.description })
        .then(() => {
          this.postForm.title = "";
          this.postForm.description = "";
          this.$toast.success({
            title: "Success",
            message: "Post created successfully!",
          });
        })
        .catch((err) => {
          this.$toast.success({
            title: "Error",
            message: "Post not created!",
          });
        });
    },
  },
};
</script>
<style>
</style>
