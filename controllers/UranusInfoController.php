<?php
require_once "UranusController.php";

class UranusInfoController extends UranusController {
    public $template = "uranus.twig";
    
    public function getContext(): array
    {
        $context = parent::getContext(); 

        $uranus = [
            'title' => 'Уран',
            'image' => '../public/images/uranus.png',
            'description' => 'Здесь может быть описание урана...'
        ];
        return $context;
    }
}