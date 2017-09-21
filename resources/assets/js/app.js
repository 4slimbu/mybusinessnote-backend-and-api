
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

/*const app = new Vue({
    el: '#app'
});*/


new Vue({
    el: '#pills-foundation',
    data: {
        selected: 'marketing'
    }
});


// Add tooltips

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})


// @admin Show hide inputs Note: To be moved to admin script later and use Vue instead of jQuery

$(document).ready(function(){
    $('.show-more').click(function(){
        $('.more-inputs').toggle();
    });
});