<?php
require_once "MermaidController.php";

class MermaidInfoController extends MermaidController {
    public $template = "mermaid_info.twig";
    
    public function getContext(): array
    {
        $context = parent::getContext(); 

        // ...

        return $context;
    }
}