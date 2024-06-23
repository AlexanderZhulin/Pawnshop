<?php
    class Model
    {
        public $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        private function checkAttributesSelect($table, $data)
        {
            if (is_null($data))
            {
                return "SELECT * FROM $table";
            }
            else
            {
                $sql = "SELECT";

                foreach ($data as $elem)
                    $sql .=" $elem,";
                
                $sql = substr_replace($sql, " ", -1);
                $sql .= "FROM $table";
                return $sql;
            }
        }

        // Метод SELECT $table - название таблицы, $data - массив атрибутов
        public function selectM($table, $data=null)
        {
            $sql = $this->checkAttributesSelect($table, $data);

            $sth = $this->db->pdo->prepare($sql);
            
            try
            {
                $sth->execute();
                $array = $sth->fetchAll(PDO::FETCH_ASSOC);
                return $array;
            }
            catch (PDOException $e)
            {
                session_start();
                $_SESSION['message'] = "Ошибка выполнения запроса:<br>" . $e->getMessage();
            }
        }

        // Метод SELECT c WHERE 
        public function selectWhere($table, $attributes, $data)
        {
            $sql = $this->checkAttributesSelect($table, $attributes);
            $sql .= " WHERE";

            foreach ($data as $key => $elem)
            {
                $sql .= " $key = :$key,";
            }

            $sql = substr_replace($sql, "", -1);
            $sth = $this->db->pdo->prepare($sql);

            try
            {
                $sth->execute($data);
                $array = $sth->fetchAll(PDO::FETCH_ASSOC);
                return $array;
            }
            catch (PDOException $e)
            {
                session_start();
                $_SESSION['message'] = "Ошибка выполнения запроса:<br>" . $e->getMessage();
            }
        }

        // Метод INSERT $table - название таблицы, $data - ассоциативный массив
        public function insertM($table, $data)
        {
            $sql = "INSERT INTO $table (";
            $str = "VALUES (";
            foreach ($data as $key => $elem)
            {
                $sql .= " $key,";
                $str .= " :$key,";
            }
            $sql = substr_replace($sql, " ) ", -1);
            $str = substr_replace($str, " )", -1);
            $sql .= $str;
            $sth = $this->db->pdo->prepare($sql);

            try
            {
                $sth->execute($data);
            }
            catch (PDOException $e)
            {
                session_start();
                $_SESSION['message'] = "Ошибка выполнения запроса:<br>" . $e->getMessage();
            }
        }

        // Метод DELETE $table - название таблицы, $data - ассоциативный массив
        public function deleteM($table, $data)
        {
            $sql = "DELETE FROM $table WHERE";

            foreach ($data as $key => $elem)
            {
                $sql .= " $key = :$key,";
            }
            $sql = substr_replace($sql, " ", -1);
            // echo $sql;

            $sth = $this->db->pdo->prepare($sql);

            try
            {
                $sth->execute($data);
            }
            catch (PDOException $e)
            {
                echo "Ошибка выполнения запроса:<br>" . $e->getMessage();
            }
        }

        // Метод UPDATE $table - название таблицы, $data - ассоциативный массив
        public function updateM($table, $data)
        {
            $sql = "UPDATE $table SET";
            $str = "";

            foreach ($data as $key => $elem)
            {
                if (!empty($elem) and $key != "id")
                    $sql .= " $key = :$key,";
                if ($key == "id")
                {
                    $str .= "WHERE $key = :$key";
                }
            }

            $sql = substr_replace($sql, " ", -1);
            $sql .= $str;

            $sth = $this->db->pdo->prepare($sql);

            try 
            {
                $sth->execute($data);
            } 
            catch (PDOException $e)
            {
                session_start();
                $_SESSION['error'] = "Ошибка выполнения запроса: " . $e->getMessage();
            }
        }
    }