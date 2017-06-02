<?php
namespace Controller\Backend;

use Library\Controller;
use Model\Company;
use Model\User;


class WelcomeController extends Controller {
    static $template = 'Layout/base.html.php';

    function indexAction(){
        //revisa que tipo de perfil tiene el Usuario
        //muestra los botones o redirige a la opcion segun
        //el perfil.
        //define las opciones que debe mostrar la plataforma
        $user = $_SESSION['user'];
        if($user['cliente'] && !$user['gestor']){
            $this->redirect('/backend/client');
        }elseif(!$user['cliente'] && $user['gestor']){
            $this->redirect('/backend/gestor');
        }
        return [];
    }
}
