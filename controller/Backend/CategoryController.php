<?php
namespace Controller\Backend;

use Library\CrudController;

class CategoryController extends CrudController {
    static $template = 'Layout/base.html.php';

    protected $entity = null;
    protected $module = 'category';
    protected $route = [
        'index' => '/backend/category',
        'edit' => '/backend/category/edit',
    ];
    protected $vtitles = [
        'index'=>'Listado de Categorias',
        'edit'=>'Editar Categoria',
        'new'=>'Nueva Categoria',
    ];
    protected $fields = [
        'nombre'=>['name'=>'Nombre','type'=>'text'],
    ];
    protected $messages = [
        'save'=>'Categoria guardada con exito',
        'create'=>'Categoria creada con exito',
    ];

    function __construct(){
        if(!$_SESSION['user']['gestor']); $this->redirect('/backend/client/home');
        $this->entity = new \Model\Entity\Category;
    }
}
