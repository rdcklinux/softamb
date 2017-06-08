<?php
namespace Controller\Backend;

use Library\CrudController;
use Model\Entity\Ambulancia;

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
        $this->entity = new \Model\Entity\Ambulancia;
    }

    function liberarAmbulanciaAction(){

      $id_ambulancia = $this->get('id');
      $liberar_ambulancia_query = "update ambulancia set persona_id = null where id = $id_ambulancia";
      (new Ambulancia)->customQuery($liberar_ambulancia_query);

      $this->redirect("/backend/ambulancia?alert=liberada");
    }
}
