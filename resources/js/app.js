import { createApp } from 'vue';
import RegisterForm from './components/RegisterForm.vue';

const app = createApp();

app.component('register-form', RegisterForm);

app.mount('#app');
