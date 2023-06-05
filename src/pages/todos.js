import Auth from "../services/auth.js";
import location from "../services/location.js";
import loading from "../services/loading.js";
import TodosRepository from "../repository/todos.js";

async function getAllTodos() {
    loading.start();
    try {
        let res = await TodosRepository.getAll();
        let todos = res.data;
        renderTodos(todos);
        setCheckboxListeners();
        setDeleteButtonListeners();
    } catch (e) {
        console.error("Erron on get attempt: ", e);
    }
    loading.stop();
}

function renderTodos(todos) {
    const todosEl = document.querySelector('.todos');
    todosEl.innerHTML = "";
    todos.forEach(todo => todosEl.innerHTML += renderTodo(todo));
}

function renderTodo(todo) {
    let completion = todo.completed
        ? `<input class="todo__status" type="checkbox" checked data-id=${todo.id}>`
        : `<input class="todo__status" type="checkbox" data-id=${todo.id}>`;

    return `
        <div class=todo>
            <div class=todo__id>
                ID: ${todo.id}
            </div>
            <div class=todo__description>
                ${todo.description}
            </div>
            ${completion}
            <input class="todo__delete" type="button" value="X" data-id=${todo.id}>
        </div>`
}

function setCheckboxListener(el, id) {
    el.addEventListener('change', async (e) => {
        loading.start();
        let desiredStatus = e.target.checked;
        e.target.checked = !desiredStatus;
        try {
            let res = await TodosRepository.updateStatus(id, desiredStatus);
            console.log("Updated status successfully");
            e.target.checked = desiredStatus;
        } catch (e) {
            console.error("Error on status change attempt: ", e);
        }
        loading.stop();
    });
}

function setDeleteButtonListener(el, id) {
    el.addEventListener('click', async () => {
        loading.start();
        try {
            let res = await TodosRepository.delete(id);
            console.log("Deleted successfully");
            await getAllTodos();
        } catch (e) {
            console.error("Error on deletion attempt: ", e);
        }
        loading.stop();
    })
}

function setDeleteButtonListeners() {
    let deleteButtons = document.querySelectorAll('.todo__delete')
    deleteButtons.forEach(deleteButton => setDeleteButtonListener(deleteButton, +deleteButton.dataset.id));
}

function setCheckboxListeners() {
    let completionCheckboxes = document.querySelectorAll('.todo__status')
    completionCheckboxes.forEach(checkbox => setCheckboxListener(checkbox, +checkbox.dataset.id));
}

function setAddButtonListener() {
    let addButton = document.querySelector('.add__button');
    addButton.addEventListener('click', async () => {
        let description = document.querySelector('.add__description').value;
        if (description.length < 1) {
            alert("Описание должно составлять минимум 1 символ");
        } else {
            loading.start();
            try {
                let res = await TodosRepository.create(description);
                console.log("Added successfully");
                document.querySelector('.add__description').value = "";
                await getAllTodos();
            } catch (e) {
                console.error("Error on addition attempt: ", e);
            }
            loading.stop();
        }
    });
}

const init = async () => {
    const { ok: isLogged } = await Auth.me()

    if (!isLogged) {
        return location.login()
    } else {
        loading.stop();
        await getAllTodos();
        setAddButtonListener();
    }
}

if (document.readyState === 'loading') {
    document.addEventListener("DOMContentLoaded", init)
} else {
    init()
}
