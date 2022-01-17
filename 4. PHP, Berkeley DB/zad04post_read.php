<?php
 
function __autoload($class_name) {
    include $class_name . '.php' ;
}
 
$user = new Register_new ;
$note = new Notes ;
 
 
if ( $user->_is_logged() ) { 
  // echo "dziala <br>";
   $note->_read_messages();
   echo "<p><a href='index.php'>Powrot do programu glownego</a></p>";
}
else{
echo "Aby zobaczyc wpisy muisisz byc zalogowany.";
}
 
?>