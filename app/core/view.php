<?php
    class View
    {
        // public $templateView = 'template.php';
        
        function generate($contentView, $templateView, $data = null, $table = null, $flag = null)
        {
            /*
            if(is_array($data))
            {
                // преобразуем элементы массива в переменные
                extract($data);
            }
            */
            
            include 'app/views/' . $templateView;
        }
    }