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
