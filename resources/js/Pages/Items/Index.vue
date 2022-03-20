<template>
    <app-layout title="Items">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Todolist
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900">
                                Welcome!
                            </h3>
                            <p class="text-sn text-gray-600">
                                With this system you will be able <br> to record your activities, and not <br> forget what you have to do.
                            </p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shawdow bg-white md:rounded-md p-4">
                            <div class="flex justify-between">
                                <div>
                            <label class ="block font-bold text-sm text-gray-700 py-2">
                                   Search your activity
                            </label>
                            <input type="text" class="form-input rounded-md shadow-sm place" placeholder="Search "
                            v-model="q" search-input.sync="q">
                                </div>
                           
                        
                           <inertia-link :href ="route('items.create')"                           class="bg-blue-500 text-white font-bold py-1 px-4 rounded-md mt-5 mr-6">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            </inertia-link>
                         
                            </div>
                           <hr class="my-6">
                           <form @submit.prevent="submit">
                               <div 
                               class="drop-zone"
                               @drop="onDrop($event,1)"
                               @dragenter.prevent
                               @dragover.prevent
                               >
                                <div class = "itema py-4 px-4"
                                 v-for="item in items" 
                                 :key="item.id"
                                 draggable="true"
                                 @dragstart="startDrag($event,item)">
                               <input 
                               type="checkbox"
                               @change="updateCheck()"
                               v-model="item.completed"
                               class="m-2">
                               <span :class="[item.completed? 'completed': '','itemText']">{{ item.name }}</span>
                               <div class="actions-btn">
                                   <inertia-link :href="route('items.show', item.id)"
                                   class="bg-green-600 text-white font-bold py-1 px-4 mx-2 rounded-md text-sm">
                                         View
                              </inertia-link>
                              <inertia-link :href="route('items.edit', item.id)"
                              class="bg-yellow-500 text-white font-bold py-1 px-4 mx-2 rounded-md text-sm">
                                         Edit
                              </inertia-link>
                           
                                   
                               </div>
                               
                            <div>
                                <hr class="my-1">
                            </div>
                             </div>
                           </div>
                           
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
   

    export default defineComponent({
        setup(){
            const items= items
            const startDrag =(event, item)=>{
                console.log(item)
                event.dataTransfer.dropEffect = 'move'
                event.dataTransfer.effectAllowed = 'move'
                event.dataTransfer.setData('itemID',item.id)
            }
            const onDrop= (event,list)=>{
                const itemID = event.dataTransfer.getData('itemID')
                const item = items.value.find((item)=>item.id== itemID)
                item.list = list
            }
            return{
                onDrop,
                startDrag,

            }
        },
        components: {
            AppLayout,

        },
        props:{
            items:Array,
        },
        methods:{
            updateCheck(){
                this.$inertia.put(this.route('items.update',this.item.id), this.form)
            }

        },
        data(){
            return{
                q:''
            }
        },
        watch:{
            q:function(value){
                this.$inertia.replace(this.route('items.index',{q: value}));
            }
        }
    })
</script>
<style scoped>
.completed{
    text-decoration: line-through;
    color: #999999;
}
.itemText{
    width: 100%;
    margin-left: 20px;
}
.itema{
    display: flexbox;
    justify-content: center;
    align-items: center;
}
.actions-btn{
    float: right;
}
</style>

