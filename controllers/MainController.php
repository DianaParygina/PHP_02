<?php
//require_once "TwigBaseController.php";

class MainController extends TwigBaseController {
    public $template = "main.twig";
    public $title = "Главная";

    public function getContext(): array
    {
        $context = parent::getContext();
        
        $query = $this->pdo->query("SELECT * FROM space_objects");
        
        $context['space_objects'] = $query->fetchAll();

        return $context;
    }
}