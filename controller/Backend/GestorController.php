<?php
namespace Controller\Backend;

use Library\Controller;
use Model\Entity\Category;
use Model\Entity\Sintoma;
use Model\Entity\User;

class GestorController extends Controller {
    static $template = 'Layout/base.html.php';
    
    function indexAction(){
      $category = new Category;
      $sintoma = new Sintoma;
      $user = new User;

      $categories = $category->getAll();
      $sintomas = $sintoma-> getAll(); 

      $query_clientes = "select * from persona where cliente = 1;";
      $users = (new User)->customQuery($query_clientes)->fetchAll();      

      return ["categories" => $categories, "sintomas" => $sintomas, "users" => $users, "title"=>"Listado Categorias"];
    }
}
