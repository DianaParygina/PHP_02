<?php
require_once "TwigBaseController.php"; // обязательно импортим BaseController

class UranusController extends TwigBaseController {
    public $title = "Уран"; // название страницы
    public $template = "__object.twig"; // шаблон страницы
    protected \Twig\Environment $twig; // ссылка на экземпляр twig, для рендернига
    
    public function getContext() : array
    {
        $context = parent::getContext(); // вызываем родительский метод
        
        $uranus = [
            'title' => 'Уран',
            'image' => '../public/images/uranus.png',
            'description' => 'Описание урана......'
        ];

        return $context;
    }
}
