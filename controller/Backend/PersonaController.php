<?php
namespace Controller\Backend;

use Library\CrudController;
use Library\Controller;
use Model\Entity\User;
use Model\Entity\Ambulancia;
use Model\Entity\Persona;

class PersonaController extends CrudController {
    static $template = 'Layout/base.html.php';

    protected $entity = null;
    protected $module = 'Persona';
    protected $route = [
        'index' => '/backend/Persona',
        'edit' => '/backend/Persona/edit',
    ];
    protected $vtitles = [
        'index'=>'Listado de Personas',
        'edit'=>'Editar Persona',
        'new'=>'Nueva Persona',
    ];
    protected $fields = [
        'rut'=>['name'=>'Rut','type'=>'text'],
        'password'=>['name'=>'Password','type'=>'password'],
        'r_password'=>['name'=>'Repita Password','type'=>'password'],
        'nombre'=>['name'=>'Nombre','type'=>'text'],
        'apellido'=>['name'=>'Apellido','type'=>'text'],
        'fecha_nacimiento'=>['name'=>'Fecha Nacimiento','type'=>'text'],
        'telefono'=>['name'=>'Telefono','type'=>'text'],
        'direccion'=>['name'=>'Direccion','type'=>'text'],
        'activo'=>['name'=>'Activo','type'=>'checkbox'],
        'gestor'=>['name'=>'Gestor','type'=>'checkbox'],
        'cliente'=>['name'=>'Cliente','type'=>'checkbox'],
    ];

    protected $messages = [
        'save'=>'Persona guardada con exito',
        'create'=>'Persona creada con exito',
    ];

    function __construct(){
        unset($_SESSION['cp']);
        $this->entity = new \Model\Entity\Persona;
    }

    function indexAction(){
     if(!$_SESSION['user']['gestor']) $this->redirect('/backend/client/home');
     unset($this->fields['password'], $this->fields['r_password'], $this->fields['direccion']);
      return parent::indexAction();
    }

    function editAction(){
        $action = parent::editAction();
        $action['entity']['password']='';
        return $action;
    }

    function saveAction(){
        if($_POST['entity']['password'] == $_POST['entity']['r_password'] && !empty($_POST['entity']['password'])){
            $_POST['entity']['password'] = sha1($_POST['entity']['password']);
            unset($_POST['entity']['r_password']);
        } else {
            unset($_POST['entity']['password'], $_POST['entity']['r_password']);
        }

        parent::saveAction();
    }

    function createAction(){
        if(!$_SESSION['user']['gestor']) $this->redirect('/backend/client/home');
        if($_POST['entity']['password'] == $_POST['entity']['r_password'] && !empty($_POST['entity']['password'])){
            $_POST['entity']['password'] = sha1($_POST['entity']['password']);
            unset($_POST['entity']['r_password']);
        } else {
            unset($_POST['entity']['password'], $_POST['entity']['r_password']);
        }

        parent::createAction();
    }

    function setSelectedClientAction(){
        // Asigna un cliente 'seleccionado' a una variable de sesion, para que cuando queramos asignar una ambulancia ya sepamos a quien le pertenecera
        $rut = $this->post('rut');
        // ############### MEJORAR SEGURIDAD EVITANDO INJECCION SQL!!! #######
        $query = "select * from persona where rut = '$rut' and cliente = 1 and activo = 1;";
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
