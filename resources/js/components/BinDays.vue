<template>
<h2 class="text-xl mb-2">Recycle Dates</h2>

<ul v-for="binday in bindays">
    <li :class="{ 'opacity-25': binday.past }">{{ binday.datef }} - <span v-if="binday.type == 'black'">Black Bin</span><span v-else class="text-lime-700">Green Bin</span></li>
</ul>
</template>

<script>
export default {
    data() {
        return {
            bindays: null
        }
    },
    mounted() {
        //console.log('Bin Days component mounted');
        axios
            .get('/api/bin-days')
            .then(response => {
                this.bindays = response.data;
            });

    }
}
</script>
