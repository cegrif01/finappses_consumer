<?php

use Finappses\FormObjects\LoginForm;
use Finappses\Exceptions\LoginException;

class SessionsController extends BaseController {

    public function __construct(LoginForm $login_form)
    {
        $this->login_form = $login_form;
        
    }

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

        try {

            $user = $this->login_form->login($params);
            return Redirect::route('account_overview_get', [$user->id]);

        } catch (LoginException $e) {

            return Redirect::route('login')->withErrors($e->getErrors());

        }
        
    }

    public function destroy()
    {
        Session::flush();
        return Redirect::route('login');
    }

}