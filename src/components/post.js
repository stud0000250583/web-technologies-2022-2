const postId = new URLSearchParams(window.location.search)
    .get('postId');

function init() {
    getPostItem();
    getPostComments();
}

function renderPostItem(postItem) {
    let html =
    `<div class="post">
        <div class="post__id">Post #${postItem.id}</div>
        <div class="post__title">Title: ${postItem.title}</div>
        <div class="post__body">${postItem.body}</div>
    </div>`;
    document.querySelector('.post__contents').innerHTML = html;
}

function renderPostComments(comments) {
    let html = '';
    comments.forEach(comment => {
        html +=
        `<div class="comment">
            <div class="comment__name">#${comment.id} - ${comment.name}</div>
            <div class="comment__email">${comment.email}</div>
            <div class="comment__body">${comment.body}</div>
        </div>
        `;
    });
    document.querySelector('.post__comments').innerHTML = html;
}

async function getPostItem() {
    try {
        let res = await fetch(`https://jsonplaceholder.typicode.com/posts/${postId}`);
        let postItem = await res.json();
        renderPostItem(postItem);
    } catch (e) {
        console.error("Request failed: ", e);
    }
}

async function getPostComments() {
    try {
        let res = await fetch(`https://jsonplaceholder.typicode.com/posts/${postId}/comments`);
        let comments = await res.json();
        renderPostComments(comments);
    } catch (e) {
        console.error("Request failed: ", e);
    }
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
} else {
    init();
}