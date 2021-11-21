<template>
    <header class="header"><div class="container">Todo List</div></header>
    <section class="todos">
        <div class="container">
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
                    v-for="todo in todos"
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
            done: false,
            todoItemColor: null,
            todos: [
                {
                    id: 1,
                    todo: "Сделать todo приложение",
                    date: "20-11-2021",
                    done: false,
                    priorityId: 1
                },
                {
                    id: 2,
                    todo: "Натянуть верстку на bitrix",
                    date: "22-10-2021",
                    done: false,
                    priorityId: 2
                },
                {
                    id: 3,
                    todo: "Понять как работает git",
                    date: "20-10-2021",
                    done: false,
                    priorityId: 3
                },
                {
                    id: 4,
                    todo: "Лечь спать не позже 23:00",
                    date: "21-11-2021",
                    done: false,
                    priorityId: 4
                }
            ],
            priority: [
                { id: 1, priorityName: "Низкий", color: "#cbe8ff" },
                { id: 2, priorityName: "Нормальный", color: "#a9ffa9" },
                { id: 3, priorityName: "Срочный", color: "#ff9090" },
                { id: 4, priorityName: "Немедленный", color: "tomato" }
            ]
        };
    },
    methods: {
        getPriorityById(id) {
            const priority = this.priority.find((item) => item.id == id);
            this.todoItemColor = priority.color;
            return priority;
        }
    }
};
</script>

<style>
html {
    box-sizing: border-box;
}

*,
*::after,
*::before {
    box-sizing: inherit;
}

#app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    color: #2c3e50;
}

ul {
    padding: 0;
    margin: 0;
}

li {
    list-style: none;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
}

.header {
    margin-bottom: 20px;
}

.todos__item {
    display: flex;
    justify-content: space-between;
    padding: 20px 10px 15px;
    border-bottom: 1px solid #ccc;
}

.todos__item-header {
    font-weight: 600;
}

.todo__right {
    display: flex;
    justify-content: space-between;
    max-width: 300px;
    width: 100%;
}

.todo__priority {
    margin-right: 10px;
}
</style>
