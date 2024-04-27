<!-- <?php

class LoginRequiredMiddleware extends BaseMiddleware{

    public function apply(BaseController $controller, array $context){

        $username = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : '';
        $password = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';

        // Получаем PDO соединение из контроллера
        $pdo = $controller->pdo;

        $query = $pdo->prepare('SELECT * FROM users WHERE username = :username');
        $query->execute(['username' => $username]);
        $user = $query->fetch();

        if (!$user || !password_verify($password, $user['password'])) {
            header('WWW-Authenticate: Basic realm="Space objects"');
            http_response_code(401);
            exit;
        }else {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            header('Location: /');
            exit;
        }
    }
} -->
