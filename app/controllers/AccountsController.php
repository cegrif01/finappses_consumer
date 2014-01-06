<?php

class AccountsController extends BaseController
{

    public function __construct(User $user, Transaction $transaction)
    {
        $this->user = $user;
        $this->transaction = $transaction;

    }

    public function add_account()
    {
        pp(Input::all());
    }
    

}