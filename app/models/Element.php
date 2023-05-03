<?php

namespace App\models;

use App\helpers\Connection;

class Element
{
    // все без повторений
    public static function getElement($sections)
    {
        $query = Connection::make()->prepare("SELECT image, content, section_elements.name as name, section_elements.description as description, sections.name as name_sections FROM elements
        INNER JOIN section_elements ON elements.elements_id = section_elements.id
        INNER JOIN sections ON section_elements.sections_id = sections.id
        WHERE sections.name = :sections");
        $query->execute(["sections" => $sections]);
        return $query->fetchAll();
    }
}
