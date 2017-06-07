<?php
namespace Controller\Backend;

use Library\CrudController;
use Model\Entity\Carga;
use Model\Entity\Persona;

class CargaController extends CrudController {
    static $template = 'Layout/base.html.php';
    private $persona = 0;
    protected $entity = null;
    protected $module = 'carga';
    protected $route = [
        'index' => '/backend/carga',
        'edit' => '/backend/carga/edit',
    ];
    protected $vtitles = [
        'index'=>'Listado de Cargas',
        'edit'=>'Editar Carga',
        'new'=>'Nueva Carga',
    ];
    protected $fields = [
        'rut'=>['name'=>'Rut','type'=>'text'],
        'nombre'=>['name'=>'Nombre','type'=>'text'],
        'apellido'=>['name'=>'Apellido','type'=>'text'],
        'fecha_nacimiento'=>['name'=>'Fecha Nacimiento','type'=>'text'],
        'telefono'=>['name'=>'Telefono','type'=>'text'],
        'direccion'=>['name'=>'Direccion','type'=>'text'],

    ];

    protected $messages = [
        'save'=>'Carga guardada con exito',
        'create'=>'Carga creada con exito',
    ];

    function __construct(){
        if(empty($_SESSION['cp'])){
            $_SESSION['cp'] = (int)$_GET['persona'];
        }
        $this->persona = $_SESSION['cp'];
        $this->entity = new \Model\Entity\Persona;
    }

    function indexAction(){
        $action = parent::indexAction();
        $action['entities'] = $this->entity->getCargas($this->persona);
        $action['persona'] = (new Persona)->select('*', "id=$this->persona")->fetch();

        return $action;
    }

    function editAction(){
        $action = parent::editAction();
        $action['persona'] = (new Persona)->select('*', "id=$this->persona")->fetch();

        return $action;
    }

    function createAction(){
        $data = $_POST['entity'];
        $data['activo']=0;
        $data['cliente']=0;
        $this->entity->create($data);
        $id = $this->entity->getLastId();
        (new Carga)->create(['carga_id'=>$id, 'persona_id'=>$this->persona]);
        $_SESSION['message'] = $this->messages['create'];
        $this->redirect($this->route['edit'] . "?id=$id");
    }

    function deleteAction(){
        (new Carga)->deleteCarga((int)$_GET['id']);
        parent::deleteAction();
    }
}
