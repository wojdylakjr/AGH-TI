<?php

namespace user;
use PDO;

class UserModel
{
    private $dbh;
    // private $dbfile = __DIR__. '/' . 'sql/' .'datadb.db';
    private $dbfile = "sql/datadb.db";

    function __construct()
    {
        session_start();
    }

    public function saveUser($obj)
    {
        $this->dbh = dba_open($this->dbfile, "c");
        if (!dba_exists($obj->email, $this->dbh)) {
            $serialized_data = json_encode($obj);
            dba_insert($obj->email, $serialized_data, $this->dbh);
            $resp = true;
        } else {
            echo "Dane dla podanego adresu e-mail sa w bazie danych";
            $resp = false;
        }
        dba_close($this->dbh);
        return $resp;
    }

    public function login($obj)
    {
        $arr = [];
        $access = false;
        $this->dbh = dba_open($this->dbfile, "r");
        if (dba_exists($obj->email, $this->dbh)) {
            $serialized_data = dba_fetch($obj->email, $this->dbh);
            $arr = json_decode($serialized_data);

            if ($arr->{"pass"} == md5($obj->pass)) {
                $_SESSION["auth"] = "OK";
                $_SESSION["user"] = $obj->email;
                $access = true;
            }
        }
        dba_close($this->dbh);
        $text = $access
            ? "Uzytkownik zalogowany"
            : " Uzytkownik nie zalogowany ";
        return $access;
    }
}

?>
