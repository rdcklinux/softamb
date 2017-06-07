<?php
namespace Controller\Backend;

use Library\Controller;
use Model\Entity\User;
/**
* 
*/
class PersonaController extends Controller
{
	
	static $template = 'Layout/base.html.php';
    
    function indexAction(){
        $user = new User;
        $users = $user-> getAll();

        return ['users' => $users];
    }

    function deleteAction(){
      $user_id = $_GET['id'];

      $user = new User;
      $user->delete($user_id);
      $this->redirect('/backend/persona?success=true');
    }

  function newAction(){
      return ['title' => "Crear nuevo usuario"];
    }


    function createAction(){

      echo "entramos";

      $query_fields = ['rut'=> 'cliente', 'password'=>'356a192b7913b04c54574d18c28d46e6395428ab', 
      'nombre'=>'Perdro', 'apellido'=>'Saez', 'fecha_nacimiento'=>'1992/06/23',
      'direccion'=>'las nieves verdes', 'contacto'=>'9999999', 'activo'=>1 , 'gestor'=>0, 'cliente'=>1];

      var_dump($query_fields);
      
      $user = new User;
      $user->create($query_fields);
      $this->redirect('/backend/persona?success=true');
     // $this->redirect('/backend/persona/asda');

  // `id` INT(11) NOT NULL AUTO_INCREMENT,
  // `rut` VARCHAR(10) NOT NULL,
  // `password` VARCHAR(255) NULL,
  // `nombre` VARCHAR(255) NOT NULL,
  // `apellido` VARCHAR(255) NOT NULL,
  // `fecha_nacimiento` VARCHAR(255) NOT NULL,
  // `direccion` VARCHAR(45) NOT NULL,
  // `contacto` VARCHAR(45) NULL,
  // `activo` TINYINT(1) NOT NULL DEFAULT '1',
  // `gestor` TINYINT(1) NULL DEFAULT '0',
  // `cliente` TINYINT(1) NULL DEFAULT '1',


    }   


    function setSelectedClientAction(){
        $rut = $this->post('rut');
        $id = $this->post('id');
        // ############### MEJORAR SEGURIDAD EVITANDO INJECCION SQL!!! #######
        $query = "select * from persona where rut = '$rut' and cliente = 1;";
        $query = "select * from persona where id = 's' and cliente = 1;";
        $cliente = (new User)->customQuery($query)-> fetch();

        if ($cliente == false) {
          unset($_SESSION['selectedCliente']);
          echo json_encode(['success'=> false]); exit;
        }

        $_SESSION['selectedCliente']= $cliente;
        // unset($_SESSION['selectedCliente']);

        echo json_encode(['cliente'=> $cliente, 'success'=> true]); exit;
        
    }


}