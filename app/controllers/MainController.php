<?php
    final class MainController extends Controller
    {
        public function __construct()
        {
            $this->view = new View();
        }

        public function index()
        {	
            return $this->view->generate('main.php', 'template.php');
        }

        public function home()
        {
            return $this->view->generate('home.php', 'template.php');
        }
    }