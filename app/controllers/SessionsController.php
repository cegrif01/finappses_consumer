<?php

class SessionsController extends BaseController {

    public function create()
    {

        return View::make('sessions.create');
    }

    public function store()
    {
        $params = array(
            'email'    => Input::get('email'),
            'password' => Input::get('password')
        );

        $result = BaseModel::rawPost('authenticate', $params);
        pp($result);

    }

    public function destroy($id)
    {
        Session::flush();
        return Redirect::route('login');
    }

}