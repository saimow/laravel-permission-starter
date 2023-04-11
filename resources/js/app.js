import './bootstrap';
import 'laravel-datatables-vite';

import {createApp} from 'vue/dist/vue.esm-bundler.js';

import Component from './components/component.vue'

const app = createApp({})

app.component('tiny-component', Component)

app.mount('#app')