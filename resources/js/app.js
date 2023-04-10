import './bootstrap';
import '../css/app.css';

import.meta.glob([
  '../images/**',
]);

import { createApp } from 'vue';

const app = createApp({
    methods: {
        copyLink: function(e) {
            e.preventDefault();
            navigator.clipboard.writeText(e.target.href);
            alert('Link copied to clipboard: ' + e.target.href);
        }
    }
});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

window.app = app.mount('#app');
