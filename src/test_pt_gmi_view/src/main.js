import Vue from 'vue'
import App from './App.vue'
import vuetify from './plugins/vuetify';
import router from './router'

// Components
import Burger from './components/Burger'

Vue.config.productionTip = false
Vue.mixin({
    data: function() {
        return {
            base_url: 'http://127.0.0.1:8080/'
        }
    }
})

Vue.component('burger', Burger)

new Vue({
    vuetify,
    router,
    render: h => h(App)
}).$mount('#app')