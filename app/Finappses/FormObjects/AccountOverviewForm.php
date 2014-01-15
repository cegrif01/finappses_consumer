<?php namespace Finappses\FormObjects;

use User;
use Account;

class AccountOverviewForm
{
    public function __construct(User $user, Account $account)
    {
        $this->user = $user;
        $this->account = $account;

    }

    /**
     * [getUserFinancialData returns the user's account and transaction information]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getUserFinancialData($id)
    {

        $user = $this->user->find($id, ['includes[0]' =>'accounts', 'includes[1]' => 'transactions'])->collection;
        
        return json_decode($user);
    }
}