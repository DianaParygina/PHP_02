<?php
require_once "TwigBaseController.php"; // обязательно импортим BaseController

class volcanoImageController extends volcanoController {
    public $template = "base_image.twig"; // шаблон страницы
    
    public function getContext() : array
    {
        $context = parent::getContext(); // вызываем родительский метод
        
        $context['image_url'] = '/images/volcano.jpg';

        return $context;
    }
}