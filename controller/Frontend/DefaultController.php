<?php
namespace Controller\Frontend;

use Library\Controller;
use Model\Entity\Persona;
use Model\Entity\Sintoma;
use Model\Entity\Category;

class DefaultController extends Controller {
    static $template ='Layout/base.html.php';

    function indexAction(){
        $this->redirect('/frontend/auth/signin');
    }

    function searchAction(){
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


      return ["categories" => $categories, "sintomas" => $sintomas, "cargas"=> $cargas, "title"=>"Listado Categorias"];        
    }    


}
