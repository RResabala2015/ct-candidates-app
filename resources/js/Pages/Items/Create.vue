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
                                Create new Item
                            </h3>
                            <p class="text-sn text-gray-600">
                                You can create some activities
                            </p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shawdow bg-white md:rounded-md p-4">
                           <form @submit.prevent="submit">
                               <label class ="block font-bold text-sm text-gray-700 py-2">
                                   Awesome Todo List
                               </label>
                               <div class="grid grid-cols-2 gap-6">
                                   <input type="text"
                                class="form-input  w-full shadow-sm" placeholder="What do you need to do today?"
                                v-model="form.name">
                                <div>
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white
                                font-bold py-2 px-4">
                                Add
                                </button>
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
        data(){
            return{
                form:{
                    name: ''
                }
            }
        },
        methods:{
            submit(){
                this.$inertia.post(this.route('items.store'), this.form)
            }
        }
    })
</script>

.addItem{
    display: flexbox;
    justify-content: center;
    align-items: center;
}