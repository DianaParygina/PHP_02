<?php

class ObjectController extends TwigBaseController {
    public $template = "__object.twig"; 

    public function getContext(): array
    {
        $context = parent::getContext();
        
        echo "<pre>";
        print_r($this->params);
        echo "</pre>";

        // создам запрос, под параметр создаем переменную my_id в запросе
$query = $this->pdo->prepare("SELECT description, id FROM space_objects WHERE id= :my_id");
// подвязываем значение в my_id 
$query->bindValue("my_id", $this->params['id']);
$query->execute(); // выполняем запрос

// тянем данные
$data = $query->fetch();
        
        $context['description'] = $data['description'];

        return $context;
    }
}