import { createApp } from 'vue'
// import Vue from 'vue'


import App from './App.vue'
import router from './router'
import store from './store'

// import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'





axios.defaults.withCredentials = true
axios.defaults.baseURL = 'http://localhost/project_jaar2/blok6/project-film-db-blok-6-meko106/Meko_project_blok6/backend/public/';

createApp(App).use(store).
use(VueAxios).
use(router).
mount('#app')
