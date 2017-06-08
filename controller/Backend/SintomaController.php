<?php
namespace Controller\Backend;

use Library\CrudController;
use Model\Entity\Category;

class SintomaController extends CrudController {
    static $template = 'Layout/base.html.php';

    protected $entity = null;
    protected $module = 'sintoma';
    protected $route = [
        'index' => '/backend/sintoma',
        'edit' => '/backend/sintoma/edit',
    ];
    protected $vtitles = [
        'index'=>'Listado de Sintomas',
        'edit'=>'Editar Sintoma',
        'new'=>'Nuevo Sintoma',
    ];
    protected $fields = [
        'descripcion'=>['name'=>'Descripción','type'=>'textarea'],
        'primeros_auxilios'=>['name'=>'Primeros Auxilios','type'=>'textarea'],
        'ambulancia'=>['name'=>'Necesita Ambulancia?','type'=>'checkbox'],
        'category_id'=>['name'=>'Categoria','type'=>'select'],
    ];
    protected $messages = [
        'save'=>'Sintoma guardada con exito',
        'create'=>'Sintoma creada con exito',
    ];

    function __construct(){
        if(!$_SESSION['user']['gestor']); $this->redirect('/backend/client/home');
        $this->entity = new \Model\Entity\Sintoma;
    }

    function indexAction(){
        $action = parent::indexAction();
        $entities = [];
        $category = new Category;
        foreach($action['entities'] as $entity){
            $entity['category_id'] = $category->select(['nombre'],"id=$entity[category_id]")->fetch()['nombre'];
            $entity['ambulancia'] = $entity['ambulancia']?'SI':'NO';
            $entities[] = $entity;
        }
        $action['entities'] = $entities;
        return $action;
    }

    function newAction(){
        $action = parent::newAction();
        $action['entity'] = [
            'category_id' => [
                'options'=>(new Category)->getAll(),
            ]];
        return $action;
    }

    function editAction(){
        $action = parent::editAction();
        $action['entity']['category_id'] = [
            'selected'=> $action['entity']['category_id'],
            'options'=>(new Category)->getAll(),
        ];

        return $action;
    }
}
