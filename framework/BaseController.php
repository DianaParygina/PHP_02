<?php

abstract class BaseController {
    public PDO $pdo; // добавил поле
    public array $params;

    public function setPDO(PDO $pdo) { // и сеттер для него
        $this->pdo = $pdo;
        }

    public function setParams(array $params) {
        $this->params = $params;
    }

    public function getContext(): array {
        //$context = parent::getContext();
        $query = $this->pdo->query("SELECT * FROM object_types"); 
        $types = $query->fetchAll();
        $context['types'] = $types;
        return $context;
    }

    public function process_response() {
        session_set_cookie_params(60*60*10);
        session_start();

        if (!isset($_SESSION['page_history'])) {
            $_SESSION['page_history'] = [];
        }
        $currentUrl = $_SERVER['REQUEST_URI'];
        array_unshift($_SESSION['page_history'], $currentUrl);
        $_SESSION['page_history'] = array_slice($_SESSION['page_history'], 0, 10); 

        $method = $_SERVER['REQUEST_METHOD']; // вытаскиваем метод
        $context = $this->getContext();
        if ($method == 'GET') { // если GET запрос то вызываем get
            $this->get($context);
        } else if ($method == 'POST') { // если POST запрос то вызываем get
            $this->post($context);
        }
    }

    public function get(array $context) {} 
    public function post(array $context) {}
}
