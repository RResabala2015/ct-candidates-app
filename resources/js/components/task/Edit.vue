<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>EDIT TASK</h4></div>
                <div class="card-body">
                    <form @submit.prevent="update">
                         <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Title:</label>
                                    <input type="text" class="form-control" v-model="task.title">
                                </div>
                            </div>
                            <div class="col-12 mb-2">

                                <div class="form-floating">
                                <textarea class="form-control" id="floatingTextarea2" v-model="task.Description" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Description</label>
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                            <label for="title">State: </label>
                            <select v-model="task.estado">             
                                    <option value ="REALIZADO">REALIZADO</option>
                                    <option value ="NO REALIZADO">NO REALIZADO</option>
                                </select>
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
    name:"Edittask",
    data(){
        return {
            task:{
                title:"",
                Description:"",
                estado:"",
            }
        }
    },
    mounted(){
        this.ShowTask()
    },
    methods:{
        async ShowTask(){
            await this.axios.get(`/api/task/${this.$route.params.id}`).then(response=>{
                const { title, Description, estado } = response.data
                this.task.title = title,
                this.task.Description = Description,
                this.task.estado = estado
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.put(`/api/task/${this.$route.params.id}`,this.task).then(response=>{
                this.$router.push({name:"ShowTask"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>