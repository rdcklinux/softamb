<?php
namespace Controller\Backend;

use Library\Controller;
use Model\Entity\Category;
use Model\Entity\Product;


class CategoryController extends Controller {
    static $template = 'Layout/base.html.php';

    function indexAction() {

      $category = new Category;
      $categories = $category->select(["name", "id"]);

      return ["categories" => $categories, "title"=>"Listado Categorias"];

    }

    function newAction(){
      return ['title' => "Ingresar Nueva Categoria"];
    }

    function createAction(){
      $nombre_categoria = $_POST["name"];

      $category = new Category;
      $category->create(['name'=>$nombre_categoria ]);
      $this->redirect('/admin/category');
      return ["title" => "Listado Categorias"];
    }

    function deleteAction(){
      $category_id = $_GET["id"];

      $category = new Category;
      $category->delete($category_id);
      $this->redirect('/admin/category?success=true');
    }

    // Vista Temporal Categorias hasta que unamos todo el codigo en una vista
    function showAction(){
      $category = new Category;
      $categories = $category->select(["nombre", "id"]);
      $c2 =$category->select(["nombre", "id"]);

      return ["categories" => $categories, "c2" => $c2 , "title"=>"Listado Categorias"];
    }

}
