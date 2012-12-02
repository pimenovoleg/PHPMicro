<?php
/**
 * Created by JetBrains PhpStorm.
 * User: oleg
 * Date: 12/2/12
 * Time: 2:13 PM
 * To change this template use File | Settings | File Templates.
 */
class Controller
{
    public  $request,
            $id,
            $params;

    public function dispatch($request)
    {
        $this->request = $request;
        $this->id = $request->id;
        $this->params = $request->params;

        if ($request->isRestful())
        {
            return $this->dispatchRestful();
        }
        if ($request->action)
        {
            return $this->{$request->action}();
        }
    }

    protected function dispatchRestful()
    {

    }
}
