<?php
require_once "BaseSpaceTwigController.php";

class ObjectTypeController extends BaseSpaceTwigController {
    public $template = "type_new_objects.twig";

    public function get(array $context) {
        echo $_SERVER['REQUEST_METHOD'];
        parent::get($context);
    }

    public function post(array $context) {
        $tmp_name = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];

        move_uploaded_file($tmp_name, "../public/media/$name");
        $image_url = "/media/$name";

        $sql = <<<EOL
INSERT INTO object_types (name, image)
VALUES (:name, :image_url)
EOL;
        $query = $this->pdo->prepare($sql);
        $query->bindValue("name", $_POST['title']);
        $query->bindValue("image_url", $image_url);
        $query->execute();

        $this->get($context); 
    }
}