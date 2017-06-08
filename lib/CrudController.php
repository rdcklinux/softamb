<?php
namespace Library;

use Library\Controller;

class CrudController extends Controller {

    //@GET
    function indexAction(){
        return [
            'entities'=>$this->entity->getAll(),
            'vtitle'=>$this->vtitles['index'],
            'title'=>$this->vtitles['index'],
            'module'=>$this->module,
            'fields'=>$this->fields,
        ];
    }

    ///@GET
    function editAction(){
        $id = (int)$_GET['id'];
        $entity = $this->entity->select('*', "id=$id")->fetch();
        return [
            'entity'=>$entity,
            'vtitle'=>$this->vtitles['edit'],
            'title'=>$this->vtitles['edit'],
            'module'=>$this->module,
            'fields'=>$this->fields,
        ];
    }

    //@GET
    function newAction(){
        return [
            'vtitle'=>$this->vtitles['new'],
            'title'=>$this->vtitles['new'],
            'module'=>$this->module,
            'fields'=>$this->fields,
        ];
    }

    //@POST
    function saveAction(){
        $id = (int)$_GET['id'];
        $data = $_POST['entity'];
        $this->entity->update($id, $data);
        $_SESSION['message'] = $this->messages['save'];
        $this->redirect($this->route['edit'] . "?id=$id");
    }

    //@POST
    function createAction(){
        $data = $_POST['entity'];
        $this->entity->create($data);
        $id = $this->entity->getLastId();
        $_SESSION['message'] = $this->messages['create'];
        $this->redirect($this->route['edit'] . "?id=$id");
    }
    //@GET
    function deleteAction(){
        $id = (int)$_GET['id'];
        $this->entity->delete($id);
        $this->redirect($this->route['index']);
    }
}
