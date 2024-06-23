<?php
    final class DBController extends Controller
    {
        public $table;

        public function __construct()
        {
            $route = explode('/', $_SERVER['REQUEST_URI']);

            if ($route[1] == "table")
            {
                $route[2] = str_replace("-", "_", $route[2]);
                $this->table = $route[2];
            }
            
            $this->model = new DBModel();
            $this->view = new View();
        }

        public function index()
        {
            $data = $this->model->select($this->table);
            $this->view->generate('select.php', 'template.php', $data, $this->table);
        }

        public function fillFormAdd()
        {
            $flag = 1;
            $this->view->generate('update.add.php', 'template.php', null, $this->table, $flag);
        }

        public function add()
        {
            $data = $_POST;
            unset($data[$this->table]);
            $this->model->insert($this->table, $data);
            $this->table = str_replace("_", "-", $this->table);
            header("Location: http://" . $_SERVER['HTTP_HOST'] . "/table/$this->table");
        }

        public function fillFormDelete()
        {
            $data =  $this->model->select($this->table);
            $this->view->generate('delete.php', 'template.php', $data, $this->table);
        }

        public function delete()
        {
            $data = $_POST;
            echo var_dump($data);
            unset($data[$this->table]);
            $this->model->delete($this->table, $data);
            $this->table = str_replace("_", "-", $this->table);
            header("Location: http://" . $_SERVER['HTTP_HOST'] . "/table/$this->table");
        }

        public function fillFormUpdate()
        {
            $flag = 0;
            $data =  $this->model->select($this->table);
            $this->view->generate('update.add.php', 'template.php', $data, $this->table, $flag);
        }

        public function update()
        {
            $data = $_POST;
            unset($data[$this->table]);

            foreach ($data as $key => $elem)
                if (empty($elem))
                    unset($data[$key]);

            $this->model->update($this->table, $data);
            $this->table = str_replace("_", "-", $this->table);
            header("Location: http://{$_SERVER['HTTP_HOST']}/table/$this->table");
        }

        public function formFirstQuery()
        {
            $this->view->generate('first_query.php', 'template.php');
        }

        public function firstQuery()
        {
            $data = $_POST;
            $data = $this->model->query1($data);
            $this->view->generate('query.php', 'template.php', $data);
        }

        public function formSecondQuery()
        {
            $this->view->generate('second_query.php', 'template.php');
        }

        public function secondQuery()
        {
            $data = $_POST;
            $data = $this->model->query2($data);
            $this->view->generate('query.php', 'template.php', $data);
        }

        public function fillFormRegisterDelivery()
        {
            $data = $this->model->selectCategory();
            $this->view->generate('registration_delivery.php', 'template.php', $data);
        }

        public function registerDelivery()
        {
            $data = $_POST;
            $this->model->addDelivery($data);
            header("Location: http://pawnshop/home");
        }
    }