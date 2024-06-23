<?php
    class Route
    {
        static function start()
        {
            include 'app/routes/web.php';
        }

        static function get(string $route, string $controllerName, string $actionName)
        {
            if ($route == $_SERVER['REQUEST_URI'])
            {
                $pos = strpos($controllerName, 'Controller');
                $modelName = substr($controllerName, 0, $pos);
                $modelName = $modelName . 'Model';
                
                // подцепляем файл с классом модели (файла модели может и не быть)
                $modelFile = strtolower($modelName) . '.php';
                $modelPath = "app/models/" . $modelFile;
                if(file_exists($modelPath))
                {
                    include "app/models/" . $modelFile;
                }

                // подцепляем файл с классом контроллера
                $controllerFile = $controllerName . '.php';
                $controllerPath = "app/controllers/" . $controllerFile;
                if(file_exists($controllerPath))
                {
                    include "app/controllers/" . $controllerFile;
                }
                else
                {
                    Route::errorPage404();
                }

                // создаем контроллер
                $controller = new $controllerName;
                $action = $actionName;
                
                if(method_exists($controller, $action))
                {
                    // вызываем действие контроллера
                    $controller->$action();
                }
                else
                {
                    Route::errorPage404();
                }
            }
        }

        static function errorPage404()
		{
			$host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
			header('HTTP/1.1 404 Not Found');
			header("Status: 404 Not Found");
			header('Location:' . $host . '404');
		}
    }