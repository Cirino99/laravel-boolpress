/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue'); //importiamo la libreria vue
import App from './components/App.vue'; // importiamo il componente base App.vue e lo assegniamo alla variabile App

// inizializziamo l'applicazione Vue passandogli l'oggetto di inizializzazione
const app = new Vue({
    el: '#root', // id del componente nel file HTML dentro il quale opererà Vue
    render: h => h(App) // monta il componente App nell'elemento root
});