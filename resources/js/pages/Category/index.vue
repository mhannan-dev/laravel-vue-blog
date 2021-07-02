<template>
    <div class="row">
        <div class="col-12">
            <div class="card mt-2">
                <div class="card-header">
                    <h3 class="card-title">Categories</h3>
                    <a href="" class="btn btn-primary btn-sm float-right">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Category
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th style="width: 100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(category, index) in categories"
                                :key="category.id">
                                <td>{{ ++index }}</td>
                                <td>{{ category.title }}</td>
                                <td>
                                     {{ category.slug }}
                                </td>
                                <td>
                                    <a href="" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                    <a href="" class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <!-- <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item">
                            <a class="page-link" href="#">«</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            categories: []
        };
    },
    methods: {
        //Show categories
        loadCategories() {
            axios.get("/api/category").then(response => {
                this.categories = response.data;
            });
        }
    },
    mounted() {
        this.loadCategories();
    }
};
</script>

<style lang="scss" scoped></style>
