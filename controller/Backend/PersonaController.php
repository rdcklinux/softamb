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

      // echo "entramos";

      // $query_fields = ['rut'=> 'cliente', 'password'=>'356a192b7913b04c54574d18c28d46e6395428ab', 'nombre'=>'Perdro', 'apellido'=>'Saez', 'fecha_nacimiento'=>'1992/06/23','direccion'=>'las nieves verdes',
      //   'contacto'=>'9999999','activo'=>1 , 'gestor'=>0, 'cliente'=>1];

      //   echo $query_fields;
      
      // $user = new User;
      // $user->create($query_fields);
      $this->redirect('/backend/persona?success=true');
     // $this->redirect('/backend/persona/asda');
    }    

}