<?php
namespace Model\Entity;

use Library\Repository;

class Persona extends Repository {
  protected $table ='persona';

  public function getName(){
    return "Nombre de Usuario";
  }

   public function getOnePersonaById($id){
     $rows = $this->select(['rut','password','nombre','apellido','fecha_nacimiento', 'direccion', 'contacto', 
                         'activo', 'gestor', 'cliente'], "id=$id");
     return $rows->fetch();
	}

}