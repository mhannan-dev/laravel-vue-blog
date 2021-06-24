<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="offset-md-1 col-md-10 offset-md-1">
          <div class="card mt-2">
            <div class="card-header">Edit</div>
            <div class="card-body">
              <form
                @submit.prevent="createCategory()"
                @keydown="categoryForm.onKeydown($event)"
              >
                <div class="form-group">
                  <label for="categorytitle">Category name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    v-model="categoryForm.name"
                    placeholder="Category name"
                    :class="{
                      'is-invalid': categoryForm.errors.has('name'),
                    }"
                  />
                  <div
                    v-if="categoryForm.errors.has('name')"
                    v-html="categoryForm.errors.get('name')"
                  />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
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
      categoryForm: new Form({
        name: "",
      }),
    };
  },
  methods: {
    createCategory() {
      
      this.categoryForm
        .post("/api/category", { name: this.name })
        .then(() => {
          this.categoryForm.name = "";
          this.$toast.success({
            title: "Success",
            message: "Category created successfully",
          });
        })
        .catch((err) => {
          this.$toast.success({
            title: "Error",
            message: "Category not created successfully",
          });
        });
    },
    loadCategories() {
      let id = this.$route.params.id;
     // console.log(id);
      axios.get(`/api/category/${id}/edit`).then((response) => {
        console.log(response);
      });
    },
  },
  mounted() {
    
    this.loadCategories();
  },
};
</script>
<style></style>
