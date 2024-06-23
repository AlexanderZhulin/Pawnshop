<?php
    session_start();
    $auth = new Auth();
    $auth->checkAccess();
?>
<br>
<a class="btn btn-primary" href="/home" role="button">Назад к таблицам</a>
<br><br>
<h3>Добавление пользователя</h3>
<form action="/add-user/submit" method="POST">
	<label>Права доступа</label><br>
	<select name="id_role">
    	<?php
			foreach ($data as $elem)
			{
				echo "<option value=\"{$elem['id']}\">{$elem['name_role']}</option>";
			}
		?>
	</select><br>
	<label>Логин</label><br>
	<input type="text" name="login"><br>
<?php
	if (isset($_SESSION['change-passwd']) and !$_SESSION['change-passwd'])
	{	
		echo "<p style=\"color: red;\">Неверно введен пароль!</p>";
		$_SESSION['change-passwd'] = true;
	}
?>
	<label>Пароль</label><br>
	<input type="password" name="pass1" minlength="8" required /><br><br>
	<label>Подтвердите пароль</label><br>
	<input type="password" name="pass2" minlength="8" required /><br><br>
	<button type="submit" class="btn btn-primary">Добавить</button>
</form>