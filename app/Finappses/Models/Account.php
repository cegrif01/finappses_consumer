<?php

class Account extends BaseModel
{
    const CHECKING = 1;
    const SAVINGS = 2;
    const RETIREMENT = 3;

    public function nestUnderUser($id)
    {
        Account::$nestedUnder = "User:$id";
    }

}