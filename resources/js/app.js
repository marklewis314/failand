import './bootstrap';
import '../css/app.css';

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
import ConfirmDelete from './components/ConfirmDelete.vue';
app.component('confirm-delete', ConfirmDelete);
import ALink from './components/ALink.vue';
app.component('a-link', ALink);
import BinDays from './components/BinDays.vue';
app.component('bin-days', BinDays);

window.app = app.mount('#app');
