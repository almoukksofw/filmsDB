<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
      <router-link to="/Home">
      <img src="@/assets/logo.png" style="width: 90px; height:90px"/>
      </router-link>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>

        <form class="d-flex">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-item">
            <li class="nav-item dropdown">
              <a
                class="btn btn-light dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                >Category</a
              >
              <ul
                class="dropdown-menu dropdown-menu-light"
                aria-labelledby="navbarDropdown"
              >
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Sport</a></li>
                <li><a class="dropdown-item" href="#">Lifestyle</a></li>
                <li><a class="dropdown-item" href="#">Lifestyle</a></li>
              </ul>
              
            </li>
          </ul>
          <input
            class="form-control me-2 nav-item"
            type="search"
            placeholder="Search"
             style="margin-right: 2392px; display: flex;"
            aria-label="Search"
          />
                <button v-on:click="registertoapi" type="button" >Register</button>

          <!-- <router-link to="/Register"> -->
          <div v-on:click="loginapi" type="button"> <i  class="fas fa-user fa-2x nav-item"></i></div>
          <!-- </router-link> -->
        </form>
        
      </div>
      
    </div>
  </nav>

  
</template>

<script>

// import axios from 'axios';


export default {

    methods: {

      registertoapi(){
        window.location.href = 'http://localhost/project_jaar2/blok6/project-film-db-blok-6-meko106/Meko_project_blok6/backend/public/registerForm';
      },
      loginapi(){
        window.location.href = 'http://localhost/project_jaar2/blok6/project-film-db-blok-6-meko106/Meko_project_blok6/backend/public/logInForm';
      }

    },


}
</script>
<style scoped>

*{
  font-family: 'Avenir';
}
.nav-item {
  margin-left: 20px;
}

.fas {
  color: black;
}

</style>