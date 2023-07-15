<template>
    <a :href="href" class="text-lime-700 hover:underline" target="_blank"><slot>{{ linkText }}</slot></a>
</template>

<script>
export default {
    props: ['href'],
    data() {
        return {
            text: null
        }
    },
    computed: {
        linkText() {
             return this.href.replace(/^https?:\/\// , '');
        }
    },
    mounted() {
        //console.log('ALink component mounted');        
    }
}
</script>
