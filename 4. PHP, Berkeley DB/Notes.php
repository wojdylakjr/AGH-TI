<?php
 
class Notes implements NoteInterface {

   private $dbh;
   private $dbfile = "files/notes.db" ;
   
    function __autoload($class_name) {
    include $class_name . '.php' ;
}
 
   private $note ;
   private $email = "Testowy_mail";

 
   function __construct () { 
   }
   
   
   function _read(){
      $this->note = $_POST['text'] ;
      //echo "dziala funkcja w Notes.php w metodzie read";
      // echo "<br>";
      // echo "" . $this->note . "to jest notatka napisana prez " . $_SESSION['user'];
       
                     
   }
   
   
   function _save_messages(){
  // echo "<br>dziala funkcja w Notes.php w metodzie save messeges";
  // echo "<br> godzina dodania:";
  // echo $_SERVER[REQUEST_TIME];
  // echo"<br>";
         $this->dbh = dba_open( $this->dbfile, "c");
         $serialized_data = serialize($this->note) ;
         $key = "". $_SESSION['user'] . " ". $_SERVER[REQUEST_TIME];
     //    echo "<br>";
    //     echo "klucz:" . $key; 
    //      echo "<br>";
         dba_insert($key,$serialized_data, $this->dbh);
         $text = 'Dane zostaly zapisane' ;
      
      
      dba_close($this->dbh) ;
      return $text;
   
   }
   
   
   function _read_messages(){
      $this->dbh = dba_open( $this->dbfile, "r");   
      $key = dba_firstkey($this->dbh);

       echo "<h2>Wpisy uzytkownika: ". $_SESSION['user'] . " </h2>";
      while ($key) {
      $key_array = explode(" ", $key);
      $email = $key_array[0];
      $time = $key_array[1];
     if($email ==  $_SESSION['user']) {
      $serialized_data = dba_fetch($key, $this->dbh) ;
         $text = unserialize($serialized_data);
         echo "Godzina wpisu: ";
      echo date("Y-m-d H:i:s", $time);
       echo "<br>";
      echo $text;

      echo "<br>--------------------------------------------------------------<br>";
      }
      $key = dba_nextkey($this->dbh);
      }    
      dba_close($this->dbh) ;  
      
   }
   
      
   function _read_all_messages(){
   echo "<h2>Wpisy uzytkownikow</h2>";
      $this->dbh = dba_open( $this->dbfile, "r");   
      $key = dba_firstkey($this->dbh);
      while ($key) {
      $key_array = explode(" ", $key);
      $email = $key_array[0];
      $time = $key_array[1];
     // echo "To jest funckja read messeages i pierwszy klucz: ";
     // echo $key;
      $serialized_data = dba_fetch($key, $this->dbh) ;
         $text = unserialize($serialized_data);
         echo "Godzina wpisu: ";
      echo date("Y-m-d H:i:s", $time);
       echo "<br>";
      echo $text;
      echo "<br>Dodany przez: ";
      echo $email;
      
      echo "<br>--------------------------------------------------------------<br>";
      $key = dba_nextkey($this->dbh);
      }    
      dba_close($this->dbh) ;  
      
   }
}
?>