<?php
    session_start();
    $auth = new Auth();
    $auth->checkAccess();
?>
<a class="btn btn-primary" href="/home" role="button">Назад к таблицам</a><br><br>
<?php    
    $str = str_replace('_', '-', $table);
    echo "<form action=\"/table/$str/delete/submit\" method=\"POST\">";
    echo "<button class=\"btn btn-danger\" name=\"$table\" type=\"submit\">Удалить</button><br>";
?>

    <label>ID элемента под удаление</label><br>
    <input type="text" name="id">
    <br>
    <table border="2" width="100%" cellpadding="10" class="table table-striped">
    <?php
        switch($table)
        {
            case 'product_category':
                echo "<tr><th>№</th><th>Название</th><th>Описание</th></tr>";
                break;

            case 'customers':
                echo '<tr><th>№</th><th>Фамилия</th><th>Имя</th><th>Отчество</th>';
                echo '<th>Номер паспорта</th><th>Серия паспорта</th>><th>Дата выдачи паспорта</th></tr>';
                break;

            case 'pawnshop_delivery':
                echo '<tr><th>№</th><th>Фамилия клиента</th><th>Категория</th><th>Дата сдачи</th>';
                echo '<th>Дата возврата</th><th>Описание товара</th><th>Сумма</th><th>Комиссионные</th></tr>';
                break;

            case 'prices':
                echo "<tr><th>№</th><th>Сумма при сдачи</th><th>Цена</th><th>Дата цены</th></tr>";
                break;
                
            default:
                break;
        }
        echo '<br>';
        foreach ($data as $elem)
        {
            echo "<tr>";
            foreach ($elem as $el)
            {
                if (!empty($el))
                {
                    echo "<td>{$el}</td>";
                }
            }
            echo '</tr>';
        }
    ?>
</table>
</form>