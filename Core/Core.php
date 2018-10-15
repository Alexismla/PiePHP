<?php

namespace Core;

class Core {
    public function run()
    {
        include('routes.php');
        $url = substr($_SERVER['REQUEST_URI'], strlen(BASE_URI));
        $url = Router::get($url);

        $controller = "Controller\\" . ucfirst($url["controller"]) . "Controller";
        $action = $url['action'] . "Action";
        $app = new $controller();
        $app->$action();

    }
}
