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

        $user = (object) BaseModel::rawPost('authenticate', $params)->response();
        
        if(! empty($user)) {
            return Redirect::route('users.show', [$user->id]);
        }

    }

    public function destroy($id)
    {
        Session::flush();
        return Redirect::route('login');
    }

}