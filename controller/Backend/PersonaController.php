<?php
namespace Controller\Backend;

use Library\Controller;
use Model\Entity\User;
use Model\Entity\Persona;
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

      $query_fields = ['rut'=>$_POST["rut"], 'password'=>$_POST["password"], 'nombre'=>$_POST["nombre"], 'apellido'=>$_POST["apellido"], 'fecha_nacimiento'=>$_POST["fecha_nacimiento"],'direccion'=>$_POST["direccion"],
        'contacto'=>$_POST["contacto"],'activo'=>$_POST["activo"], 'gestor'=>$_POST["gestor"], 'cliente'=>$_POST["cliente"] ];

        // echo $query_fields;
      
      $user = new User;
      $user->create($query_fields);
      $this->redirect('/backend/persona?success=true');
     // $this->redirect('/backend/persona/asda');
    }    



    function editAction(){

        $id = $_GET["id"];
        $Persona = (new Persona)->getOnePersonaById($id);

        //$user->select(['rut','password','nombre','apellido','fecha_nacimiento', 'direccion', 'contacto', 
          //               'activo', 'gestor', 'cliente']);
        //$user ->fetch();


        return ['persona'=>$Persona];
        $this->redirect('/backend/persona/actualizar');
    }


}