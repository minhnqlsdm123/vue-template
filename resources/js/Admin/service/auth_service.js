import {http} from "./http_service";

export function login(user) {
    return http().post('/auth/login',user)
}