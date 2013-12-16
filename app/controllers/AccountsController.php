<?php

class AccountsController extends BaseController
{

    public function __construct(User $user, Transaction $transaction)
    {
        $this->user = $user;
        $this->transaction = $transaction;

    }

    public function account_overview($id)
    {
        $user = BaseModel::rawGet("/v1/users/$id?transactions=true&accounts=true")->response()['collection'];
        
        $user = $this->objectify($user, ['transactions', 'accounts']);
        pp($user);

        return View::make('users.account_overview', compact('user'));
    }
    

}