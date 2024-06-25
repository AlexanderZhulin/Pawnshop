<?php
	final class Auth extends Model
	{
		private $loggedIn = false;

		public function login($login, $passwd)
		{
	    	$data = $this->selectM('users', ['login', 'passwd', 'id_role']);

	    	foreach ($data as $elem)
	    	{
		    	if ($elem['login'] === $login and password_verify($passwd, $elem['passwd']))
    			{
		    		$this->loggedIn = true;
		      		$_SESSION['loggedIn'] = true;
		      		$_SESSION['username'] = $elem['login'];
		      		$_SESSION['role'] = $elem['id_role'];
		      		header('Location: http://' . $_SERVER['HTTP_HOST'] . '/home');
		    	}
	    	}
	    	if (empty($_SESSION))
	    		header('Location: http://' . $_SERVER['HTTP_HOST'] . '/');
	  	}

	  	public function selectRoles()
	  	{
	  		return $this->selectM('roles', [0  => 'name_role', 1 => 'id']);
	  	}

		public function checkAccess()
		{
		    if (!isset($_SESSION['loggedIn']))
		    {
		    	header('Location: http://' . $_SERVER['HTTP_HOST'] . '/');
		      	exit;
		    }
		}

		public function getUsername()
		{
			return "<h4>Пользователь {$_SESSION['username']}</h4>";
		}

		public function addUser($data)
		{
			$data['passwd'] = password_hash($data['passwd'], PASSWORD_DEFAULT);
			$this->insertM('users', $data);
		}

		// Проверка наличия записи в таблице
        private function checkExistence($record, $table)
        {
            $other = $this->selectM($table);

            foreach ($other as $elem)
            {
                $id = $elem['id'];
                unset($elem['id']);
                unset($elem['passwd']);
                unset($record['passwd']);

                if ($elem == $record)
                    return $id;
            }

            return null;
        }

		public function updatePassword($data)
		{
			$id = $this->checkExistence($data, 'users');
			$data['passwd'] = password_hash($data['passwd'], PASSWORD_DEFAULT);
			// echo $data['passwd'];
        	// echo "<br>";
            if (is_null($id))
            {
                header("Location: http://{$_SERVER['HTTP_HOST']}/home");
            }
            $data['id'] = $id;
			$this->updateM('users', $data);	
		}

		public function deleteUser($data)
		{
			$this->deleteM('users', $data);
		}		

		private function replaceID($key, $elem)
        {
            if ($key == 'id_role')
            {
                $atr = ['name_role'];
                $dt = ['id' => $elem];
                $dt = $this->selectWhere('roles', $atr, $dt);
                $dt = $dt[0]['name_role'];
                return $dt;
            }
	        else
	        {
	        	return $elem;
	        }
        }

        public function select()
        {
        	$atr = [0 => 'id', 1 => 'login', 2 => 'id_role'];
            $data = $this->selectM('users', $atr);
            // echo var_dump($data);
            foreach ($data as $k => $elem) 
                foreach ($elem as $key => $el)
                    $data[$k][$key] = $this->replaceID($key, $el);
            return $data;
        }
	}