<?php
 
namespace info ;
 
class InfoModel 
{
 
   private $table = array() ;
 
   function __construct() {
      $this->table['main'] = '/ , /index.php, /index.php?sub=InfoController, /index.php?sub=InfoController&action=main' ;
      $this->table['info'] = '/index.php?sub=InfoController&action=help' ;
      $this->table['list'] = '/index.php?sub=Baza, /index.php?sub=Baza&action=list' ;
      $this->table['form'] = '/index.php?sub=Baza&action=form' ;      
   }
 
   function getTable() {
     return $this->table ;
   }
 
}
 
?>