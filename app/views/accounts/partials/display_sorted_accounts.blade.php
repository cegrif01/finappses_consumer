<div id="account_list" class="span4">
            <ul class="nav nav-tabs">

                <li>{{ HTML::linkRoute('display_sorted_accounts', 'Checking', [$user->id, @Account::CHECKING], ['id'=>'default','class'=>'account_list']) }}</li>
                <li>{{ HTML::linkRoute('display_sorted_accounts', 'Savings', [$user->id, @Account::SAVINGS], ['class'=>'account_list']) }}</li>
                <li>{{ HTML::linkRoute('display_sorted_accounts', 'Retirement', [$user->id, @Account::RETIREMENT] ,['class'=>'account_list']) }}</li>
            </ul>
            <div id="edit_account"></div>
        </div><!-- end of account_list -->