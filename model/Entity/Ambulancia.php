<?php
namespace Model\Entity;

use Library\Repository;

class Ambulancia extends Repository {
    protected $table = 'ambulancia';

    public function release($id){
      $id = (int)$id;
      $sql = "UPDATE ambulancia SET persona_id = NULL WHERE id = $id";
      $this->customQuery($sql);
    }

    public function getAllWithPerson(){
        $sql = "
        SELECT
            a.*, p.rut, p.nombre, p.apellido FROM ambulancia a
        LEFT JOIN persona p ON a.persona_id = p.id";
        return $this->customQuery($sql);
    }

}
