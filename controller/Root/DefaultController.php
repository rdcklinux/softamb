<?php
namespace Controller\Root;

use Library\Controller;

class DefaultController extends Controller {

  public function indexAction(){
    $this->redirect('/shop/product');
  }

}
