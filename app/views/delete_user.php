<?php
    $auth->checkAccess();
?>
<br>
<a class="btn btn-primary" href="/home" role="button">Назад к таблицам</a>
<br><br>
<h3>Удаление пользователя</h3>
<form action="/delete-user/submit" method="POST">
	<p>Логин</p>
	<input type="text" name="login">
	<button type="submit">Удалить</button>
</form>