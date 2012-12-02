<?php
/**
 * Created by JetBrains PhpStorm.
 * User: oleg
 * Date: 12/2/12
 * Time: 2:08 PM
 * To change this template use File | Settings | File Templates.
 */
class Respond
{
    public  $success,
            $data,
            $message,
            $errors,
            $tid,
            $trace;

    public function __construct($params = array())
    {
        $this->success = isset($params["success"]) ? $params["success"] : false;
        $this->message = isset($params["message"]) ? $params["message"] : '';
        $this->data    = isset($params["data"]) ? $params["data"] : array();
    }

    public function to_json()
    {
        return json_encode(array(
            'success' => $this->success,
            'message' => $this->message,
            'data'    => $this->data
        ));
    }
}
