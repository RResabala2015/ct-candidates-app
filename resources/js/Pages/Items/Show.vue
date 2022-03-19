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
                                Activity Detail
                            </h3>
                            <p class="text-sn text-gray-600">
                                {{ item.name }}
                            </p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shawdow bg-white md:rounded-md p-4">
                           <p>
                               The activity is: {{ item.completed }}
                            </p>
                            <hr class="my-6">
                             <inertia-link :href="routes('items.index')">
                                 Back
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
            items:Object,
        }
    })
</script>
