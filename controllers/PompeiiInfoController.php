<?php
require_once "PompeiiController.php";

class PompeiiInfoController extends PompeiiController {
    public $template = "pompeii.twig";
    
    public function getContext(): array
    {
        $context = parent::getContext(); 

        $pompeii = [
            'title' => 'Помпеи',
            'image' => '../public/images/pompeii.png',
            'description' => 'Здесь может быть описание Помпей...'
        ];
        return $context;
    }
}