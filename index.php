<?php
/**
 * Created by JetBrains PhpStorm.
 * User: oleg
 * Date: 12/2/12
 * Time: 2:40 PM
 * To change this template use File | Settings | File Templates.
 */

require ('micro/micro.php');

$request = new Request(array('restful' => true));

require('controllers/' . $request->controller . '.php');
$controller_name = ucfirst($request->controller);

$controller = new $controller_name;

// Dispatch request
echo $controller->dispatch($request);