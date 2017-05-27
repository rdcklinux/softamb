<?php
namespace Controller\Shop;

use Library\Controller;
use Model\Entity\Product;

class ProductController extends Controller {
    static $template ='Layout/base.html.php';

    function indexAction(){
        return [
            'title'=>"La Tienda > Home",
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
        if(!$this->isXmlHttpRequest()) $this->redirect('/shop/product');

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

    //ver el carro de compras
    function showCartAction(){
        $cart = null;
        if(!empty($_SESSION['cart']) ) {
            $cart = $_SESSION['cart'];
        }

        return [
            'title'=>"La Tienda > Carro de Compras",
            'cart'=>$cart,
        ];
    }

    //accion de hacer clic en el boton comprar
    function buyAction(){
        //si no esta registrado mostrar cuadro de registro
        //le cuadro de registro debe ser AJAX
        //mostrar los detalles de la compra y las opciones de pago
        $logged = false;

        return ['logged'=>$logged];
    }

    function clearCartAction(){
        $_SESSION['cart'] = null;
        $this->redirect('/shop/product/showCart');
    }

}
