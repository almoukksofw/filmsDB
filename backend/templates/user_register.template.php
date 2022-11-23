<!DOCTYPE HTML>
<html>
<head>
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
      <router-link to="/Home">
      <img src="../../app/src/assets/logo.png" style="width: 90px; height:90px"/>
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

<meta http-equiv="content-type" content="text/html" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <div class="message"> <?= $_message ?? '' ?></div>

<form action="<?php use core\Router; echo Router::getInstance()->getWebroot().'user/register' ?>" method="POST">

<div class="wrapper">
        <div class="logo">
            <img src="../../app/src/assets/logo.png" alt="">
        </div>
        <div class="text-center mt-4 name">
            User register
        </div>
        <form class="p-3 mt-3">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="name" placeholder="Username">
            </div>

            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="email" placeholder="Email">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="pass" placeholder="Password">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="rpass" placeholder="Repeat password">
            </div>
            <div class="col-12">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
          </form>

        <div class="text-center fs-6">
            <a href="#">Forget password?</a> or <a href="#">Sign up</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"></script>


<style>
 
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

*{
  font-family: 'Avenir';
}
.nav-item {
  margin-left: 20px;
}

.fas {
  color: black;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
  background-color: rgb(97, 97, 97);
}

.wrapper {
    max-width: 350px;
    min-height: 500px;
    margin: 80px auto;
    padding: 40px 30px 30px 30px;
    background-color: #ecf0f3;
    border-radius: 15px;
}

.logo {
    width: 80px;
    margin: auto;
}

.logo img {
    width: 100%;
    height: 80px;
    object-fit: cover;
    border-radius: 50%;
    box-shadow: 0px 0px 3px #5f5f5f,
        0px 0px 0px 5px #ecf0f3,
        8px 8px 15px #a7aaa7,
        -8px -8px 15px #fff;
}

.wrapper .name {
    font-weight: 600;
    font-size: 1.4rem;
    letter-spacing: 1.3px;
    padding-left: 10px;
    color: #555;
}

.wrapper .form-field input {
    width: 100%;
    display: block;
    border: none;
    outline: none;
    background: none;
    font-size: 1.2rem;
    color: #666;
    padding: 10px 15px 10px 10px;
    /* border: 1px solid red; */
}

.wrapper .form-field {
    padding-left: 10px;
    margin-bottom: 20px;
    border-radius: 20px;
    box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
}

.wrapper .form-field .fas {
    color: #555;
}

.wrapper .btn {
    box-shadow: none;
    width: 100%;
    height: 40px;
    background-color: #03A9F4;
    color: #fff;
    border-radius: 25px;
    box-shadow: 3px 3px 3px #b1b1b1,
        -3px -3px 3px #fff;
    letter-spacing: 1.3px;
}

.wrapper .btn:hover {
    background-color: #039BE5;
}

.wrapper a {
    text-decoration: none;
    font-size: 0.8rem;
    color: #03A9F4;
}

.wrapper a:hover {
    color: #039BE5;
}

@media(max-width: 380px) {
    .wrapper {
        margin: 30px 20px;
        padding: 40px 15px 15px 15px;
    }
}
</style>