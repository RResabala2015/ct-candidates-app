<template>
  <div class="row">
    <div class="col-lg-12 mb-4">
      <router-link :to="{ name: 'newTask' }" class="btn btn-success"
        ><i class="fa-solid fa-list-check"></i
      ></router-link>
    </div>
    <div class="col-12">
      <div class="table-responsive">
        <table class="bg-primary text-white">
          <thead>
            <tr>
              <th>ID</th>
              <th>Task</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="task in tasks" :key="task.id">
              <td>{{ task.id }}</td>
              <td>{{ task.title }}</td>
              <td>
                <span v-if="task.completed == 1" class="badge badge-success"
                  >Active</span
                >
                <span v-else class="badge badge-danger">Inactive</span>
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
</template>

<script>
export default {
  name: "List",
  data() {
    return {
      tasks: [],
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
  },
};
</script>