<?php
namespace Model\Entity;

use Library\Repository;

class Carga extends Repository {
    protected $table = 'carga';

    function deleteCarga($id){
        $sql ="DELETE FROM carga WHERE carga_id=$id";
        $this->customQuery($sql);
    }
}
