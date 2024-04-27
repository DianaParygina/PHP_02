<?php

class BaseSpaceTwigController extends TwigBaseController{
    public function getContext(): array
    {

$context = parent::getContext();

$query = $this->pdo->query("SELECT DISTINCT name FROM object_types ORDER BY 1");
$types = $query->fetchAll();
$context['types'] = $types;

return $context;
    }
}