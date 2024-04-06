<?php
require_once "TwigBaseController.php"; // обязательно импортим BaseController

class PompeiiImageController extends PompeiiController {
    public $template = "__object.twig"; // шаблон страницы
    //protected \Twig\Environment $twig; // ссылка на экземпляр twig, для рендернига
    
    public function getContext() : array
    {
        $context = parent::getContext(); // вызываем родительский метод
        
        $pompeii = [
            'title' => 'Уран',
            'image' => '../public/images/pompeii.jpg',
            'description' => 'Здесь может быть описание Помпей...'
        ];

        return $context;
    }
}