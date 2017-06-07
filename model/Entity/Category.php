<?php
namespace Model\Entity;

use Library\Repository;

class Category extends Repository {
    protected $table = 'categoria';

	  public function getCategoryById($id){
	    $rows = $this->select(['*'], "id=$id");
	    return $rows->fetch();
	  }

}
