<?php
require_once "TwigBaseController.php"; // обязательно импортим BaseController

class PompeiiController extends TwigBaseController {
    public $title = "Помпеи"; // название страницы
    public $template = "__object.twig"; // шаблон страницы
    protected \Twig\Environment $twig; // ссылка на экземпляр twig, для рендернига
    
    public function getContext() : array
    {
        $context = parent::getContext(); // вызываем родительский метод
        
        $pompeii = [
            'title' => 'Помпеи',
            'image' => '../public/images/pompeii. jpg',
            'description' => 'Описание Помпей......'
        ];

        return $context;
    }
}
