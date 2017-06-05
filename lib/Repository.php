<?php
namespace Library;

class Repository {
  protected $table = NULL;
  protected $manager = NULL;

  protected $database = NULL;

  public function __construct($table=null,$manager=null){
    if(NULL === $table) $table = strtolower(basename(str_replace('\\','/',get_class($this))));
    if(NULL === $this->table) $this->table = $table;

    if(NULL === $this->manager) $this->manager = $manager;
    $this->database = new Database($this->manager);
  }

  public function create(array $data){
    $conn = $this->database->getConnection();
    $fields = array_keys($data);
    $fields = '`'.implode('`,`', $fields).'`' ;
    $values = [];
    foreach(array_values($data) as $val){
      $values[] = $conn->quote($val);
    }
    $values = implode(",",$values);
    $sql = "INSERT INTO $this->table($fields) VALUES ($values)";
    $conn->exec($sql);
  }

  public function update($id, $data){
    $id = (int)$id;
    $conn = $this->database->getConnection();
    $fields = array_keys($data);
    foreach(array_values($data) as $key => $val){
      $set[] = '`'.$fields[$key]."`=".$conn->quote($val);
    }
    $set = implode(',', $set);
    $sql = "UPDATE $this->table SET $set WHERE id=$id";
    $conn->exec($sql);
  }

  public function delete($id){
    $id = (int)$id;
    $conn = $this->database->getConnection();
    $sql = "DELETE FROM $this->table WHERE id=$id";
    $conn->exec($sql);
  }

  public function select($fields, $where=NULL, $orderby=NULL, $having=NULL, $limit=NULL){
    $conn = $this->database->getConnection();
    if($fields != '*') $fields = '`'.implode('`,`', $fields).'`' ;
    $sql = "SELECT $fields FROM $this->table";
    if($where !== NULL) $sql .= " WHERE $where";
    if($orderby !== NULL) $sql .= " ORDER BY $orderby";
    if($having !== NULL) $sql .= " HAVING $having";
    if($limit !== NULL) $sql .= " LIMIT $limit";

    return $conn->query($sql, \PDO::FETCH_ASSOC);
  }

  public function getLastId(){
      return $this->database->getConnection()->lastInsertId();
  }

  public function customQuery($sql) {
    $conn = $this->database->getConnection();
    return $conn->query($sql);
  }

  public function getAll() {
    $conn = $this->database->getConnection();
    return $conn->query("select * from $this->table");
  }  

}
