<?php
require_once('./models/ApiClient.php');

class UserController {
    private $apiClient;

    public function __construct() {
        $this->apiClient = new ApiClient("https://reqres.in");
    }

    public function getUser($route) {
        $data = $this->apiClient->get("/api/" . $route);
        require('./views/user_view.php'); // Chama a View
    }

    public function deleteUser($route) {
        $response = $this->apiClient->delete("/api/" . $route);
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
}
