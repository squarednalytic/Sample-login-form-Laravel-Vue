import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import axios from 'axios';

// Create Vue instance
const app = createApp(App);

// Set Axios default settings
axios.defaults.baseURL = 'http://localhost:8000/api'; // Ganti dengan URL API backend Laravel Anda
axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('authToken')}`;

app.config.globalProperties.$axios = axios; // Membuat axios tersedia secara global

app.use(router).mount('#app');
