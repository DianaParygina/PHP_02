<?php
require_once "BaseController.php"; // обязательно импортим BaseController

class TwigBaseController extends BaseController {
    public $title = ""; // название страницы
    public $template = "__object.twig"; // шаблон страницы
    protected \Twig\Environment $twig; // ссылка на экземпляр twig, для рендернига

    public function setTwig($twig) {
        $this->twig = $twig;
    }

    public function getTemplate(){
        return $this->template;
    }

    public function getContext() : array
    {
        $context = parent::getContext(); // вызываем родительский метод
        $context['title'] = $this->title; // добавляем title в контекст
        $context['_url'] = $_SERVER['REQUEST_URI'];
    
        return $context;
    }
    
    public function get(array $context) { // добавил аргумент в get
        $template = $this->getTemplate();
        // echo $this->twig->render($template, $this->getContext()); // а тут поменяем getContext на просто $context
        echo $this->twig->render($template, $context);
    }
}