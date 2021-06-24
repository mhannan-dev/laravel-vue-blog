<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="offset-md-1 col-md-10 offset-md-1">
          <div class="card mt-2">
            <div class="card-header">Post Form</div>
            <div class="card-body">
              <form
                @submit.prevent="updatePost()"
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
                  <label for="description">Description</label>
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
                <button type="submit" class="btn btn-primary">Update Post</button>
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
      postForm: new Form({
        title: "",
        description: "",
      }),
      //post: {},
    };
  },

  methods: {

    loadPost() {
      let db_post_id = this.$route.params.id;
      axios.get(`api/post/edit/${db_post_id}`).then((response) => {
        this.postForm.title = response.data.title;
        this.postForm.description = response.data.description;
        //console.log(response);
      });
    },
    updatePost() {
        let db_post_id = this.$route.params.id;
        this.postForm.post(`/api/post/update/${db_post_id}`)
            .then(() => {
                this.$toast.success({
                    title: "Success",
                    message: "Post updated successfully!",
                  });
                this.$router.push({name: 'post-list'});
            });
    }
  },
  mounted() {
    this.loadPost();
  },
};
</script>
<style>
</style>
