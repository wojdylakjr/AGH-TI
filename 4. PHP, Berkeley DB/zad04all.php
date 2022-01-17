<?php
 
function __autoload($class_name) {
    include $class_name . '.php' ;
}
 
$user = new Register_new ;
 
if ( $user->_is_logged() ) { 
   $table = $user->_read_all();
   echo "<table><tr><th>Imie</th><th>Nazwisko</th><th>E-mail</th></tr>" ;
   foreach ( $table as $key => $record ) {
     echo "<tr><td>".$record['fname']."</td><td>".$record['lname']."</td><td>".$record['email']."</td><tr>";
   }
   echo "</table>" ;
   echo "<p><a href='index.php'>Powrot do programu glownego</a></p>";
}
 
?>