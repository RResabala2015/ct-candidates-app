<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 mb-4 mt-2">
        <div class="input-group input-group-sm">
          <input
            class="form-control form-control-navbar mb-2"
            type="search"
            v-model="search"
            placeholder="Search by task"
          />
          <div class="input-group-append">
            <button class="btn btn-navbar">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
        <router-link :to="{ name: 'newTask' }" class="btn btn-success"
          ><i class="fa-solid fa-list-check"></i> Add new task</router-link
        >
      </div>
      <div class="col-12">
        <div class="table-responsive">
          <table class="table table">
            <thead>
              <tr>
                <th>Task</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="task in tasks" :key="task.id">
                <td>
                  <input
                    type="checkbox"
                    v-model="task.completed"
                    @change="updatecheck(task.id)"
                  />
                  <span :class="[task.completed ? 'completed' : '']">{{
                    task.title
                  }}</span>
                </td>

                <td>
                  <router-link
                    :to="{ name: 'editTask', params: { id: task.id } }"
                    class="btn btn-warning btn-sm"
                    ><i class="fa-solid fa-edit"></i
                  ></router-link>
                  <button
                    class="btn btn-danger btn-sm"
                    @click="deleteTask(task.id)"
                  >
                    <i class="fa-solid fa-trash"></i>
                  </button>
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
  name: "List",
  data() {
    return {
      tasks: [],
      search: "",
    };
  },
  mounted() {
    this.getTasks();
  },
  methods: {
    async getTasks() {
      await this.axios
        .get("/api/tasks")
        .then((response) => {
          this.tasks = response.data;
        })
        .catch((error) => {
          this.tasks = [];
        });
    },
    async deleteTask(id) {
      await this.axios
        .delete("/api/tasks/" + id)
        .then((response) => {
          this.getTasks();
        })
        .catch((error) => {
          this.getTasks();
        });
    },
    async updatecheck(id) {
      await this.axios
        .put("/api/tasks/" + id, {
          completed: !this.tasks.completed,
        })
        .then((response) => {
          this.getTasks();
        })
        .catch((error) => {
          this.getTasks();
        });
    },
    getTask: function () {
      this.axios
        .get("/api/tasks/" + this.search)
        .then((response) => {
          this.tasks = response.data;
        })
        .catch((error) => {
          this.tasks = [];
        });
    },
  },
  watch: {
    search: function () {
      this.getTask();
    },
  },
};
</script>

<style>
.completed {
  text-decoration: line-through;
}
</style>