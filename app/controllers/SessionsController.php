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

        $request = BaseModel::rawPost('authenticate', $params);
        
        $errors = $request->errors();

        if(empty($errors)) {
            
            $user = (object) $request->response();

            return Redirect::route('users.account_overview', [$user->id]);
        }

        return Redirect::route('login')->withErrors($request->errors());

    }

    public function destroy()
    {
        Session::flush();
        return Redirect::route('login');
    }

}