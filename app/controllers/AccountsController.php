<?php

class AccountsController extends BaseController
{

    public function __construct(User $user)
    {
        $this->user = $user;

    }

    public function account_overview($id)
    {

        $user = $this->user->find($id);
        pp($user);
        $transactions = Transaction::where('user_id', '=', $user->id)->orderBy('purchase_date', 'DESC')->paginate(self::PAGINATION_VALUE);
        
        return View::make('users.account_overview', compact('transactions', 'user'));
    }
    

}