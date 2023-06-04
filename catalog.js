import { Catalog } from "./src/components/catalog.js";

const renderPostItem = item =>
    `<a href="post.html?postId=${item.id}" class="post-item">
        <span class="post-item__title">${item.title}</span>
        <span class="post-item__body">${item.body}</span>
    </a>`;


const getPostItems = async ({ limit, page }) => {
    const response = await fetch(`https://jsonplaceholder.typicode.com/posts?_limit=${limit}&_page=${page}`);
    let total = 0;
    let items = [];
    if (response.ok) {
        total = response.headers.get('x-total-count');
        items = await response.json();
    } else {
        console.error("Request failed: ", response.status);
    }
    return { items, total };
}

const renderPhotoItem = item =>
    `<a href="photos/${item.id}" class="photo-item">
        <span class="photo-item__title">${item.title}</span>
        <img src=${item.url} class="photo-item__image">
    </a>`;

const getPhotoItems = async ({ limit, page }) => {
    const response = await fetch(`https://jsonplaceholder.typicode.com/photos?_limit=${limit}&_page=${page}`);
    let total = 0;
    let items = [];
    if (response.ok) {
        total = response.headers.get('x-total-count');
        items = await response.json();
    } else {
        console.error("Request failed: ", response.status);
    }
    return { items, total };
}

const init = () => {
    const catalog = document.getElementById('catalog');
    new Catalog(catalog, {
        renderItem: renderPostItem,
        getItems: getPostItems
    }).init();
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
} else {
    init();
}
