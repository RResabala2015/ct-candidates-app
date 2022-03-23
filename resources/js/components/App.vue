<template>
    <main>
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <router-link exact-active-class="active" to="/" class="nav-link active" aria-current="page">HOME</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link exact-active-class="active" to="/tasks" class="nav-link">TASK</router-link>
                    </li>   
                </ul>
        </div>
    </div>
        
        
        </nav>

        <div>
            <router-view></router-view>
        </div>
    </main>

</template>

