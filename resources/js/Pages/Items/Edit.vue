<template>
    <app-layout title="Items">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Activity Detail
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900">
                                Edit Item
                            </h3>
                            <p class="text-sn text-gray-600">
                                You can do it!
                            </p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shawdow bg-white md:rounded-md p-4">
                           <form @submit.prevent="submit">
                               <label class ="block font-medium text-sm text-gray-700 py-2">
                                   Edit your activity
                               </label>
                               <div class="grid grid-cols-2 gap-6">
                                    <input type="text"
                                class="form-input w-full rounded-md shadow-sm"
                                v-model="form.name">
                                <div class="w-4">
                                 <button class="bg-blue-500 hover:bg-blue-700 text-white
                                font-bold py-2 px-4 ">
                                Save
                                </button>
                                 </div>
                                                             
                               </div>
                               
                           </form>
                           <div class="w-4 my-5">
                                <button class="bg-red-500 hover:bg-red-700 text-white
                                font-bold py-2 px-4 ">
                                <a href="#" @click.prevent="destroy">
                                 Delete
                                </a>
                                </button>
                                </div>
                           
                           <hr class="my-6">
                             <inertia-link :href="route('items.index')" class="font-bold">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                                </svg>Back
                             </inertia-link>
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
            item: Object,
        },
        data(){
            return{
                form:{
                    name: this.item.name
                }
            }
        },
        methods:{
            submit(){
                this.$inertia.put(this.route('items.update',this.item.id), this.form)
            },
            destroy(){
                if(confirm('¿Are you sure?')){
                this.$inertia.delete(this.route('items.destroy',this.item.id), this.form)
                }
            }
        }
    })
</script>

