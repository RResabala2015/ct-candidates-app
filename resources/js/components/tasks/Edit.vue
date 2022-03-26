<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit task</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" v-model="task.title" id="title" placeholder="Enter title">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  name: "Edit",
  data() {
    return {
      task: {
        title: "",
        completed: false,
      },
    };
  },
  mounted() {
    this.listTask();
  },
  methods: {
    async listTask() {
      this.axios
        .get("/api/tasks/" + this.$route.params.id)
        .then(response => {
          const {title, completed} = response.data;
          this.task.title = title;
          this.task.completed = completed;
        })
        .catch(error =>{
            console.log(error);
    
        });
    },
    async update(){
        this.axios
            .put("/api/tasks/" + this.$route.params.id, this.task)
            .then(response => {
                this.$router.push("/list");
            })
            .catch();
        },
    }
};
</script>