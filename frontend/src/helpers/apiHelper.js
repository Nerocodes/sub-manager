import axios from 'axios'

export const sendRequest = (method, endpoint, data) => {
    const axiosConfig = {
        url: endpoint,
        method,
        baseURL: import.meta.env.VITE_APP_API_URL,
        data,
        responseType: 'json',
    }
    return axios(axiosConfig)
        .then(response => {
            return response;
        })
}

