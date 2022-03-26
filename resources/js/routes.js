const Home = () => import("./components/Home.vue");

const New = () => import("./components/New.vue");
const Edit = () => import("./components/Edit.vue");
const Show = () => import("./components/Show.vue");
const List = () => import("./components/List.vue");

export const routes = [
    {
        name: "home",
        path: "/",
        component: Home,
    },
    {
        name: "newTask",
        path: "/new",
        component: New,
    },
    {
        name: "editTask",
        path: "/edit/:id",
        component: Edit,
    },
    {
        name: "showTask",
        path: "/show/:id",
        component: Show,
    },
    {
        name: "listTasks",
        path: "/list",
        component: List,
    }
];
