import {http} from "./http_service";

export function login(user) {
    return http().post('/auth/login',user)
}

export function register(user) {
    return http().post('/auth/register',user)
}