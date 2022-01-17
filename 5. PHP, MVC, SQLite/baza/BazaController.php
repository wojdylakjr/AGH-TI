<?php

namespace baza;

use appl\{View, Controller};

class BazaController extends Controller
{
    protected $layout;
    protected $model;

    function __construct()
    {
        parent::__construct();
        $this->layout = new View("main");
        $this->layout->css = $this->css;
        $this->layout->title = "Baza danych SQL";

        if ($this->_is_logged()) {
            $this->menu = file_get_contents("template/logged_menu.tpl");
            $this->layout->menu = $this->menu;
        } else {
            $this->menu = file_get_contents("template/menu.tpl");
            $this->layout->menu = $this->menu;
        }
        $this->model = new BazaModel();
    }

    function listAll()
    {
        if ($this->_is_logged()) {
            $this->layout->header = "Lista wszystkich rekordow";
            $this->view = new View("listAll");
            $this->view->data = $this->model->listAll();
            $this->layout->content = $this->view;
            return $this->layout;
        } else {
            $this->layout->header = "Nie jestes zalogowany";
            return $this->layout;
        }
    }

    function insertRec()
    {
        if ($this->_is_logged()) {
            $this->layout->header = "Wprowadzanie danych do bazy";
            $this->view = new View("form");
            $this->layout->content = $this->view;
            return $this->layout;
        } else {
            $this->layout->header = "Nie jestes zalogowany";
            return $this->layout;
        }
    }

    function saveRec()
    {
        $data = $_POST["data"];
        $obj = json_decode($data);
        if (isset($obj->fname) and isset($obj->lname) and isset($obj->city)) {
            $response = $this->model->saveRec($obj);
        }
        return $response ? "Dodano rekord" : "Blad ";
    }

    function info($text)
    {
        $this->layout->content = $text;
        return $this->layout;
    }

    function index()
    {
        return $this->layout;
    }
}

?>
