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
                           <form>
                               <label class ="block font-medium text-sm text-gray-700">
                                   Activity
                               </label>
                               <textarea
                                class="form-input w-full rounded-md shadow-sm"
                                v-model="form.name">
                                   rows="8" 
                                </textarea>
                                <button class="bg-blue-500 hover:bg-blue-700 text-white
                                font-bold py-2 px-4">
                                Edit
                                </button>
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
            item:Object,
        },
        data(){
            return{
                form:{
                    name: this.item.name,
                    completed: this.item.completed
                }
            }
        }
    })
</script>
