<?php
require_once "PompeiiController.php";

class PompeiiInfoController extends PompeiiController {
    public $template = "pompeii_info.twig";
    
    public function getContext(): array
    {
        $context = parent::getContext(); 

        $template = "pompeii_info.twig";

        return $context;
    }
}


