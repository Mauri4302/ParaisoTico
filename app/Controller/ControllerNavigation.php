<?php

class ControllerNavigation
{
    public function login()
    {
        include './app/Views/Login/login.php';
    }

    public function home(){
        include './app/Views/Login/home.php';
    }
    
    public function blog(){
        include './app/Views/Login/blog.php';
    }
}