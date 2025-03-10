<?php

require_once('./controllers/UserController.php');

class Router {
    public function route() {
        $route = isset($_GET['route']) ? $_GET['route'] : 'users/1';
        $method = $_SERVER['REQUEST_METHOD'];

        $controller = new UserController();

        if ($method === 'GET') {
            $controller->getUser($route);
        } elseif ($method === 'DELETE') {
            $controller->deleteUser($route);
        } else {
            echo json_encode(["error" => "Método não permitido"]);
        }
    }
}
