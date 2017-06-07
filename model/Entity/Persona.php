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

    public function getCargas($id){
        $sql = "SELECT p.* FROM carga c JOIN persona p ON c.carga_id = p.id AND c.persona_id = $id";
        return $this->customQuery($sql);
    }

}
