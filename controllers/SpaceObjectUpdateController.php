<?php
require_once "BaseSpaceTwigController.php";

class SpaceObjectUpdateController extends BaseSpaceTwigController
{
    public $template = "space_object_edit.twig";

    public function get(array $context){
        
        $id = $this->params['id'];

        $sql = <<<EOL
SELECT * FROM space_objects WHERE id = :id
EOL;

        $query = $this->pdo->prepare($sql);
        $query->bindValue("id", $id);
        $query->execute();
        $data = $query->fetch();
        $context['object'] = $data;      
        parent::get($context);
        $types = $this->fetchTypes(); 
    $context['types'] = $types;

    echo $context;
    parent::get($context);
    }

    public function post(array $context) {
        // получаем значения полей с формы
        $title = $_POST['title'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $info = $_POST['info'];

        // вытащил значения из $_FILES
        $tmp_name = $_FILES['image']['tmp_name'];
        $name =  $_FILES['image']['name'];
        move_uploaded_file($tmp_name, "../public/media/$name");
        $image_url = "/media/$name";

        // создаем текст запрос
        $sql = <<<EOL
UPDATE space_objects
SET title=:title, description=:description, type=:type, info=:info, image=:image_url
WHERE id = :id
EOL;

        // подготавливаем запрос к БД
        $query = $this->pdo->prepare($sql);
        // привязываем параметры
        $query->bindValue("title", $title);
        $query->bindValue("description", $description);
        $query->bindValue("type", $type);
        $query->bindValue("info", $info);
        $query->bindValue("image_url", $image_url);

        // выполняем запрос
        $query->execute();
        
        $context['message'] = 'Вы успешно создали объект';
        $context['id'] = $this->pdo->lastInsertId(); // получаем id нового добавленного объекта

        $this->get($context);

        header("Location: /");
        exit;
    }
}
