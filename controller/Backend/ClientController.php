<?php
namespace Controller\Backend;

use Library\Controller;
use Model\Company;
use Model\Entity\Persona;


class ClientController extends Controller {
    static $template = 'Layout/base.html.php';

    function indexAction(){
        $person = $this->getPerson();
        return ['persona'=>$person];
    }

    function editAction(){
        $person = $this->getPerson();
        return ['persona'=>$person];
    }

    function saveAction(){
        $id = (int)$person = $this->getPerson()['id'];
        $data = $_POST['person'];
        $user = new Persona;
        $user->update($id, $data);
        $_SESSION['message']="Datos Actualizados con exito";
        $this->redirect('/backend/client');
    }

    private function getPerson(){
        $user = new Persona;
        $rut = $_SESSION['user']['rut'];
        return $user->select('*', "rut='$rut'")->fetch();
    }
}
