<?php
/**
 * Created by JetBrains PhpStorm.
 * User: oleg
 * Date: 12/2/12
 * Time: 1:39 PM
 * To change this template use File | Settings | File Templates.
 */
class Request
{
    public  $restful,
            $method,
            $controller,
            $action,
            $id,
            $params;

    public function __construct($params)
    {
        $this->params = (isset($params["restful"])) ? $params["restful"] : false;
        $this->method = $_SERVER["REQUEST_METHOD"];
        $this->parseRequest();
    }

    public function isRestful()
    {
        return $this->restful;
    }

    protected function parseRequest()
    {
        $this->params = (isset($_REQUEST["data"])) ? json_decode(stripcslashes($_REQUEST["data"])) : null;

        if (isset($_REQUEST["data"]))
        {
            $this->params = json_decode(stripcslashes($_REQUEST["data"]));
        }

        if (isset($_SERVER["PATH_INFO"]))
        {
            $cai = '/^\/([a-z]+\w)\/([a-z]+\w)\/([0-9]+)$/';  // /controller/action/id
            $ca =  '/^\/([a-z]+\w)\/([a-z]+)$/';              // /controller/action
            $ci = '/^\/([a-z]+\w)\/([0-9]+)$/';               // /controller/id
            $c =  '/^\/([a-z]+\w)$/';                             // /controller
            $i =  '/^\/([0-9]+)$/';                             // /id
            $matches = array();

            if (preg_match($cai, $_SERVER["PATH_INFO"], $matches))
            {
                $this->controller = $matches[1];
                $this->action = $matches[2];
                $this->id = $matches[3];
            } else if (preg_match($ca, $_SERVER["PATH_INFO"], $matches)) {
                $this->controller = $matches[1];
                $this->action = $matches[2];
            } else if (preg_match($ci, $_SERVER["PATH_INFO"], $matches)) {
                $this->controller = $matches[1];
                $this->id = $matches[2];
            } else if (preg_match($c, $_SERVER["PATH_INFO"], $matches)) {
                $this->controller = $matches[1];
            } else if (preg_match($i, $_SERVER["PATH_INFO"], $matches)) {
                $this->id = $matches[1];
            }
        }
    }
}
