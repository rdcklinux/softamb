<?php
namespace Controller\Backend;

use Library\Controller;
use Model\Entity\Persona;
use Model\Entity\Category;
use Model\Entity\Sintoma;
use Model\Entity\User;
use Model\Entity\Carga;


class ClientController extends Controller {
    static $template = 'Layout/base.html.php';
    
    function indexAction(){
        $person = $this->getPerson();
        return ['persona'=>$person];
    }

    function editAction(){
        $person = $this->getPerson();
        return ['persona'=>$person];
    }

    function saveAction(){
        $id = (int)$person = $this->getPerson()['id'];
        $data = $_POST['person'];
        $user = new Persona;
        $user->update($id, $data);
        $_SESSION['message']="Datos Actualizados con exito";
        $this->redirect('/backend/client');
    }

    function homeAction(){
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

      if (isSet($_SESSION['user'])) {
        $id_cliente = $_SESSION['user']["id"];
        $query_cargas = "SELECT * FROM carga join persona on persona.id = carga_id WHERE persona_id = $id_cliente";
        $cargas = (new Carga)->customQuery($query_cargas)-> fetchAll();
      }

      return ["categories" => $categories, "sintomas" => $sintomas, "cargas"=> $cargas, "title"=>"Listado Categorias"];        
    }


    private function getPerson(){
        $user = new Persona;
        $rut = $_SESSION['user']['rut'];
        return $user->select('*', "rut='$rut'")->fetch();
    }
}
