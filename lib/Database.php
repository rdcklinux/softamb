<?php
namespace Library;

use Library\Config;

class Database {
  private $connection = NULL;
  private $config;

  public function __construct(){
      $this->config = new Config();
  }

  public function getConnection($name='default'){
    $params = $this->config->getParameters()['database_'.$name];

    if($this->connection === NULL) {
      $data = [
        'dbname'=>$params['database'],
        'host'=>$params['host'],
        'port'=>$params['port'],
        'charset'=>'utf8',
      ];
      $arrayConn=[];
      foreach($data as $key=>$value){
        $arrayConn[]="$key=$value";
      }
      $dsn = $params['engine'].':'.implode(';', $arrayConn);
      $this->connection = new \PDO($dsn, $params['user'], $params['password']);
    }

    return $this->connection;
  }

}
