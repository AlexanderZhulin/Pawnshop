<?php
    session_start();
    $auth = new Auth();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/styles.css">
        <title>Ломбард</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="d-flex">
                <div>
                    <h4 class="title">ЛОМБАРД</h4>
                    <h1 class="title">У МОЙШИ</h1>
                </div>
                <div>
            <?php
                if (!empty($_SESSION))
                {
                    if ($_SERVER['REQUEST_URI'] != '/user')
                    {
            ?>      
                    <a class="btn btn-primary" href="/user" role="button"
                            style=" margin-left: 600%;
                                    margin-top: 10%;">Профиль</a>
                    <?php
                    }
                    else
                    {
                        ?>
                        <a class="btn btn-primary" href="/home" role="button"
                            style=" margin-left: 420%;
                                    margin-top: 10%;
                                    width: 120px;">На главную</a>
                    <?php
                } 
                        if ($_SERVER['REQUEST_URI'] == '/')
                        {
                    ?>
                </div>
            </div>
            <a class="btn btn-primary" href="/home" role="button"
                            style="margin-top: 2%;">На главную</a>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <?php
                }
                else
                {
                    echo "</div>";
                    echo "</div>";
                }
                include 'app/views/' . $contentView; 
            ?>
        </div>
    </body>
</html>