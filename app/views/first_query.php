<?php
    session_start();
    $auth = new Auth();
    $auth->checkAccess();
?>
<a class="btn btn-primary" href="/home" role="button">Назад к таблицам</a>
<p>
    Рассчитать общую сумму, на которую сдал товара<br>
    в ломбард клиент за определенный промежуток<br>
    времени, и кол-во сдач в ломбард
</p>
<form action="/query/1/submit" method="POST">
    <div class="d-flex">
        <div>
            <h3>Клиент</h3>
            <label>Имя</label><br>
            <input type="text" name="name"><br>
            <label>Фамилия</label><br>
            <input type="text" name="surname"><br>
            <label>Отчество</label><br>
            <input type="text" name="second_name"><br>
        </div>
        <div style="margin-left: 10%">
            <h3>Период времени</h3>
            <label>С</label><br>
            <!-- <select class="form-select">
                <option selected>Год</option>
                <?php
                    $curYear = date('Y');
                    for ($year = 2000; $year <= $curYear; $year++) 
                    {
                        echo "<option value=\"$year\">$year</option>";
                    }
                ?>
            </select>
            <select class="form-select">
                <option selected>Месяц</option>
                <?php
                    for ($month = 1; $month <= 12; $month++) 
                    {
                        echo "<option value=\"$month\">$month</option>";
                    }
                ?>
            </select>
            <select class="form-select">
                <option selected>День</option>
                <?php
                    for ($day = 1; $day <= 31; $day++) 
                    {
                        echo "<option value=\"$day\">$day</option>";
                    }
                ?>
            </select> -->
            <input type="text" name="start_date"><br>
            <label>До</label><br>
            <input type="text" name="end_date"><br><br>
        </div>
    </div><br>
    <button class="btn btn-primary" type="submit">Рассчитать</button>
</form>
