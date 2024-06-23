<?php
    session_start();
    $auth = new Auth();
    $auth->checkAccess();
    echo "<br>";
    echo "<br>";

    echo $auth->getUsername();
    if ($_SESSION['role'] === 1 and $_SERVER['REQUEST_URI'] != '/add-user' 
        and $_SERVER['REQUEST_URI'] != '/delete-user' and $_SERVER['REQUEST_URI'] != '/select-users')
    {
        if (!empty($_SESSION['message']))
        {
?>
            <h4 style="color:red;"><?= $_SESSION['message'] ?></h4>
<?php
            $_SESSION['message'] = "";
        }
?> 
<div>
    <a class="btn btn-danger" href="/add-user" role="button">Добавить пользователя</a>
    <a class="btn btn-danger" href="/delete-user" role="button">Удалить пользователя</a>
    <a class="btn btn-danger" href="/select-users" role="button">Вывести пользователей</a>
</div>
<?php
    }
?>
<a href="/change-passwd" class="link-offset-2 link-underline link-underline-opacity-0">Изменить пароль</a>
<br><br>
<a class="btn btn-primary" href="/exit" role="button">Выйти</a>