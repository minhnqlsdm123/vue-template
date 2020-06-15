import {http,httpFile} from "./http_service";

export function homeLoadData(page) {
    return http().get('/home/?page='+page)
}