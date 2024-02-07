<template>
<h2 class="text-xl mb-2">Recycle Dates</h2>

<ul v-for="binday in bindays">
    <li :class="{ 'opacity-25': binday.past }"><span :class="{ 'font-bold': binday.day != 'Tuesday' }">{{ binday.day }}</span> {{ binday.datef }} - <span v-if="binday.type == 'black'">Black Bin</span><span v-else-if="binday.type == 'green'" class="text-lime-700">Green Bin</span><span v-else>Boxes and caddy</span></li>
</ul>
Green bin collection is now on Wednesday
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
