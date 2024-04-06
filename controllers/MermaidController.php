<?php
require_once "TwigBaseController.php"; // обязательно импортим BaseController

class MermaidController extends TwigBaseController {
    public $title = "Русалка"; // название страницы
    public $template = "__object.twig"; // шаблон страницы
    protected \Twig\Environment $twig; // ссылка на экземпляр twig, для рендернига
    
    public function getContext() : array
    {
        $context = parent::getContext(); // вызываем родительский метод
        
        $mermaid = [
            'title' => 'Русалка',
            'image' => '../public/images/mermaid.png',
            'description' => 'Описание русалки...'
        ];

        return $context;
    }
}