<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Create New Task</h4></div>
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Títle:</label>
                                    <input type="text" class="form-control" v-model="task.title">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-floating">
                                    <textarea class="form-control" id="floatingTextarea2" v-model="task.Description" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Description</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
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
    name:"create_new_task",
    data(){
        return {
            task:{
                title:"",
                Description:"",
                estado:"NO REALIZADO"
            }
        }
    },
    methods:{
        async create(){
            await this.axios.post('/api/task',this.task).then(response=>{
                this.$router.push({name:"ShowTask"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>