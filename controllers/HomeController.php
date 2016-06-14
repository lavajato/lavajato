<?php
 
 namespace senac\lavajato\controllers;

class HomeController extends Controller {

    public function __construct() {

    }

    public function index() {
        return parent::View("home\\index.php");
    }
}

?>