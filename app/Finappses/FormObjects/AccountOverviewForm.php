<?php namespace Finappses\FormObjects;

class AccountOverviewForm
{
    public function __construct(User $user, Transaction $transaction)
    {
        $this->user = $user;
        $this->transaction = $transaction;

    }

    public function prepare()
    {
        
    }
}