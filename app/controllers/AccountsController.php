<?php

class AccountsController extends BaseController
{

    public function __construct(User $user)
    {
        $this->user = $user;

    }

    public function account_overview($id)
    {
        $user = (object) BaseModel::rawGet("/v1/users/$id?transactions=true&accounts=true")->response()['collection'];
        
        return View::make('users.account_overview', compact('user'));
    }
    

}