
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Global flash vue component
 */


window.events = new Vue();

window.flash = function (message) {
    window.events.$emit('flash', message);
};

Vue.component('flash', require('./components/Flash.vue'));

const app = new Vue({
    el: '#app',
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
/*
    $('.carousel').carousel({

        interval: false

    });*/

});