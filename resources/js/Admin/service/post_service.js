import {http,httpFile} from "./http_service";

export function loadPost(page) {
    return http().get('/post/?page='+page)
}

export function loadAllPost(page) {
    return http().get('/post/all')
}


export function createPost(data) {
    return httpFile().post('/post/add/',data)
}

export function deletePost(id) {
    return http().delete(`/post/delete/${id}`)
}

// export function editPost() {
//     return http().get()
//
// }