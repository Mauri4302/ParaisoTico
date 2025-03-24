<?php
// Enrutador principal (index.php o similar)
session_start(); // Iniciar sesión para manejar mensajes y autenticación

require 'app/Controller/ControllerNavigation.php';
require 'app/Controller/ControllerUsuario.php';
require 'app/Controller/LoginController.php'; 
require 'app/Controller/BlogController.php';

$route = $_GET['route'] ?? '';
$action = $_GET['action'] ?? 'login';

switch ($route) {

    case 'usuario':
        $controller = new ControllerUsuario();

        switch ($action) {
            // VIEWS
            case 'index':
                $controller->index();
                break;
            case 'create':
                $controller->create();
                break;
            case 'edit':
                $controller->edit($_GET['id']);
                break;
            case 'show':
                $controller->show($_GET['id']);
                break;
            case 'changePassword':
                $controller->changePassword();
                break;

            // ACTIONS
            case 'store':
                $controller->store($_POST);
                break;
            case 'update':
                $controller->update($_POST, $_GET['id']);
                break;
             case 'updatePassword':
                if (isset($_GET['id'])) {
                    $controller->updatePassword($_POST, $_GET['id']);
                } else {
                    echo "ID de usuario no proporcionado.";
                    exit;
                }
                break;
            case 'destroy':
                $controller->destroy($_GET['id']);
                break;

            default:
                break;
        }
        break;

    case 'login':
        $controller = new LoginController();

        switch ($action) {
            case 'login':
                include 'app/Views/Login/login.php'; 
                break;
            case 'auth':
                $controller->login(); 
                break;
            case 'register':
                include 'app/Views/Login/crearCuenta.php'; 
                break;
            case 'register_action':
                $controller->register(); 
                break;
            case 'logout':
                $controller->logout(); 
                break;

            default:
                break;
        }
        break;

    case 'home':
        $controller = new ControllerNavigation();
        switch ($action) {
            case 'home':
                $controller->home();
                break;
                
            case 'cuenta':
                $controller->cuenta();
            break;
            
            default:
                break;
        }
        break;

    case 'blog':
        $controller = new ControllerNavigation();
        switch ($action) {
            
            case 'blog':
                $controller->blog();
                break;
            case 'blogDetail':
                $controller->blogDetail($_GET['id']);
                break;
            
            default:
                break;
        }
        break;

    default:
        $controller = new ControllerNavigation();
        $controller->home();
        break;
}