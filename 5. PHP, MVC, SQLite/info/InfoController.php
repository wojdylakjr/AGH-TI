<?php
 
namespace info ;
 
use appl\ { View, Controller } ;
// use appl\Controller ;
 
class InfoController extends Controller {
 
   protected $layout ;
   protected $model ;
 
   function __construct() {
    parent::__construct();
    $this->layout = new View('main') ;
    $this->layout->css = $this->css ;
    $this->layout->title  = 'Glowna' ;
  

    if($this->_is_logged()){
      
      $this->menu = file_get_contents ('template/logged_menu.tpl') ;
      $this->layout->menu = $this->menu ;
    }
    else{
      $this->menu = file_get_contents ('template/menu.tpl') ;
      $this->layout->menu = $this->menu ;
    }
   }
 
  function index() {
      $this->layout->header  = 'Simple MVC HEADER FUN INDEX' ;
    //   $this->layout->header  = $_SESSION['auth'];
      $this->layout->content = 'Template - test  CONTENT!' ;
      $this->layout->content = $this->_is_logged() ;
      return $this->layout ;
  }
 
  function help() {
      $this->model = new InfoModel();
      $this->layout->header  = 'Simple MVC HEADER FUN HELP' ;
      $this->view = new View('table') ;
      $this->view->data = $this->model->getTable() ;
      $this->layout->content = $this->view ;
      return $this->layout ;
  }
 
  function error( $text ) {
      $this->layout->content = $text ;
      return $this->layout ;       
  }
}
 
?>