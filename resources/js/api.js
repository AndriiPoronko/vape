import axios from 'axios'

const API = axios.create();
import router from "./router";

API.interceptors.request.use(config => {
    if (localStorage.getItem('access_token')) {

        config.headers.authorization = `Bearer ${localStorage.getItem('access_token')}`

    }
    return config
}, error => {
})

API.interceptors.response.use(config => {
    if (localStorage.getItem('access_token')) {

        config.headers.authorization = `Bearer ${localStorage.getItem('access_token')}`

    }
    return config
}, error => {
    if (error.response.data.message === 'Token has expired') {
        return axios.post('api/auth/refresh', {}, {
            headers: {
                'authorization': `Bearer ${localStorage.getItem('access_token')}`
            }
        }).then(res => {

            localStorage.setItem('access_token', res.data.access_token)
            error.config.headers.authorization = `Bearer ${localStorage.getItem('access_token')}`
            return API.request(error.config)
        })
    }
    if (error.response.status === 401) {
        router.push({name: 'login'})
    }
})

export default API
