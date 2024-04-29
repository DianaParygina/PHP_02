<?php
require_once "BaseSpaceTwigController.php";

class SpaceObjectUpdateController extends BaseSpaceTwigController
{
    public $template = "space_object_edit.twig";

    public function get(array $context){
        echo $_SERVER['REQUEST_METHOD'];
        $id = $this->params['id'];

        $sql = <<<EOL
SELECT * FROM space_objects WHERE id = :id
EOL;

        $query = $this->pdo->prepare($sql);
        $query->bindValue("id", $id);
        $query->execute();
        $data = $query->fetch();
        $context['object'] = $data;      
        //parent::get($context);
        //$types = $this->fetchTypes(); 
    //$context['types'] = $types;

    parent::get($context);
    }

    public function post(array $context) {
        // Use isset() to check if keys exist before accessing them
        $title = isset($_POST['title']) ? $_POST['title'] : "";
        $description = isset($_POST['description']) ? $_POST['description'] : "";
        $type = isset($_POST['type']) ? $_POST['type'] : "";
        $info = isset($_POST['info']) ? $_POST['info'] : "";
        $id = $this->params['id'];

        // Handle file upload
        $image_url = "";
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $tmp_name = $_FILES['image']['tmp_name'];
            // Generate a unique and safe file name
            $fileExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $fileName = uniqid() . '.' . $fileExtension; 
            $filePath = "../public/media/$fileName";
            move_uploaded_file($tmp_name, $filePath);
            $image_url = "/media/$fileName";
        }

        $sql = <<<EOL
UPDATE space_objects
SET title=:title, description=:description, type=:type, info=:info, image=:image_url
WHERE id = :id
EOL;

        $query = $this->pdo->prepare($sql);
        $query->bindValue("title", $title);
        $query->bindValue("description", $description);
        $query->bindValue("type", $type);
        $query->bindValue("info", $info);
        $query->bindValue("image_url", $image_url);
        $query->bindValue("id", $id);

        $query->execute();

        $context['message'] = 'Вы успешно обновили объект';
        $context['id'] = $this->params['id']; // получаем id нового добавленного объекта

        $this->get($context);
    }
}