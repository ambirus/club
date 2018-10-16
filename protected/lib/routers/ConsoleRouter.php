<?php

namespace lib\routers;

use Exception;
use lib\Config;

class ConsoleRouter
{
    public function execute()
    {
        $controllerName = 'Index';
        $actionName = 'Index';
        $actionParams = [];

        // здесь описывается обработка параметров и т.д.

        $controllerName = $controllerName . 'Controller';
        $actionName = 'action' . $actionName;
        $namespaceController = 'src\\controllers\\' . $controllerName;

        if (class_exists($namespaceController)) {
            $controller = new $namespaceController;
        } else throw new Exception(__CLASS__ .': ' . 'No such class &laquo;' . $namespaceController . '&raquo;');

        if (method_exists($controller, $actionName)) {
            $controller->$actionName($actionParams);
        } else throw new Exception(__CLASS__ .': ' . 'No such controller action &laquo;' . $actionName . '&raquo;');
    }
}
