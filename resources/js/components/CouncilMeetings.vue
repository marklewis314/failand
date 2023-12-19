<template>
<h2 class="text-xl mb-2">Parish Council Meetings</h2>

<ul v-for="meeting in meetings">
    <li :class="{ 'opacity-25': meeting.past }">{{ meeting.datef }} 
    <span v-if="meeting.place == 'failand'">in Failand Village Hall</span>
    <span v-else-if="meeting.place == 'wraxall'">in the Cross Tree Centre behind Wraxall church</span>
    <span v-else-if="meeting.place == 'zoom'">via Zoom <span v-if="!meeting.past">(link at end of <a href="https://www.wraxallandfailand-pc.gov.uk/about-the-council/agendas-and-minutes" class="underline" target="agenda"> agenda</a>)</span></span>
    </li>
</ul>

<div class="mt-4">
    <a href="https://www.wraxallandfailand-pc.gov.uk/about-the-council/agendas-and-minutes" class="underline" target="agenda">Agendas and Minutes</a>
</div>
</template>

<script>
export default {
    data() {
        return {
            meetings: null
        }
    },
    mounted() {
        //console.log('Meetings component mounted');
        axios
            .get('/api/council-meetings')
            .then(response => {
                this.meetings = response.data;
            });

    }
}
</script>
