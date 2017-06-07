<?php
namespace Controller\Backend;

use Library\CrudController;

class PersonaController extends CrudController {
    static $template = 'Layout/base.html.php';

    protected $entity = null;
    protected $module = 'Persona';
    protected $route = [
        'index' => '/backend/Persona',
        'edit' => '/backend/Persona/edit',
    ];
    protected $vtitles = [
        'index'=>'Listado de Persona',
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
        if($_POST['entity']['password'] == $_POST['entity']['r_password'] && !empty($_POST['entity']['password'])){
            $_POST['entity']['password'] = sha1($_POST['entity']['password']);
            unset($_POST['entity']['r_password']);
        } else {
            unset($_POST['entity']['password'], $_POST['entity']['r_password']);
        }

        parent::createAction();
    }
}
