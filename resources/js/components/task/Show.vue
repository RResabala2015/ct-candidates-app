<template>
    <div class="row">
        <div class="col-12 mb-2">
            <router-link :to='{name:"CreateTask"}' class="btn btn-success"><i class="fas fa-plus-circle"></i>Nuew Task</router-link>
        </div>
        <div class="col-12">             
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>ID</th>
                                    <th>title</th>
                                    <th>Description</th>
                                    <th>State</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="task in tasks" :key="task.id">
                                    <td>{{ task.id }}</td>
                                    <td>{{ task.title }}</td>
                                    <td>{{ task.Description }}</td>
                                    <td>{{ task.estado }}</td>
                                    <td>
                                        <router-link :to='{name:"EditTask",params:{id:task.id}}' class="btn btn-info"><i class="fas fa-edit"></i></router-link>
                                        <a type="button" @click="DeleteTask(task.id)" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
    name:"tasks",
    data(){
        return {
            tasks:[]
        }
    },
    mounted(){
        this.ShowTask()
    },
    methods:{
        async ShowTask(){
            await this.axios.get('/api/task').then(response=>{
                this.tasks = response.data
            }).catch(error=>{
                console.log(error)
                this.tasks = []
            })
        },
        DeleteTask(id){
            if(confirm("¿Confirma eliminar el registro?")){
                this.axios.delete(`/api/task/${id}`).then(response=>{
                    this.ShowTask()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>