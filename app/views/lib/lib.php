<?php

    function formProductCategory($table, $flag)
    {
        echo "<h3>$table</h3>";
        if ($flag)
            echo "<form name=\"product_category\" action=\"/table/product-category/add/submit\" method=\"POST\">";
        else
            echo "<form name=\"product_category\" action=\"/table/product-category/update/submit\" method=\"POST\">";
        ?>
            <button class="btn btn-primary" name="product_category" type="submit">
                <?php
                    if ($flag) 
                        echo "Добавить";
                    else
                        echo "Изменить";
                ?>
            </button><br>
            <label>Название</label><br>
            <input type="text" name="name"><br>
            <label>Примечание</label><br>
            <input type="text" name="note"><br>
            <?php
                if (!$flag)
                    echo "<label>ID записи для изменения</label><br>
                        <input type=\"text\" name=\"id\">";
            ?>
        </form>
        <?php
    }

    function formCustomers($table, $flag)
    {
        echo "<h3>$table</h3>";
        if ($flag)
            echo "<form name=\"customers\" action=\"/table/customers/add/submit\" method=\"POST\">";
        else
            echo "<form name=\"customers\" action=\"/table/customers/update/submit\" method=\"POST\">";
        ?>
            <button class="btn btn-primary" name="customers" type="submit">
                <?php
                    if ($flag === null)
                        echo "";
                    else if ($flag) 
                        echo "Добавить";
                    else
                        echo "Изменить";
                ?>
            </button><br>
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
            <input type="text" name="date_passport"><br>
            <?php
                if (!$flag)
                    echo "<label>ID записи для изменения</label><br>
                        <input type=\"text\" name=\"id\">";
            ?>
        </form>
        <?php
    }

    function formPawnshopDelivery($table, $flag)
    {
        echo "<h3>$table</h3>";
        if ($flag)
            echo "<form name=\"pawnshop_delivery\" action=\"/table/pawnshop-delivery/add/submit\" method=\"POST\">";
        else
            echo "<form name=\"pawnshop_delivery\" action=\"/table/pawnshop-delivery/update/submit\" method=\"POST\">";
        ?>
            <button class="btn btn-primary" name="pawnshop_delivery" type="submit">
                <?php
                    if ($flag) 
                        echo "Добавить";
                    else
                        echo "Изменить";
                ?>
            </button><br>
            <label>ID клиента</label><br>
            <input type="text" name="id_customer"><br>
            <label>ID категории товара</label><br>
            <input type="text" name="id_product_category"><br>
            <label>Дата сдачи</label><br>
            <input type="text" name="date_of_delivery"><br>
            <label>Дата возврата</label><br>
            <input type="text" name="return_date"><br>
            <label>Описание товара</label><br>
            <input type="text" name="product_description"><br>
            <label>Сумма</label><br>
            <input type="text" name="amount"><br>
            <label>Коммиссионные</label><br>
            <input type="text" name="commission_fees"><br>
            <?php
                if (!$flag)
                    echo "<label>ID записи для изменения</label><br>
                        <input type=\"text\" name=\"id\">";
            ?>
        </form>
        <?php
    }

    function formPrice($table, $flag)
    {
        echo "<h3>$table</h3>";
        if ($flag)
            echo "<form name=\"prices\" action=\"/table/prices/add/submit\" method=\"POST\">";
        else
            echo "<form name=\"prices\" action=\"/table/prices/update/submit\" method=\"POST\">";
        ?>
            <button class="btn btn-primary" name="prices" type="submit">
                <?php
                    if ($flag) 
                        echo "Добавить";
                    else
                        echo "Изменить";
                ?>
            </button><br>
            <label>ID сдачи</label><br>
            <input type="text" name="id_pawnshop_delivery"><br>
            <label>Цена</label><br>
            <input type="text" name="price"><br>
            <label>Дата цены</label><br>
            <input type="text" name="date_price"><br>
            <?php
                if (!$flag)
                    echo "<label>ID записи для изменения</label><br>
                        <input type=\"text\" name=\"id\">";
            ?>
        </form>
        <?php
    }
?>