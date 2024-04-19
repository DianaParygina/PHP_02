<?php
//require_once "volcanoController.php";

class volcanoInfoController extends volcanoController {
    public $template = "volcano_info.twig";
    
    public function getContext(): array
    {
        $context = parent::getContext(); 

        $template = "volcano_info.twig";

        return $context;
    }
}