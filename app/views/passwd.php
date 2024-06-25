<?php
    $auth->checkAccess();
?>
<form action="/change-passwd/submit" method="POST">
<?php
	if (isset($_SESSION['change-passwd']) and !$_SESSION['change-passwd'])
	{	
		echo "<p style=\"color: red;\">Неверно введен пароль!</p>";
		$_SESSION['change-passwd'] = true;
	}
?>
	<label>Введите новый пароль</label><br>
	<input type="password" name="pass1"minlength="8" required /><br>
	<label>Подтвердите пароль</label><br>
	<input type="password" name="pass2"minlength="8" required /><br><br>
	<button type="submit" class="btn btn-primary">Изменить пароль</button>
</form>