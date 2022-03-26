<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create new task</h4>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="create">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" v-model="task.title">
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "create-task",
    data() {
        return {
            task: {
                title: "",
                completed: false,
            },
        };
    },
    methods:{
        create() {
            axios.post("/api/tasks", this.task).then(response => {
                this.$router.push({ name: "listTasks" });
            });
        },
    }
}
</script>