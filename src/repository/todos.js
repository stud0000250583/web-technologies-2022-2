import api from "../services/api.js";

const TodosRepository = {
    async create(description) {
        return await api('/todo', {
            method: 'POST',
            body: JSON.stringify({ description: description })
        });
    },

    async get(id) {
        return await api('/todo/' + id, {
            method: 'GET'
        });
    },

    async getAll() {
        return await api('/todo', {
            method: 'GET'
        });
    },

    async updateStatus(id, status) {
        return await api('/todo/' + id, {
            method: 'PUT',
            body: JSON.stringify({ completed: status })
        });
    },

    async delete(id) {
        return await api('/todo/' + id, {
            method: "DELETE"
        });
    },
}

export default TodosRepository