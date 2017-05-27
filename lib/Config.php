<?php
namespace Library;

class Config {
    private $config;

    public function __construct(){
         $this->config = \parse_ini_file('../config/config.ini',true);
    }

    public function getParameters(){
        return  $this->config;
    }
}
