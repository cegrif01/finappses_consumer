@extends('master')
    @section('content')
        {{ Form::model([$transaction, 'route' => 'transactions.store']) }}
            
            <p>
                {{ Form::label('transaction[account_id]','Accounts') }}
                {{ Form::select('transaction[account_id]', Auth::user()->getAllAccountsByUserKeyValueFormat(), $transaction->account_id) }}
            </p>

            <p>
                {{ Form::label('transaction[description]','Description') }}
                {{ Form::text('transaction[description]', $transaction->description) }}
            </p>

            <p>
                {{ Form::label('transaction[transaction_type_id]','Transaction Type') }}
                {{ Form::select('transaction[transaction_type_id]',[1 => 'expense',2 => 'income',3 => 'recurring expense',
                   4=>'recurring income'], $transaction->transaction_type_id ,['id'=>'transaction_type_id']) }}
            </p>
            
            <?php $y = 0; ?>
            @foreach($transaction->categories as $i=>$category)
                
                <div id="categ_{{ $i}}">
                    <div class="add_remove_helper"><!-- We need this div in order to perform add/remove javascript -->
                        {{ Form::label('category[$i][name]','Category Name') }}
                        {{ Form::text("category[$i][name]", $category->name, ['class'=>'span3']) }}

                        {{ Form::label('category[$i][amount]','Category Amount') }}
                        {{ Form::text("category[$i][amount]", $category->amount,['class'=>'span3', 'onkeyup'=>'calculateTotal()']) }}

                    </div><!-- end of add_remove_helper -->
                    <br />
                </div><!-- end of categ_ div -->
            @endforeach

            <p>
                {{ Form::label('transaction[amount]','Amount') }}
                {{ Form::text('transaction[amount]',$transaction->amount, ['id'=>'transaction_amount','readonly']) }}
            </p>

              <p>
                {{ Form::label('transaction[purchase_date]','Purchase Date') }}
                {{ Form::text('transaction[purchase_date]', $transaction->purchase_date, ['id'=>'purchase_date']) }}
            </p>

        {{ Form::close() }}

    @stop
