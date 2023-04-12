<template>
<div class="p-6 max-w-sm mx-auto bg-white rounded-xl shadow-lg flex items-center space-x-4 my-4">
    <div calss="border">
        <div class="text-xl font-medium text-black">Vue component demo</div>
        <p class="text-slate-700">id: {{ id }}</p>
        <p class="text-slate-700">axios: {{ axiosData  }}</p>
        <p class="text-slate-700">user: {{ name }}</p>
        <p class="text-slate-700">vue: {{ vueVersion  }}</p>
        <button @click="increment">increment: {{ count }}</button>
        <p><slot></slot></p>
    </div>
</div>
</template>

<script>
import { version } from 'vue';
export default {
    props: ['id'],
    data() {
        return {
            axiosData: null,
            vueVersion: version,
            count: 0,
            name: null
        }
    },
    methods: {
        increment() {
            this.count++;
        }
    },
    mounted() {
        console.log('Example component mounted');
        axios
          .get('/api/test')
          .then(response => {
                this.axiosData = response.data;
                axios
                  .get('api/user')
                  .then(response => (this.name = response.data.name))
                  .catch(error => (this.name = error.response.statusText));
            });

    }
}
</script>
