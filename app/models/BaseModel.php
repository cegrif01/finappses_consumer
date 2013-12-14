<?php

class BaseModel extends ActiveResource
{

    public function __construct($attributes = array())
    {
        parent::__construct($attributes);
    }
}

BaseModel::$baseUri = Config::get('app.url');