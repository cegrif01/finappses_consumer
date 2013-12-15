<?php

class AccountsController extends BaseController
{

    public function __construct(User $user)
    {
        $this->user = $user;

    }

    public function account_overview($id)
    {

        $request = BaseModel::rawGet("/v1/users/$id/account_overview");
        pp($request);
        $errors = $request->errors();

        if(empty($errors)) {
            
            $user = (object) $request->response();
            return View::make('users.account_overview', compact('transactions', 'user'));
        }
    }
    

}