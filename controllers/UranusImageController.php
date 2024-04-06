<?php
require_once "TwigBaseController.php"; // обязательно импортим BaseController

class UranusImageController extends UranusController {
    public $template = "__object.twig"; // шаблон страницы
    //protected \Twig\Environment $twig; // ссылка на экземпляр twig, для рендернига
    
    public function getContext() : array
    {
        $context = parent::getContext(); // вызываем родительский метод
        
        $uranus = [
            'title' => 'Уран',
            'image' => '../public/images/uranus.png',
            'description' => 'Здесь может быть описание урана...'
        ];

        return $context;
    }
}