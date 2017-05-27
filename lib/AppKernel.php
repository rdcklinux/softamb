<?php
namespace Library;

class AppKernel {
  private $module = 'root';
  private $controller = 'default';
  private $action = 'index';

  public function __construct(){
    session_start();
    $path = explode('/',@$_SERVER['PATH_INFO']);
    $this->module = ucfirst(!empty($path[1])?$path[1]:'root');
    $this->controller = ucfirst(!empty($path[2])?$path[2]:'default');
    $this->action=(!empty($path[3])?$path[3]:'index');
    $this->config = new Config();
  }

  protected function loadAction(){
    $firewall = $this->config->getParameters()['firewall'];
    if($firewall['module'] == $this->module){
        if(! empty($_SESSION[$firewall['session']]) ){
            if($_SESSION[$firewall['session']][$firewall['param']] != $firewall['value']){
                throw new AccessDeniedException;
            }
        } else {
            throw new AccessDeniedException;
        }
    }
    $class = "Controller\\{$this->module}\\{$this->controller}Controller";
    $method = "{$this->action}Action";
    if(!class_exists($class) || !method_exists($class, $method) ){
        throw new NotFoundException;
    }
    if(property_exists($class, 'template')){
        $this->template = $class::$template;
    }
    return (new $class)->$method();
  }

  protected function loadView($action){
    if(!empty($action)){
        extract($action);
    }
    $this->view = "../view/$this->module/$this->controller/$this->action.html.php";
    $render = $this->view;
    if(isset($this->template)){
        $render = '../view/'. $this->template;
    }
    include($render);
  }

  public function run(){
    try {
        $this->loadView($this->loadAction());
    } catch(NotFoundException $e){
        echo "404 - Not Found.";
    } catch(AccessDeniedException $e){
        echo "403 - Access denied.";
    } catch(\Exception $e) {
        echo "<pre>";
        echo '<h1>Exception:</h2>';
        echo '<h2>',$e->getMessage(),'</h2>';
        echo '<h2>Trace:</h2>';
        foreach($e->getTrace() as $trace){
            $args = str_replace(["\n",'  '],['',''],print_r($trace['args'],true));
            echo "$trace[file]:$trace[line] $trace[class]::$trace[function]($args)<br/>";
        }
        echo "</pre>";
    }
  }
}
