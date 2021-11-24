<template>
    <header class="header"><div class="container">Todo List</div></header>
    <section class="todos">
        <div class="container">
            <div class="todos__inputs">
                <input
                    class="input todos__input"
                    type="text"
                    placeholder="Напиши задачу"
                    v-model="todo"
                />
                <select
                    class="select todos__select"
                    name="priority"
                    v-model="prioritySelected"
                >
                    <option value="1">Низкий</option>
                    <option value="2">Нормальный</option>
                    <option value="3">Срочный</option>
                    <option value="4">Немедленный</option>
                </select>
                <button class="black btn todos__button" @click="addTodo">
                    Добавить
                </button>
            </div>
            <div class="todos__filter">
                Сортировать по приоритету:
                <select
                    class="select todos__select"
                    name="filter"
                    v-model="filter"
                >
                    <option value="0">Все</option>
                    <option value="1">Низкий</option>
                    <option value="2">Нормальный</option>
                    <option value="3">Срочный</option>
                    <option value="4">Немедленный</option>
                </select>
            </div>
            <ul class="todos__list">
                <li class="todos__item todos__item-header">
                    <div class="todo__left">
                        <div class="todo__message">Задача</div>
                    </div>
                    <div class="todo__right">
                        <div class="todo__priority">Приоритет</div>
                        <div class="todo__date">Дата</div>
                    </div>
                </li>
                <li
                    class="todos__item"
                    v-for="todo in todosFilter"
                    :key="todo.id"
                    :style="{
                        backgroundColor: getPriorityById(todo.priorityId).color
                    }"
                >
                    <div class="todo__left">
                        <div class="todo__message">{{ todo.todo }}</div>
                    </div>
                    <div class="todo__right">
                        <div class="todo__priority">
                            {{ getPriorityById(todo.priorityId).priorityName }}
                        </div>
                        <div class="todo__date">{{ todo.date }}</div>
                        <button class="btn-icon" @click="deleteTodo(todo)">
                            🗑
                        </button>
                    </div>
                </li>
            </ul>
        </div>
    </section>
</template>

<script>
export default {
    name: "App",
    data() {
        return {
            date: new Date().toLocaleString(),
            todo: null,
            prioritySelected: null,
            done: false,
            todoItemColor: null,
            filter: 0,
            todos: [],
            priority: [
                { id: 1, priorityName: "Низкий", color: "#cbe8ff" },
                { id: 2, priorityName: "Нормальный", color: "#a9ffa9" },
                { id: 3, priorityName: "Срочный", color: "#ff9090" },
                { id: 4, priorityName: "Немедленный", color: "tomato" }
            ]
        };
    },
    computed: {
        todosFilter() {
            let todosFiltered = [];
            if (this.filter > 0) {
                todosFiltered = this.todos.filter(
                    (item) => item.priorityId == this.filter
                );
            } else {
                todosFiltered = this.todos;
            }

            return todosFiltered;
        }
    },
    methods: {
        addTodo() {
            const todo = {
                id: this.todos.length + 1,
                todo: this.todo,
                date: this.date,
                done: false,
                priorityId: this.prioritySelected
            };

            this.todos.push(todo);
        },

        getPriorityById(priorityId) {
            return this.priority.find((item) => item.id == priorityId);
        },

        deleteTodo(todo) {
            this.todos = this.todos.filter((item) => item !== todo);
        }
    }
};
</script>

<style src="./assets/css/style.css"></style>
