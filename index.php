<?php
// Enrutador principal (index.php o similar)
session_start(); // Iniciar sesión para manejar mensajes y autenticación

require 'app/Controller/ControllerNavigation.php';
require 'app/Controller/ControllerUsuario.php';
require 'app/Controller/LoginController.php'; // Incluir el LoginController
require 'app/Controller/BlogController.php'; // Incluir el LoginController

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

            // ACTIONS
            case 'store':
                $controller->store($_POST);
                break;
            case 'update':
                $controller->update($_POST, $_GET['id']);
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
                include 'app/Views/Login/login.php'; // Mostrar el formulario de inicio de sesión
                break;
            case 'auth':
                $controller->login(); // Procesar el inicio de sesión
                break;
            case 'register':
                include 'app/Views/Login/crearCuenta.php'; // Mostrar el formulario de registro
                break;
            case 'register_action':
                $controller->register(); // Procesar el registro
                break;
            case 'logout':
                $controller->logout(); // Cerrar sesión
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
            case 'blog':
                $controller->blog();
                break;
            
            default:
                break;
        }

        default:
        $controller = new ControllerNavigation();
        $controller->home();
        break;
}