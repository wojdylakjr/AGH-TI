<?php
interface NoteInterface {
   /*  
    *   Metoda  _read()
    *       Odczyt danych przes�anych z formularza
    */
   function _read() ;
   /*  
    *   Metoda  _save_messages()
    *    Zapis przes�anej informacji na serwer w pliku notes.db 
    *    bazy Berkeley DB:
    *    klucz (e-mail&znacznik czasowy) => warto��(informacja) 
   */  
   function _save_messages() ;
   /*  
    *   Metoda  _read_messages()
    *    Odczyt wszystkich informacji dla danego u�ytkownika 
    *    z  bazy Berkeley DB:
    *    - klucz (e-mail&znacznik czasowy) => warto��(informacja) 
   */  
   function _read_messages() ;
   }
   
?>   