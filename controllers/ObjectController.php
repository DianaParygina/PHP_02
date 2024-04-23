<?php
require_once "BaseSpaceTwigController.php";

class ObjectController extends BaseSpaceTwigController {

    public $template = "__object.twig";

    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->prepare("SELECT * FROM space_objects WHERE id = :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();
        $data = $query->fetch();

        $showMode = isset($this->params['showMode']) ? $this->params['showMode'] : 'default';

        if (isset($_GET['showMode'])) {
            if($_GET['showMode'] === 'image'){
                $query = $this->pdo->prepare("SELECT image FROM space_objects WHERE id = :my_id");
                $query->bindValue("my_id", $this->params['id']);
            } elseif ($_GET['showMode'] === 'info') {
                $query = $this->pdo->prepare("SELECT info FROM space_objects WHERE id = :my_id");
                $query->bindValue("my_id", $this->params['id']);
            } else {
                $query = $this->pdo->query("SELECT * FROM space_objects");
            }
    
            }
            

        $query->execute();
        $context['objects'] = $query->fetchAll(); 

        $context['showMode'] = $showMode;

        $context['id'] = $this->params['id'];
        $context['description'] = $data['description'];

        $context['image'] = $data['image'];
        $context['info'] = $data['info'];

        // if($context['image']){
            
        // }

        echo "<pre>"; // чтобы красивее выводил
        print_r($context['image']); // выведем содержимое $_GET
        echo "</pre>";
        
        return $context;

        if (!$data) {
            header("Location: /404");
            exit();
        }
    }
}

