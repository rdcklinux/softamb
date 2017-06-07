<?php
namespace Controller\Backend;

use Library\Controller;
use Model\Entity\User;
use Model\Entity\Ambulancia;
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

      $query_fields = ['rut'=>$_POST["rut"], 'password'=>$_POST["password"], 'nombre'=>$_POST["nombre"], 'apellido'=>$_POST["apellido"], 'fecha_nacimiento'=>$_POST["fecha_nacimiento"],'direccion'=>$_POST["direccion"],
        'contacto'=>$_POST["contacto"],'activo'=>$_POST["activo"], 'gestor'=>$_POST["gestor"], 'cliente'=>$_POST["cliente"] ];
      
      $user = new User;
      $user->create($query_fields);
      $this->redirect('/backend/persona?success=true');
    }   


    function setSelectedClientAction(){
        // Asigna un cliente 'seleccionado' a una variable de sesion, para que cuando queramos asignar una ambulancia ya sepamos a quien le pertenecera

        $rut = $this->post('rut');

        // ############### MEJORAR SEGURIDAD EVITANDO INJECCION SQL!!! #######
        $query = "select * from persona where rut = '$rut' and cliente = 1;";
        $cliente = (new User)->customQuery($query)-> fetch();

        if ($cliente == false) {
          unset($_SESSION['selectedCliente']);
          echo json_encode(['success'=> false, 'alert_param'=>'?alert=rut_no_encontrado']); exit;
        }

        $_SESSION['selectedCliente']= $cliente;
        echo json_encode(['cliente'=> $cliente, 'alert_param'=>'?alert=cliente_seleccionado', 'success'=> true]); exit;
        
    }

    function asignarAmbulanciaAction(){
      $user_id = $this->post('user_id');

      $query_ambulancias_libres = "select * from ambulancia where persona_id is null limit 1;";
      $ambulancia = (new Ambulancia)->customQuery($query_ambulancias_libres)->fetch(); 
      $ambulancia_id = $ambulancia['id'];

      if ($ambulancia == false) {
        echo json_encode(['success'=> false, 'alert_param'=>'?alert=sin_ambulancias_libres']); exit;
      }

      $query_usario_con_ambulancia = "select * from ambulancia where persona_id = $user_id limit 1;";
      $ya_tiene_ambulancia = (new Ambulancia)->customQuery($query_usario_con_ambulancia)->fetch(); 
      
      if ($ya_tiene_ambulancia != false) {
        echo json_encode(['success'=> false, 'alert_param'=>'?alert=ambulancia_ya_asignada']); exit;
      }     
      
      $query_asignar_ambulancia = "update ambulancia set persona_id = $user_id where id = $ambulancia_id;";
      $ambulancia = (new Ambulancia)->customQuery($query_asignar_ambulancia); 

      echo json_encode(['success'=> true, 'alert_param'=>'?alert=ambulancia_asignada', "ambulancia_id"=> $ambulancia_id]); exit;
    
    }

    function editAction(){

        $id = $_GET["id"];
        $Persona = (new Persona)->getOnePersonaById($id);

        //$user->select(['rut','password','nombre','apellido','fecha_nacimiento', 'direccion', 'contacto', 
          //               'activo', 'gestor', 'cliente']);
        //$user ->fetch();


        return ['persona'=>$Persona];

    }

    function saveAction(){
      $id = (int)$_GET["id"];
      $query_fields = ['rut'=>$_POST["rut"], 'password'=>$_POST["password"], 'nombre'=>$_POST["nombre"], 'apellido'=>$_POST["apellido"], 'fecha_nacimiento'=>$_POST["fecha_nacimiento"],'direccion'=>$_POST["direccion"],
        'contacto'=>$_POST["contacto"],'activo'=>$_POST["activo"], 'gestor'=>$_POST["gestor"], 'cliente'=>$_POST["cliente"] ];
      $persona = new Persona;
      $persona->update($id, $query_fields);
      $this->redirect('/backend/persona');
    }


}