<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head , Link ,useForm } from '@inertiajs/vue3';

const form = useForm({
    name: null,
    image: null,
})
function storeTopic(){
    form.post('/topics')
}
</script>

<template>
    <Head title="Topics" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Topics Index</h2>
        </template>

        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end mr-2 p-2">
                    <Link href="/topics" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded"> Back </Link>
                </div>

<div class="flex  ">


    <form class="max-w-sm mx-auto" @submit.prevent="storeTopic">
        <div class="mb-5 py-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark">Your name</label>
            <input  v-model="form.name"  type="text" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Your name" required>
        </div>



        <div class="max-w-lg mx-auto  ">
             <input @input="form.image = $event.target.files[0]" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
         </div>

<button type="submit" class="bg-blue-500 hover:bg-blue-600 rounded px-4 py2 my-6 text-white" >Create</button>

    </form>


</div>



            </div>
        </div>
    </AuthenticatedLayout>
</template>
