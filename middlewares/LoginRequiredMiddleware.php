<?php

class LoginRequiredMiddleware extends BaseMiddleware {

    public function apply(BaseController $controller, array $context) {

        $username = $_SERVER['PHP_AUTH_USER'] ?? '';
        $password = $_SERVER['PHP_AUTH_PW'] ?? '';

        // Получаем PDO соединение из контроллера
        $query = $controller->pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");


        $query->bindParam(":username", $username, PDO::PARAM_STR);
        $query->bindParam(":password", $password, PDO::PARAM_STR);

        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if (!$user) {
            header('WWW-Authenticate: Basic realm="Space objects"');
            http_response_code(401);
            exit;
        }
    }
}
