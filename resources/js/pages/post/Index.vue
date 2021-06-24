<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <router-link
            to="/post-create"
            class="float-right btn btn-primary mb-2"
            >New Prod</router-link
          >

          <table class="table">
            <thead>
              <tr>
                <th scope="col">SL.</th>
                <th scope="col">Heading</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(post, index) in posts" :key="post.id">
                <th scope="row">{{ ++index }}</th>
                <td>{{ post.title }}</td>
                <td>{{ post.description }}</td>
                <td>
                  <router-link
                    :to="{ name: 'post-edit', params: { id: post.id } }"
                    class="btn btn-success btn-sm">Edit
                  </router-link>


                  <button class="btn btn-danger btn-sm" @click="deletePost(post.id)">Delete</button>

                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      posts: [],
    };
  },
  methods: {
    //Show categories
    loadPosts() {
        axios.get("/api/post/list").then((response) => {
        this.posts = response.data;
      });
    },
    deletePost(id) {
        // axios.post(`/api/post/delete/${id}`)
        //     .then(response => {
        //         let i = this.posts.map(item => item.id).indexOf(id); // find index of your object
        //         this.posts.splice(i, 1)
        //     });
         Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then(result => {
            if (result.isConfirmed) {
                    axios.post(`/api/post/delete/${id}`)
                    .then(() => {
                        Swal.fire(
                            "Deleted!",
                            "Your file has been deleted.",
                            "success"
                        );
                        Fire.$emit("AfterCreate");
                    })

                    .catch(() => {
                        Swal(
                            "Failed",
                            "There was something wrong",
                            "warning"
                        );
                    });
            }
        });
    }
  },
  mounted() {
    this.loadPosts();
    Fire.$on("AfterCreate", () => {
        this.loadPosts();
    });
  },
};
</script>

<style lang="css" scoped>
</style>
