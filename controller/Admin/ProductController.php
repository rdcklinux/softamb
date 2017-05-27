<?php
namespace Controller\Admin;

use Library\Controller;
use Model\Entity\Product;
use Model\Entity\Category;

class ProductController extends Controller {
    static $template ='Layout/base.html.php';

    function indexAction(){
        return [
            'title'=>"La Tienda > Home",
            'products'=>(new Product)->getAllproducts(),
        ];
    }

    function newAction(){

        $category = new Category;
        $categories = $category->select(["name", "id"]);   
             
        return [
            'title'=>"La Tienda > Home",
            'categories'=>$categories
        ];
    }

    function editAction(){
        
        $id = $_GET["id"];
        $product = (new Product)->getOneProductById($id);

        $category = new Category;
        $categories = $category->select(["name", "id"]);   

        $cat = $category->select(["name", "id"], 'id='.$product['category_id']);   
        $category = $cat->fetch();


        return ['product'=>$product, 'category'=>$category, 'categories'=>$categories, 'title'=> 'Edicion Productos'];
    }

    function createAction(){

      $query_fields = ['name'=>$_POST["name"], 'stock'=>$_POST["stock"], 'price'=>$_POST["price"], 'image'=>$_POST["image"], 'description'=>$_POST["description"],'category_id'=>$_POST["category_id"] ];

      $product = new Product;
      $product->create($query_fields);

      $this->redirect('/admin/product');
    }    

    
    function deleteAction(){
      $product_id = $_GET["id"];

      $product = new Product;
      $product->delete($product_id);
      $this->redirect('/admin/product?success=true');  
    }    

    function updateAction(){
      $id = $_POST["id"];

      $query_fields = ['name'=>$_POST["name"], 'stock'=>$_POST["stock"], 'price'=>$_POST["price"], 'image'=>$_POST["image"], 'description'=>$_POST["description"],'category_id'=> $_POST["category_id"] ];
        
      var_dump($query_fields);
      $success = (new Product)->update($id, $query_fields); 
      $this->redirect('/admin/product/edit?success=true&id='.$id); 
  
        
    }    



}
