<?php
 
function __autoload($class_name) {
    include $class_name . '.php' ;
}
 
$user = new Register_new ;
$note = new Notes ;
 
if ( $user->_is_logged() ) { 
   //echo "dziala, printuje login";
  // echo "<br>";
   //echo "".$_SESSION['user'];
   //echo "   to ma byc email <br><br>";

   $note->_read();
   echo $note->_save_messages();
   echo "<p><a href='index.php'>Powrot do programu glownego</a></p>";
}
else{
echo "Aby dodac wpis muisisz byc zalogowany.";
   
  // echo "<br>";
   
   //  echo "".$_SESSION['user'];
  // echo "   to ma byc email <br><br>";

  // $note->_read();
  // echo $note->_save_messages();

}
 
?>