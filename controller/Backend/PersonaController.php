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
        'index'=>'Listado de Persna',
        'edit'=>'Editar Persona',
        'new'=>'Nueva Persona',
    ];
    protected $fields = [
        'rut'=>['name'=>'Rut','type'=>'text'],
        'password'=>['name'=>'Password','type'=>'text'],
        'nombre'=>['name'=>'Nombre','type'=>'text'],
        'apellido'=>['name'=>'Apellido','type'=>'text'],
        'fecha_nacimiento'=>['name'=>'Fecha Nacimiento','type'=>'text'],
        'telefono'=>['name'=>'Telefono','type'=>'text'],
        'direccion'=>['name'=>'Direccion','type'=>'text'],
        'activo'=>['name'=>'Activo en sistema','type'=>'text'],
        'gestor'=>['name'=>'Gestor','type'=>'text'],
        'cliente'=>['name'=>'Cliente','type'=>'text'],
    ];

    protected $messages = [
        'save'=>'Persona guardada con exito',
        'create'=>'Persona creada con exito',
    ];

    function __construct(){
        $this->entity = new \Model\Entity\Persona;
    }

     function indexAction(){

     unset($this->fields['password']);
      return parent::indexAction();
    }
}
