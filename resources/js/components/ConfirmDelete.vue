<template>
<div>
    <button class="inline-block bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded" @click="show = true"><slot></slot></button>
</div>

<div v-if="show" class="absolute left-0 top-0 min-w-full min-h-full bg-black opacity-50"></div>
<div v-if="show" class="absolute left-0 top-0 min-w-full min-h-full">
    <form method="POST" :action="href" class="bg-white w-96 mx-auto mt-48 rounded-lg p-4">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" :value="csrf">
        <div class="my-4">Are you sure you want to delete {{ title }}?</div>
        <div class="flex space-x-2">
            <button type="submit" class="inline-block bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded"><slot></slot></button>
            <button class="inline-block bg-gray-500 hover:bg-gray-700 text-white px-4 py-2 rounded" @click="show = false">Cancel</button>
        </div>
    </form>
</div>
</template>

<script>
export default {
    props: ['href', 'title', 'csrf'],
    data() {
        return {
            show: false
        }
    },
    methods: {
    },
    mounted() {
        //console.log('Confirm delete component mounted');
    }
}
</script>
