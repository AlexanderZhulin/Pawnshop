<?php

    final class DBModel extends Model
    {
        public function __construct()
        {
            $this->db = new Database();
        }

        private function replaceID($key, $elem)
        {               
            switch ($key) 
            {
                case 'id_customer':
                    $atr = ['id', 'surname', 'name', 'second_name'];
                    $dt = ['id' => $elem];
                    $dt = $this->selectWhere('customers', $atr, $dt);
                    $dt = "{$dt[0]['id']}: {$dt[0]['surname']} {$dt[0]['name']} {$dt[0]['second_name']}";
                    return $dt;
                    break;

                case 'id_product_category':
                    $atr = ['id', 'name'];
                    $dt = ['id' => $elem];
                    $dt = $this->selectWhere('product_category', $atr, $dt);
                    $dt = "{$dt[0]['id']}: {$dt[0]['name']}";
                    return $dt;
                    break;
                
                case 'id_pawnshop_delivery':
                    $atr = ['id', 'amount'];
                    $dt = ['id' => $elem];
                    $dt = $this->selectWhere('pawnshop_delivery', $atr, $dt);
                    $dt = "{$dt[0]['id']}: {$dt[0]['amount']}";
                    return $dt;
                    break;

                default:
                    return $elem;
                    break;
            }
        }

        public function select($table)
        {
            $data = $this->selectM($table);

            foreach ($data as $k => $elem) 
                foreach ($elem as $key => $el)
                    $data[$k][$key] = $this->replaceID($key, $el);
            return $data;
        }

        public function selectCategory()
        {
            return $this->select('product_category');
        }

        public function insert($table, $data)
        {
            $this->insertM($table, $data);
        }

        public function delete($table, $data)
        {
            $this->deleteM($table, $data);
        }

        public function update($table, $data)
        {
            $this->updateM($table, $data);
        }

        public function query1($data)
        {
            $sql = "
                SELECT
                    cs.name AS \"Имя\",
                    cs.surname AS \"Фамилия\",
                    SUM(pd.amount) AS \"Общая сумма\",
                    COUNT(pd.id) AS \"Кол-во сдач\"
                FROM
                    pawnshop_delivery pd
                    JOIN customers cs ON pd.id_customer = cs.id
                WHERE
                    cs.surname = '{$data['surname']}'
                    AND cs.name = '{$data['name']}'
                    AND cs.second_name = '{$data['second_name']}'
                    AND pd.date_of_delivery >= DATE '{$data['start_date']}'
                    AND pd.date_of_delivery < DATE '{$data['end_date']}'
                GROUP BY
                    cs.name,
                    cs.surname
            ";

            try 
            {
                $sth = $this->db->pdo->prepare($sql);
                $sth->execute();
                $result = $sth->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
            catch (PDOException $e)
            {
                echo "Ошибка выполнения запроса: " . $e->getMessage();
            }
        }

        public function query2($data)
        {
            $sql = "
                SELECT
                    cs.surname AS \"Фамилия\",
                    cs.name AS \"Имя\",
                    cs.second_name AS \"Отчество\",
                    pc.name AS \"Категория товара\",
                    COUNT(pd.id) AS \"Кол-во\"
                FROM
                    customers cs
                    JOIN pawnshop_delivery pd ON cs.id = pd.id_customer
                    JOIN product_category pc ON pd.id_product_category = pc.id
                WHERE
                    pd.date_of_delivery >= DATE '{$data['start_date']}'
                    AND pd.date_of_delivery < DATE '{$data['end_date']}'
                GROUP BY
                    cs.name,
                    cs.surname,
                    cs.second_name,
                    pc.name
                HAVING
                    COUNT(DISTINCT pd.id_product_category) = 1
            ";

            try 
            {
                $sth = $this->db->pdo->prepare($sql);
                $sth->execute();
                $result = $sth->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
            catch(PDOException $e)
            {
                echo "Ошибка выполнения запроса: " . $e->getMessage();
            }
        }

        // Проверка наличия записи в таблице
        private function checkExistence($record, $table)
        {
            $other = $this->selectM($table);
            
            foreach ($other as $elem)
            {
                $id = $elem['id'];
                unset($elem['id']);
                if ($elem == $record)
                    return $id;
            }

            return null;
        }

        // Оформление сдачи в ломбард
        public function addDelivery($data)
        {
            $pc = 'product_category';
            $c = 'customers';

            foreach ($data as $key => $elem)
            {
                if ($key == $pc)
                {   
                    $data['id_product_category'] = $data[$key];
                    unset($data[$key]);
                    break;
                }
                $customer[$key] = $data[$key];
                unset($data[$key]);
            }

            $idCustomer = $this->checkExistence($customer, $c);
            if (is_null($idCustomer))
            {
                $this->insertM($c, $customer);
                $idCustomer = $this->db->pdo->lastInsertId();
            }
            $data['id_customer'] = $idCustomer;
            $data['date_of_delivery'] = date('Y-m-d');
           
            $this->insertM('pawnshop_delivery', $data);
        }
    }