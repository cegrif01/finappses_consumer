@extends('master')
    @section('content')
    <div class = "row">
        <div class="span8">
            {{-- HTML::link(URL::to('#addAccount'),'Add Account',['class'=>'btn btn-primary', 'data-toggle'=>'modal']) --}}
            {{ HTML::link(URL::to('transactions/create'),'Add Transaction',['class'=>'btn btn-primary']) }}

            <div id="addAccount" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                @include('accounts.modals.add_account')
            </div>
            <div id="edit_account_modal" class="modal hide" tabindex="-1" aria-labelledby="edit_account_label" role="dialog" aria-hidden="true">
                
            </div>
            
            <div id="transaction_table">@include('transactions.partials.transaction_list_table')</div>
        </div><!--end of span8 -->
            {{-- @include('accounts.partials.display_sorted_accounts') --}}
    </div><!-- end of row -->
    @stop

