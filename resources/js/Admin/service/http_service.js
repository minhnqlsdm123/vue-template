import Adminstore from "../store";

import axios from 'axios';

export function http() {
    return axios.create({
        baseURL: Adminstore.state.apiURL
    })
}

export function httpFile() {
    return axios.create({
        baseURL: Adminstore.state.apiURL,
        headers: {
            'Content-Type' : 'multipart/form-data'
        }
    });
}