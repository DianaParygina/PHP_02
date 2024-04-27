<!-- <?php

abstract class BaseMiddleware {
    public PDO $pdo;

    public function setPDO(PDO $pdo) { 
        $this->pdo = $pdo;
        }

    public function apply(BaseController $controller, array $context) {
        $query = $this->pdo->query("SELECT * FROM users WHERE username = :username"); 
    }
} -->
