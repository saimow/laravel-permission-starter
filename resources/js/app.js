import './bootstrap';
import 'laravel-datatables-vite';

import {createApp} from 'vue/dist/vue.esm-bundler.js';

import RolePermissions from './components/RolePermissions.vue'
import UserRoles from './components/UserRoles.vue'

const app = createApp({})

app.component('role-permissions', RolePermissions)
app.component('user-roles', UserRoles)

import "@vueform/multiselect/themes/default.css"

app.mount('#app')