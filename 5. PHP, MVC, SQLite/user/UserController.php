<?php

namespace user;

use appl\{View, Controller};

class UserController extends Controller
{
    protected $layout;
    protected $model;

    function __construct()
    {
        parent::__construct();
        $this->layout = new View("main");
        $this->layout->css = $this->css;
        $this->layout->title = "Logowanie/Rejestracja";

        if ($this->_is_logged()) {
            $this->menu = file_get_contents("template/logged_menu.tpl");
            $this->layout->menu = $this->menu;
        } else {
            $this->menu = file_get_contents("template/menu.tpl");
            $this->layout->menu = $this->menu;
        }
        $this->model = new UserModel();
    }

    function register()
    {
        $this->layout->header = "Rejestrowanie w serwisie";
        $this->view = new View("register_form");
        $this->layout->content = $this->view;
        return $this->layout;
    }

    function logout()
    {
        if ($this->_is_logged()) {
            unset($_SESSION);
            session_destroy();
            $text = "Uzytkownik wylogowany ";
            $this->layout->header = "Wylogowano z serwisu";
            return $this->layout;
        } else {
            $this->layout->header = "Nie jestes zalogowany";
            return $this->layout;
        }
    }

    function saveUser()
    {
        $data = $_POST["data"];
        $obj = json_decode($data);
        $pass = md5($obj->pass);
        $obj->pass = $pass;
        if (
            isset($obj->fname) and
            isset($obj->lname) and
            isset($obj->email) and
            isset($obj->pass)
        ) {
            $response = $this->model->saveUser($obj);
        }
        return $response ? "Dodano rekord" : "Blad ";
    }

    function login()
    {
        if (!$this->_is_logged()) {
            $this->layout->header = "Logowanie w serwisie";
            $this->view = new View("login_form");
            $this->layout->content = $this->view;
            return $this->layout;
        } else {
            $this->layout->header = "Jestes zalogowany";
            return $this->layout;
        }
    }

    function checkLogin()
    {
        $data = $_POST["data"];

        $obj = json_decode($data);
        if (isset($obj->email) and isset($obj->pass)) {
            $response = $this->model->login($obj);
        }
        return $response ? "Zalogowano" : "Nie zalogowano ";
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
