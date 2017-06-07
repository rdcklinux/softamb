<?php
namespace Model\Entity;

use Library\Repository;

class Ambulancia extends Repository {
    protected $table = 'ambulancia';

	  public function getAmbulanciaById($id){
	    $rows = $this->select(['*'], "id=$id");
	    return $rows->fetch();
	  }

	  public function allAmbulancias(){
	  	$rows = $this->customQuery("select * from sintoma");
	  	return $rows->fetchAll();
	  }

}
