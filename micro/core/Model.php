<?php
/**
 * Created by JetBrains PhpStorm.
 * User: oleg
 * Date: 12/2/12
 * Time: 2:29 PM
 * To change this template use File | Settings | File Templates.
 */
class Model
{
    public  $id,
            $attributes;

    static function find($id)
    {
        global $sessionDB;
        $found = null;
        foreach ($sessionDB->rs() as $record)
        {
            if ($record['id'] == $id)
            {
                $found = new self($record);
                break;
            }
        }

        return $found;
    }

    public function __construct($params)
    {
        $this->id = isset($params['id']) ? $params['id'] : null;
        $this->attributes = $params;
    }

    public function save()
    {
        global $sessionDB;
        $this->attributes['id'] = $sessionDB->pk();
        $sessionDB->insert($this->attributes);
    }

    public function to_hash()
    {
        return $this->attributes;
    }
}
