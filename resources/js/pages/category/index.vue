<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="offset-md-1 col-md-10 offset-md-1">
          <div class="card">
            <div class="card-header">
              Featured
              <router-link
                to="/category-create"
                class="float-right btn btn-primary"
              >
                Add New Category</router-link
              >
            </div>
            <div class="card-body">
              <h5 class="card-title">Categories</h5>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(category, index) in categories"
                    :key="category.id"
                  >
                    <th scope="row">{{ ++index }}</th>
                    <td>{{ category.name }}</td>
                    <td>{{ category.slug }}</td>

                    <td>
                      <router-link
                        :to="{
                          name: 'category-edit',
                          params: { slug: category.slug },
                        }"
                        >Edit</router-link
                      >
                      /

                      <a href="">Delete</a>
                    </td>
                  </tr>
                </tbody>
              </table>
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
      categories: [],
    };
  },
  methods: {
    //Show categories
    loadCategories() {
      axios.get("/api/category").then((response) => {
        this.categories = response.data;
      });
    },
  },
  mounted() {
    this.loadCategories();
  },
};
</script>

<style lang="scss" scoped></style>
