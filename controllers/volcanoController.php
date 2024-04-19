<?php
//require_once "TwigBaseController.php"; // обязательно импортим BaseController

class volcanoController extends TwigBaseController {
    public $title = "volcano"; // название страницы
    public $template = "__object.twig"; // шаблон страницы
    
    public function getContext() : array
    {
        $context = parent::getContext(); // вызываем родительский метод
        
        $volcano = [
            'title' => 'volcano',
            'image' => '../public/images/volcano.jpg',
            'description' => 'Описание вулкана...'
        ];

        return $context;
    }
}