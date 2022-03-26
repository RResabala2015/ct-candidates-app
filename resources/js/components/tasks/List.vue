<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 mb-4">
        <input
          class="form-control me-2"
          type="search"
          placeholder="Search"
          aria-label="Search"
        />
        <router-link :to="{ name: 'newTask' }" class="btn btn-success"
          ><i class="fa-solid fa-list-check"></i
        ></router-link>
      </div>
      <div class="col-12">
        <div class="table-responsive">
          <table class="table table">
            <thead>
              <tr>
                <th>Status</th>
                <th>Task</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="task in tasks" :key="task.id">
                <td>
                   <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" v-model="task.completed">
                </td>
                <td>{{ task.title }}</td>

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