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
                            <table>
                                <tr v-for="item in items">
                                    <td class="border px-4 py-2">
                                        {{ item.name }}
                                    </td>
                                    <td class="px-4 py-2">
                                        <inertia-link :href="route('items.show', item.id)">
                                         View
                                        </inertia-link>
                                    </td>
                                    <td class="px-4 py-2">
                                        <inertia-link :href="route('items.edit', item.id)">
                                         Edit
                                        </inertia-link>
                                    </td>
                                </tr>
                            </table>
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
        }
    })
</script>
