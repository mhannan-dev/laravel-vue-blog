<template>
    <div class="row">
        <div class="col-12">
            <div class="card mt-2">
                <div class="card-header">
                    <h3 class="card-title">Tags</h3>
                    <router-link
                        to="/add-tag"
                        class="btn btn-primary btn-sm float-right"
                    >
                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Tag
                    </router-link>
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
                            <tr v-for="(tag, index) in tags" :key="tag.id">
                                <td>{{ ++index }}</td>
                                <td>{{ tag.title }}</td>
                                <td>
                                    {{ tag.slug }}
                                </td>
                                <td>
                                    <button
                                        class="btn btn-danger btn-sm"
                                        @click="deleteTag(tag.id)"
                                    >
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <router-link
                                    class="btn btn-success btn-sm"
                                    :to="{name: 'edit-tag', params: {id: tag.id}}"
                                    ><i class="fa fa-edit"></i>
                                    </router-link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tags: []
        };
    },
    methods: {
        //Show categories
        loadTags() {
            axios.get("/api/tag").then(response => {
                this.tags = response.data;
            });
        },
        deleteTag(id) {
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
                    axios
                        .delete("api/tag/" + id)
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
        this.loadTags();
        Fire.$on("AfterCreate", () => {
            this.loadTags();
        });
    }
};
</script>

<style lang="scss" scoped></style>
