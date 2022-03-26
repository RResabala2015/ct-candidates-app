const Home = () => import("./components/Home.vue");

const Add = () => import("./components/tasks/Add.vue");
const Edit = () => import("./components/tasks/Edit.vue");
const List = () => import("./components/tasks/List.vue");

export const routes = [
    {
        name: "home",
        path: "/",
        component: Home,
    },
    {
        name: "newTask",
        path: "/new",
        component: Add,
    },
    {
        name: "editTask",
        path: "/edit/:id",
        component: Edit,
    },
    {
        name: "listTasks",
        path: "/list",
        component: List,
    }
];
