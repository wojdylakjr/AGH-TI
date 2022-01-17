<?php
interface NoteInterface {
   /*  
    *   Metoda  _read()
    *       Odczyt danych przes³anych z formularza
    */
   function _read() ;
   /*  
    *   Metoda  _save_messages()
    *    Zapis przes³anej informacji na serwer w pliku notes.db 
    *    bazy Berkeley DB:
    *    klucz (e-mail&znacznik czasowy) => wartoœæ(informacja) 
   */  
   function _save_messages() ;
   /*  
    *   Metoda  _read_messages()
    *    Odczyt wszystkich informacji dla danego u¿ytkownika 
    *    z  bazy Berkeley DB:
    *    - klucz (e-mail&znacznik czasowy) => wartoœæ(informacja) 
   */  
   function _read_messages() ;
   }
   
?>   