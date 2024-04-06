<?php
require_once "TwigBaseController.php"; // обязательно импортим BaseController

class MermaidImageController extends MermaidController {
    public $template = "__object.twig"; // шаблон страницы
    //protected \Twig\Environment $twig; // ссылка на экземпляр twig, для рендернига
    
    public function getContext() : array
    {
        $context = parent::getContext(); // вызываем родительский метод
        
        $mermaid = [
            'title' => 'Русалка',
            'image_url' => '../public/images/uranus.jpg',
            'description' => 'Здесь может быть описание русалки...'
        ];

        return $context;
    }
}