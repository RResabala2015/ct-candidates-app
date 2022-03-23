const Home = ()=>import('./components/Home.vue')
const Contact =  ()=>import('./components/Contact.vue')


const Show =  ()=>import('./components/task/Show.vue')
const Create =  ()=>import('./components/task/Create.vue')
const Edit =  ()=>import('./components/task/Edit.vue')

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },

    {
        name: 'contact',
        path: '/contact',
        component: Contact
    },

    {
        name: 'ShowTask',
        path: '/tasks',
        component: Show
    },

    {
        name: 'CreateTask',
        path: '/new_task',
        component: Create
    },

    {
        name: 'EditTask',
        path: '/edit_task/:id',
        component: Edit
    }
]