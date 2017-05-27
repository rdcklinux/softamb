<?php
spl_autoload_register(function($element){
    $paths = [
        'Library'=>'../lib',
        'Model' => '../model',
        'Controller' => '../controller',
    ];
    $route = explode('\\',$element);
    $context = array_shift($route);
    $filepath = $paths[$context];
    foreach($route as $item){
        $filepath .= '/'.$item;
    }
    $filename = $filepath . '.php';
    if(file_exists($filename)){
        include_once($filename);
    }
});
