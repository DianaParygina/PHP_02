<?php

class SpaceObjectDeleteController extends BaseController {
    public function post(array $context)
    {
        $id = $_POST['id']; 

        $sql =<<<EOL
DELETE FROM space_objects WHERE id = :id
EOL; 
        
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":id", $id);
        $query->execute();

        header("Location: /");
        exit;
    }
}