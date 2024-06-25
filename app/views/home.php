<?php
    $auth->checkAccess();

    if ($_SESSION['role'] != 1) 
    {
?>
<div class="d-flex">
    <div>
        <h3>Таблицы</h3>
        <a class="btn btn-outline-primary" href="/table/product-category" role="button">Категории товара</a>
        <br><br>
<?php
        if ($_SESSION['role'] != 4)
        {
?>
        <a class="btn btn-outline-primary" href="/table/customers" role="button">Клиенты</a>
        <br><br>
<?php
        }
?>
        <a class="btn btn-outline-primary" href="/table/pawnshop-delivery" role="button">Сдачи в ломбард</a>
        <br><br>
<?php
        if ($_SESSION['role'] == 4 or $_SESSION['role'] == 2)
        {
?>        
        <a class="btn btn-outline-primary" href="/table/prices" role="button">Цены</a>
<?php
        }
?>
    </div>
    <div style="margin-left: 80px;">
        <h3>Запросы</h3>
        <ul>
            <li>
                <a href="/query/1" class="link-offset-2 link-underline link-underline-opacity-0">
                    Рассчитать общую сумму, на которую сдал товара<br>
                    в ломбард клиент за определенный промежуток<br>
                    времени, и кол-во сдач в ломбард
                </a>
            </li>
            <li>
                <a href="/query/2" class="link-offset-2 link-underline link-underline-opacity-0">
                    За конкретный перид вывести клиентов и категории<br>
                    товара, которые они сдали в ломбард, а также<br>
                    количество сданного товара этой категории
                </a>   
            </li>
        </ul>
    </div>
<?php
    if ($_SESSION['role'] == 3)
    {
?>
    <div style="margin-left: 80px;">
        <h3>Оформление сдачи</h3>
        <br>
        <a class="btn btn-primary" href="/register-delivery" role="button">Перейти</a>
    </div>
</div>
<?php 
    }
}
?>