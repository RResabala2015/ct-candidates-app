<template>
    <app-layout title="Items">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Items
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900">
                                Items List
                            </h3>
                            <p class="text-sn text-gray-600">
                                You can do it!
                            </p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shawdow bg-white md:rounded-md p-4">
                            <div class="flex justify-between">
                            <input type="text" class="form-input rounded-md shadow-sm place" placeholder="Search "
                            v-model="q" search-input.sync="q">
                            <inertia-link :href ="route('items.create')"                           class="bg-blue-500 text-white font-bold py-2 px-4 rounded-md">
                                Save
                            </inertia-link>
                            </div>
                           <hr class="my-6">
                           <form @submit.prevent="submit">
                           <div class = "item py-4 px-4" v-for="item in items" :key="item">
                               <input 
                               type="checkbox"
                               v-model="item.completed"
                               class="m-2">
                               <span :class="[item.completed? 'completed': '','itemText']">{{ item.name }}</span>
                               <div class="actions-btn">
                                   <inertia-link :href="route('items.show', item.id)">
                                         View
                              </inertia-link>
                              <inertia-link :href="route('items.edit', item.id)">
                                         Edit
                              </inertia-link>
                              <a href="#" @click.prevent="destroy">
                               Delete Activity
                                </a>
                                   
                               </div>
                               
                            <div>
                                <hr class="my-1">
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
        components: {
            AppLayout,

        },
        props:{
            items:Array,
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
        },
         methods:{
            destroy(){
                if(confirm('¿Are you sure?')){
                this.$inertia.delete(this.route('items.destroy',this.item.id), this.form)
                }
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
.item{
    display: flexbox;
    justify-content: center;
    align-items: center;
}
.actions-btn{
    float: right;
}
</style>

