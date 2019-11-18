require('./bootstrap');
require('./form');

window.Vue = require('vue');

Vue.component('file-uploader', require('./components/FileUploader.vue').default);

const app = new Vue({
    el: '#app',
});