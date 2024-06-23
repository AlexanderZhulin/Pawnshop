<?php
	final class AuthController extends Controller
	{
		public function __construct()
        {
            $this->model = new Auth();
            $this->view = new View();
        }

        public function login()
        {
            session_start();
            if (!empty($_POST))
            {
                $login = $_POST['login'];
                $passwd = $_POST['passwd'];
                $this->model->login($login, $passwd);
            }
        }

        public function exit()
        {
            session_start();
            session_destroy();
            header("Location: http://{$_SERVER['HTTP_HOST']}/");
        }

        public function fillFormAddUser()
        {
            $data = $this->model->selectRoles();
            return $this->view->generate('add_user.php', 'template.php', $data);
        }

        public function addUser()
        {
            session_start();
            $data = $_POST;
            
            if ($data['pass1'] != $data['pass2'])
            {
                $_SESSION['change-passwd'] = false;
                header("Location: http://{$_SERVER['HTTP_HOST']}/add-user");
            }
            else
            {
                $dt = [];
        
                foreach ($data as $key => $elem)
                    if ($key != "pass1" and $key != "pass2") {
                        $if = ($key != 'pass1' or $key != 'pass2');
                        echo "$if $key => $elem<br>";
                        $dt[$key] = $elem;
                    }
                
                $dt['passwd'] = $data['pass1'];
                $this->model->addUser($dt);
                header("Location: http://{$_SERVER['HTTP_HOST']}/user");
            }
        }

        public function fillFormDeleteUser()
        {
            return $this->view->generate('delete_user.php', 'template.php');
        }

        public function deleteUser()
        {
            $data = $_POST;
            // echo var_dump($data);
            // $data = $this->model->selectWhere('users', [0 =>'id'], $data);
            // $data = $data[0];
            // echo var_dump($data);
            $this->model->deleteUser($data);
            header("Location: http://{$_SERVER['HTTP_HOST']}/user");
        }

        public function selectUsers()
        {
            $data = $this->model->select();
            // echo var_dump($data);
            return $this->view->generate('query.php', 'template.php', $data);
        }

        public function user()
        {
            return $this->view->generate('user.php', 'template.php');
        }

        public function formChangePassword()
        {
            return $this->view->generate('passwd.php', 'template.php');
        }

        public function сhangePassword()
        {
            session_start();
            $data = $_POST;
            if ($data['pass1'] != $data['pass2'])
            {
                $_SESSION['change-passwd'] = false;
                header("Location: http://{$_SERVER['HTTP_HOST']}/change-passwd");
            }
            else
            {
                $passwd = $data['pass1'];
                $data = [];
                $data['login'] = $_SESSION['username'];
                $data['passwd'] = $passwd;
                $data['id_role'] = $_SESSION['role'];
                $this->model->updatePassword($data);
                // echo var_dump($data)."<br>";
                header("Location: http://{$_SERVER['HTTP_HOST']}/user");
            }
        }
	}