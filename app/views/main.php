<?php
    if (empty($_SESSION))
    {
?>
<form action="/login" method="POST">
    <p>Логин</p>
    <input type="text" name="login">
    <p>Пароль</p>
    <input type="password" id="pass" name="passwd" minlength="8" required /><br><br>
    <button type="submit" class="btn btn-primary">Войти</button>
</form>
<?php
    }
?>