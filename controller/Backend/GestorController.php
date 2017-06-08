<?php
namespace Controller\Backend;

use Library\Controller;
use Model\Entity\Category;
use Model\Entity\Sintoma;
use Model\Entity\Persona;
use Model\Entity\Carga;


class GestorController extends Controller {
    static $template = 'Layout/base.html.php';

    function indexAction(){
      $category = new Category;
      $sintoma = new Sintoma;

      $categories = $category->getAll();
      $sintomas = $sintoma-> getAll();

      $list=[];
      foreach($sintomas as $sintoma){
          $sintoma['category_id'] = $category->select(['nombre'],"id=$sintoma[category_id]")->fetch()['nombre'];
          $list[]=$sintoma;
      }
      $sintomas = $list;
      $cargas = [];

      if (isSet($_SESSION['selectedCliente'])) {
        $id_cliente = (int)$_SESSION['selectedCliente']["id"];
        $cargas = (new Persona)->getCargas($id_cliente);
      }

      return ["categories" => $categories, "sintomas" => $sintomas, "cargas"=> $cargas, "title"=>"Listado Categorias"];
    }
}
