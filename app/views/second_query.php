<?php
    $auth->checkAccess();
?>
<br>
<a class="btn btn-primary" href="/home" role="button">Назад к таблицам</a>
<br><br>
<p>
    За конкретный перид вывести клиентов и категории<br>
    товара, которые они сдали в ломбард, а также<br>
    количество сданного товара этой категории
</p>
<form action="/query/2/submit" method="POST">
    <label>С</label><br>
    <input type="text" name="start_date"><br>
    <label>До</label><br>
    <input type="text" name="end_date"><br><br>
    <button type="submit" class="btn btn-secondary">Вывести</button>
</form>
