<?php
namespace Controller\Backend;

use Library\CrudController;

class AmbulanciaController extends CrudController {
    static $template = 'Layout/base.html.php';

    protected $entity = null;
    protected $module = 'ambulancia';
    protected $route = [
        'index' => '/backend/ambulancia',
        'edit' => '/backend/ambulancia/edit',
    ];
    protected $vtitles = [
        'index'=>'Listado de Ambulancias',
        'edit'=>'Editar Ambulancia',
        'new'=>'Nueva Ambulancia',
    ];
    protected $fields = [
        'patente'=>['name'=>'Patente','type'=>'text'],
    ];
    protected $messages = [
        'save'=>'Ambulancia guardada con exito',
        'create'=>'Ambulancia creada con exito',
    ];

    function __construct(){
        if(!$_SESSION['user']['gestor']); $this->redirect('/backend/client/home');
        $this->entity = new \Model\Entity\Ambulancia;
    }

    function indexAction(){
        $action = parent::indexAction();
        $action['entities'] = $this->entity->getAllWithPerson();
        $append = [
            'rut'=>['name'=>'Rut paciente'],
            'nombre'=>['name'=>'Nombre paciente'],
            'apellido'=>['name'=>'Apellido paciente'],
        ];
        $action['fields'] += $append;

        return $action;
    }

    function releaseAction(){
      $id = (int)$this->get('id');
      $this->entity->release($id);

      $this->redirect("/backend/ambulancia?alert=liberada");
    }
}
