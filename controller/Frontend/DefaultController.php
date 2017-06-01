<?php
namespace Controller\Frontend;

use Library\Controller;
use Model\Entity\Product;

class DefaultController extends Controller {
    static $template ='Layout/base.html.php';

    function indexAction(){
        return [
            'title'=>"Sistema de atencion médica > inicio",
            'products'=>(new Product)->getAllproducts(),
        ];
    }

    //muestra un producto seleccionado
    function showAction(){
        $id = (int)$this->get('id');
        $product = (new Product)->getOneProductById($id);

        return [
            'title'=>"La Tienda > Productos > $product[name]",
            'product'=>$product,
        ];
    }

    //agrera un producto al carro de compras
    function addCartAction(){
        if(!$this->isXmlHttpRequest()) $this->redirect('/frontend');

        $product = $this->post('product');
        $id = (int)$product['id'];
        $quantity = (int)$product['quantity'];

        if(!isset($_SESSION['cart'])) $_SESSION['cart']=[];
        if(!isset($_SESSION['cart'][$id])){
                $product = (new Product)->getOneProductById($id);
                $product['quantity'] = 0;
                unset($product['stock'], $product['description']);
                $_SESSION['cart'][$id] = $product;
        }
        $_SESSION['cart'][$id]['quantity'] += $quantity;
        echo json_encode(['message'=>'Producto agregado al carro con exito.']); exit;
    }

    function updateCartAction(){
        $product = $this->post('product');
        $id = (int)$product['id'];
        $quantity = (int)$product['quantity'];
        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]['quantity'] = $quantity;
        }
        echo json_encode(['message'=>'Carro actualizado con exito.']); exit;
    }

}
