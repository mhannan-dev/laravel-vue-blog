<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Users</h3>
                        <div class="card-tools">
                            <div class="float-right">
                                <!-- Button trigger modal -->
                                <button
                                    v-show="!editmode"
                                    class="btn btn-success"
                                    @click="newModal"
                                >
                                    Add New
                                    <i class="fas fa-user-plus fa-fw"></i>
                                </button>
                                <button
                                    v-show="editmode"
                                    class="btn btn-success"
                                    @click="newModal"
                                >
                                    Update
                                    <i class="fas fa-user-plus fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr class="table-success">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Photo</th>
                                    <th>Type</th>
                                    <th>Registered At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(user, index) in users"
                                    :key="user.id"
                                >
                                    <td>{{ ++index }}</td>
                                    <td>{{ user.name }}</td>
                                    <td>{{ user.email }}</td>
                                    <td>
                                        <img
                                            src="https://dummyimage.com/30x30/000/fff"
                                            alt="dummyimage"
                                        />
                                    </td>
                                    <td>
                                        <span class="tag tag-success">{{
                                            user.type | upText
                                        }}</span>
                                    </td>
                                    <td>{{ user.created_at | myDate }}</td>
                                    <td>
                                        <a
                                            @click="editModal(user)"
                                            title="Edit"
                                            href="#"
                                            class="btn btn-primary btn-sm"
                                        >
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a
                                            @click="deleteUser(user.id)"
                                            title="Delete"
                                            href="#"
                                            class="btn btn-danger btn-sm"
                                        >
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- Modal -->
        <div
            class="modal fade"
            id="newModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5
                            class="modal-title"
                            v-show="!editmode"
                            id="addNewLabel"
                        >
                            Add New
                        </h5>
                        <h5
                            class="modal-title"
                            v-show="editmode"
                            id="addNewLabel"
                        >
                            Update User's Info
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form
                            @submit.prevent="
                                editmode ? updateUser() : createUser()
                            "
                        >
                            <div class="form-group">
                                <input
                                    v-model="form.name"
                                    type="text"
                                    name="name"
                                    placeholder="Name"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has('name')
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="name"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <input
                                    v-model="form.email"
                                    type="email"
                                    name="email"
                                    placeholder="Email Address"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has('email')
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="email"
                                ></has-error>
                            </div>

                            <div class="form-group">
                                <textarea
                                    v-model="form.bio"
                                    name="bio"
                                    id="bio"
                                    placeholder="Short bio for user (Optional)"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has('bio')
                                    }"
                                ></textarea>
                                <has-error :form="form" field="bio"></has-error>
                            </div>

                            <div class="form-group">
                                <select
                                    name="type"
                                    v-model="form.type"
                                    id="type"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has('type')
                                    }"
                                >
                                    <option value="">Select User Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">Standard User</option>
                                    <option value="author">Author</option>
                                </select>
                                <has-error
                                    :form="form"
                                    field="type"
                                ></has-error>
                            </div>

                            <div class="form-group">
                                <input
                                    v-model="form.password"
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'password'
                                        )
                                    }"
                                    placeholder="Password"
                                />
                                <has-error
                                    :form="form"
                                    field="password"
                                ></has-error>
                            </div>

                            <div class="modal-footer">
                                <button
                                    v-show="!editmode"
                                    type="submit"
                                    class="btn btn-success"
                                >
                                    Save
                                </button>
                                <button
                                    v-show="editmode"
                                    type="submit"
                                    class="btn btn-primary"
                                >
                                    Update
                                </button>
                                <button
                                    type="button"
                                    class="btn btn-danger"
                                    data-dismiss="modal"
                                >
                                    Close
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    data() {
        return {
            editmode: false,
            users: [],
            form: new Form({
                id: "",
                name: "",
                email: "",
                password: "",
                type: "",
                bio: "",
                photo: ""
            })
        };
    },

    methods: {
        updateUser() {
            this.$Progress.start();
            this.form
                .put("api/user/" + this.form.id)
                .then(() => {
                    $("#newModal").modal("hide");
                    toast.fire({
                        icon: "success",
                        title: "User updated successfully"
                    });
                    this.$Progress.finish();
                    Fire.$emit("AfterCreate");
                })
                .catch(() => {});
        },
        editModal(user) {
            this.editmode = true;
            this.form.reset();
            $("#newModal").modal("show");
            this.form.fill(user);
        },
        newModal() {
            this.editmode = false;
            this.form.reset();
            $("#newModal").modal("show");
        },
        //Delete user
        deleteUser(id) {
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
                    this.form
                        .delete("api/user/" + id)
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
        },
        //Show users
        loadUsers() {
            axios.get("/api/user").then(data => {
                //console.log(response.data);
                this.users = data
            });

            // axios.get("/api/user").then(({ data }) =>
            //   this.users = data
            // );
        },
        //Create User
        createUser() {
            this.$Progress.start();
            this.form
                .post("/api/user")
                .then(() => {
                    Fire.$emit("AfterCreate");
                    $("#newModal").modal("hide");
                    toast.fire({
                        icon: "success",
                        title: "User created successfully"
                    });
                    this.$Progress.finish();
                })
                .catch(err => {
                    console.log(err);
                });
        }
    },
    created() {
        this.loadUsers();
        Fire.$on("AfterCreate", () => {
            this.loadUsers();
        });
    }
};
</script>
