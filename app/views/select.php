<?php
    $auth->checkAccess();
?>
<br>
<a class="btn btn-primary" href="/home" role="button">Назад к таблицам</a>
<br><br>
<?php $str = str_replace('_', '-', $table); 
    if (($_SESSION['role'] != 2 and $_SESSION['role'] != 4) or ($_SESSION['role'] == 4 and $table == 'prices'))
    {
?>
<div class="d-flex">
    <form action="/table/<?= $str ?>/add" method="POST">
        <button class="btn btn-secondary" name="<?= $table ?>">Добавить</button>
    </form>
    <form action="/table/<?= $str ?>/delete" method="POST" style="margin-left: 1%;">
        <button class="btn btn-secondary" name="<?= $table ?>">Удалить</button>
    </form>
    <form action="/table/<?= $str ?>/update" method="POST" style="margin-left: 1%;">
        <button class="btn btn-secondary" name="<?= $table ?>">Изменить</button>
    </form>
</div>
<?php
    }
    switch ($table)
    {
        case 'product_category':
            echo "<h3>Категории товара</h3>";
            break;

        case 'customers':
            echo "<h3>Клиенты</h3>";
            break;

        case 'pawnshop_delivery':
            echo "<h3>Сдачи в ломбард</h3>";
            break;
        
        case 'prices':
            echo "<h3>Цены</h3>";
            break;
    }
 ?>

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