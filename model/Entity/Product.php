<?php
namespace Model\Entity;

use Library\Repository;

class Product extends Repository {
  protected $table ='product';

  public function getAllproducts(){
      $sqlProduct = "
      SELECT p.*, c.name AS category
      FROM product p
      LEFT JOIN category c ON p.category_id = c.id
      WHERE p.status = 1
      ";
      return $this->customQuery($sqlProduct);
  }

  public function getOneProductById($id){
    $rows = $this->select(['id','name','image','price','stock', 'description', 'category_id'], "id=$id");
    return $rows->fetch();
  }
}
