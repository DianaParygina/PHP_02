<?php
require_once "BaseSpaceTwigController.php";

class ObjectController extends BaseSpaceTwigController {

    public $template = "__object.twig";

    public function getTemplate() {
        $showMode = isset($this->params['showMode']) ? $this->params['showMode'] : 'default';
        if ($showMode == 'image') {
            return "base_image.twig";
        } elseif ($showMode == 'info') {
            return "base_info.twig";
        }else {
            return "__object.twig";
        }
    }

    public function getContext(): array
    {
        $context = parent::getContext();
        $showMode = isset($this->params['showMode']) ? $this->params['showMode'] : 'default';

        $query = $this->pdo->prepare("SELECT * FROM space_objects WHERE id = :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();
        $data = $query->fetch();

        if ($data) {
            $context['description'] = $data['description'];
            $context['image'] = $data['image'];
            $context['info'] = $data['info'];
        } else {
            $context['description'] = ""; 
            $context['image'] = "";
            $context['info'] = "";
        }

        if ($showMode) {
            if ($showMode === 'image') {
                $query = $this->pdo->prepare("SELECT image FROM space_objects WHERE id = :my_id");
                $query->bindValue("my_id", $this->params['id']);
            } elseif ($showMode === 'info') {
                $query = $this->pdo->prepare("SELECT info FROM space_objects WHERE id = :my_id");
                $query->bindValue("my_id", $this->params['id']);
            } else {
                $query = $this->pdo->query("SELECT * FROM space_objects");
            }
            $query->execute();
        }
        
        $context['objects'] = $query->fetchAll();
        $context['showMode'] = $showMode;
        $context['id'] = $this->params['id'];
        $context["my_session_message"] = isset($_SESSION['welcome_message']) ? $_SESSION['welcome_message'] : "";
        $context["messages"] = isset($_SESSION['messages']) ? $_SESSION['messages'] : "";
        $context["page_history"] = isset($_SESSION['page_history']) ? $_SESSION['page_history'] : "";

        return $context;
    }
}

