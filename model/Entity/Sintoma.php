<?php
namespace Model\Entity;

use Library\Repository;

class Sintoma extends Repository {
    protected $table = 'sintoma';

	  public function getSintomaById($id){
	    $rows = $this->select(['*'], "id=$id");
	    return $rows->fetch();
	  }

	  public function allSintomas(){
	  	$rows = $this->customQuery("select * from sintoma");
	  	return $rows->fetchAll();
	  }

}
