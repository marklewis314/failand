<template>
    <a :href="href" class="text-lime-700 hover:underline" :target="target"><slot>{{ linkText }}</slot></a>
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
        },
        target() {
            var pathLast = window.location.pathname.split('/').slice(-1);
            return pathLast;
        }
    },
    mounted() {
        //console.log('ALink component mounted');        
    }
}
</script>
