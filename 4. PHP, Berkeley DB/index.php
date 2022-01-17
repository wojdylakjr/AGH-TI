<?php
 
function __autoload($class_name) {
    include $class_name . '.php' ;
}
 
$user = new Register_new;
 

if ( ! $user->_is_logged() )
  { 
     echo "<p><a href='zad04reg.html'>Rejestracja w serwisie</a></p>";
     echo "<p><a href='zad04log.html'>Logowanie do serwisu</a></p>";

  } 
else
  {
     echo "<p><a href='zad04user.php'>Dane uzytkownika</a></p>" ;
     echo "<p><a href='zad04all.php'>Zarejestrowani uzytkownicy</a></p>" ;
     echo "<p><a href='zad04new_note.html'>Dodaj nowy wpis</a></p>" ;
     echo "<p><a href='zad04post_read.php'>Twoje wpisy</a></p>" ;
     echo "<p><a href='zad04post_read_all.php'>Wpisy wszystkich uzytkownikow</a></p>" ;
     echo "<p><a href='zad04out.php'>Wylogowanie z serwisu</a></p>" ;
      
  }

?>