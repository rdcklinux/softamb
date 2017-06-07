<?php
namespace Controller\Backend;

use Library\Controller;
use Model\Entity\User;
use Model\Entity\Ambulancia;

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
    }   


    function setSelectedClientAction(){
        $rut = $this->post('rut');

        // ############### MEJORAR SEGURIDAD EVITANDO INJECCION SQL!!! #######
        $query = "select * from persona where rut = '$rut' and cliente = 1;";
        // $query = "select * from persona where id = 's' and cliente = 1;";
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


}