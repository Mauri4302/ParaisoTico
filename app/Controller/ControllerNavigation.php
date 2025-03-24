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
    
    public function cuenta(){
        include './app/Views/Usuario/index.php';
    }
    
    public function blog(){
        
        $blogController = new BlogController();
        $blogController->blog();
    }

    public function blogDetail($id)
    {
        // Instanciar BlogController y llamar a su método blogDetail()
        $blogController = new BlogController();
        $blogController->blogDetail($id);
    }
}