<?php
    session_start();
    $auth = new Auth();
    $auth->checkAccess();
?>
<br>
<a class="btn btn-primary" href="/home" role="button">Назад к таблицам</a>
<br><br>
<table border="2" width="100%" cellpadding="10" class="table table-striped">
    <?php
        echo "<tr>";
        foreach ($data as $elem)
        {
            foreach ($elem as $key => $el)
                echo "<th>$key</th>";
            break;
        }
        echo "</tr>";

        foreach ($data as $elem)
        {
            echo "<tr>";
            foreach ($elem as $el)
            {
                if (!empty($el))
                {
                    echo "<td>{$el}</td>";
                }
            }
            echo '</tr>';
        }
    ?>
</table>