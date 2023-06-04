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
    const response = await fetch(`https://jsonplaceholder.typicode.com/posts/${postId}`);
    let postItem = null;
    if (response.ok) {
        postItem = await response.json();
        renderPostItem(postItem);
    } else {
        console.error("Request failed: ", response.status);
    }
}

async function getPostComments() {
    const response = await fetch(`https://jsonplaceholder.typicode.com/posts/${postId}/comments`);
    if (response.ok) {
        const comments = await response.json();
        renderPostComments(comments);
    } else {
        console.error("Request failed: ", response.status);
    }
}

init();