import ax from 'axios'

// insert all your axios logic here
ax.defaults.headers = {
    'Content-Type': 'application/json',
    Authorization: localStorage.getItem('token')
}
export const axios = ax


export default {
    install(Vue) {
        Vue.prototype.$axios = ax
    }
}