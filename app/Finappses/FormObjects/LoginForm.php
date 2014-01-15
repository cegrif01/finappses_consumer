<?php namespace Finappses\FormObjects;

use BaseModel;
use Finappses\Exceptions\LoginException;

class LoginForm
{

    public function login(array $params)
    {
        $request = BaseModel::rawPost('/authenticate', $params);
        
        $errors = $request->errors();

        if( ! empty($errors) ) {

            throw new LoginException($errors);

        }

        return (object) $request->response();

    }

}