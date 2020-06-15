import {http, httpFile } from "./http_service";

export function CreateCategory(data) {
    return httpFile().post('/category/add/',data)
}

export function loadCategory(page){
    return http().get('/category/?page='+page)
}
export function showAllCategory() {
    return http().get('/category/all/')
}

export function deleteCategoy(id) {
    return http().delete(`/category/delete/${id}`)
}
export function updateCategory(id,data) {
    return httpFile().post(`/category/update/${id}`,data)

}