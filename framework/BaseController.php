<?php

abstract class BaseController {
    public PDO $pdo; // добавил поле
    public array $params;

    public function setPDO(PDO $pdo) { // и сеттер для него
        $this->pdo = $pdo;
        }

    // добавил сеттер
    public function setParams(array $params) {
        $this->params = $params;
    }

    // остальное не трогаем
    public function getContext(): array {
        return [];
    }

    abstract public function get();
}
