<?php
    $auth->checkAccess();
?>
<br>
<a class="btn btn-primary" href="/home" role="button">Назад к таблицам</a>
<br><br>
<h3>Оформление сдачи в ломбард</h3>
<form action="/register-delivery/submit" method="POST">
	<div class="d-flex">
		<div>
			<h4>Клиент</h4>
			<label>Фамилия</label><br>
	        <input type="text" name="surname"><br>
	        <label>Имя</label><br>
	        <input type="text" name="name"><br>
	        <label>Отчество</label><br>
	        <input type="text" name="second_name"><br>
	        <label>Номер паспорта</label><br>
	        <input type="text" name="passport_number"><br>
	        <label>Серия паспорта</label><br>
	        <input type="text" name="passport_series"><br>
	        <label>Дата выдачи паспорта</label><br>
	        <input type="text" name="date_passport">
		</div>
		<div style="margin-left: 2%;">
			<h4>Предмет сдачи</h4>
			<label>Категория товара</label><br>
	        <select name="product_category">
	        	<?php
					foreach ($data as $elem)
					{
						echo "<option value=\"{$elem['id']}\">{$elem['name']}</option>";
					}
				?>
			</select>
			<a 	href="/table/product-category/add"
				class="link-offset-2 link-underline link-underline-opacity-0">Добавить категорию</a><br>
	        <label>Описание</label><br>
	        <input type="text" name="product_description"><br>
	        <label>Дата возврата</label><br>
	        <input type="text" name="return_date"><br>
	        <label>Сумма</label><br>
	        <input type="text" name="amount"><br>
	        <label>Коммиссионные</label><br>
	        <input type="text" name="commission_fees"><br><br>
	        <button class="btn btn-primary" type="submit">Оформить</button>
		</div>
	</div>
</form>