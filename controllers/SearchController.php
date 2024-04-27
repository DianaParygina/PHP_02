<?php
require_once "BaseSpaceTwigController.php";

class SearchController extends BaseSpaceTwigController {
    public $template = "search.twig";

    public function getContext(): array
    {

    $context = parent::getContext();

    $type = isset($_GET['type']) ? $_GET['type'] : '';
    $title= isset($_GET['title']) ? $_GET['title'] : '';
    $description= isset($_GET['description']) ? $_GET['description'] : '';

    $sql = <<<EOL
SELECT id, title
FROM space_objects
WHERE (:title = '' OR title like CONCAT('%', :title, '%'))
    AND (:description = '' OR description LIKE CONCAT('%', :description, '%')) 
    AND (type = :type OR :type='')
EOL;

    $query = $this->pdo->prepare($sql);

    $query->bindValue("title", $title);
    $query->bindValue("type", $type);
    $query->bindValue("description", $description);
    $query->execute();

    $context['objects'] = $query->fetchAll();

    return $context;
    }
}