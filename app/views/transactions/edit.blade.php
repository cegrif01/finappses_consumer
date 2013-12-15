@extends('master')
    @section('content')
        
        {{ Form::open(['url' => 'transactions/'.$transaction->id, 'method' => 'PUT']) }}
        <div class="row-fluid">
            <div class="span3">
            
                <p>
                    {{ Form::label('transaction[account_id]','Accounts') }}
                    {{ Form::select('transaction[account_id]',$accounts,$transaction->account_id) }}
                </p>

                <p>
                    {{ Form::label('transaction[transaction_type_id]','Transaction Type') }}
                    {{ Form::select('transaction[transaction_type_id]', ['1' => 'expense', '2' => 'income', '3' => 'recurring expense',
                       '4' => 'recurring income'], $transaction->transaction_type_id, ['id'=>'transaction_type_id']) }}
                </p>

                
                <div class = "control-group {{ ($errors->has('amount')) ? 'error' : '' }}">
                    {{ Form::label('transaction[amount]','Amount') }}
                    {{ Form::text('transaction[amount]', $transaction->amount, ['id'=>'transaction_amount','placeholder' => '0.00']) }}
                </div>

                <div id="transaction_purchase_date" class = "control-group {{ ($errors->has('purchase_date')) ? 'error' : '' }}">
                    {{ Form::label('transaction[purchase_date]','Purchase Date') }}
                    {{ Form::text('transaction[purchase_date]', $transaction->purchase_date, ['id'=>'purchase_date']) }}
                </div>


                <div class = "control-group {{ ($errors->has('description')) ? 'error' : '' }}">
                    {{ Form::label('transaction[description]','Description *', ['class' => 'control-label']) }}
                    {{ Form::textarea('transaction[description]', $transaction->description) }}

                </div>
            </div><!-- span3 -->

            @if(Session::has('number_of_categories'))
                {{ Form::hidden('number_of_categories', Session::get('number_of_categories'), ['id' => 'number_of_categories']) }}
                {{ Form::hidden('old_input_values', json_encode(Input::old()), ['id' => 'old_input_values']) }}
                {{ Session::forget('number_of_categories') }}
            @endif

            <p id="add_image">+ Add Category</p>
        
            <div id="categories" class = "span6 form-inline">
            
                @foreach($transaction->categories as $i => $category)
                    
                    <div id="categ_{{ $i}}">
                        <div class="add_remove_helper"><!-- We need this div in order to perform add/remove javascript -->
                            <div class = "control-group {{ ($errors->has('name')) ? 'error' : '' }}">
                                {{ Form::label('category[$i][name]','Category Name') }}
                                {{ Form::text("category[$i][name]", $category->name) }}
                            </div>

                            <div class = "control-group {{ ($errors->has('amount')) ? 'error' : '' }}">
                                {{ Form::label('category[$i][amount]','Category Amount') }}
                                {{ Form::text("category[$i][amount]", $category->amount, ['placeholder' => '0.00', 'id' => 'category_'.@$i.'_amount']) }}
                                {{ HTML::image('img/subtract_something.png','subtract category',['id'=>'subtract_field_'.@$i,'onClick'=>'removeCategorySet($(this).attr("id"))','width'=>25,'length'=>25]) }}
                            </div>

                        </div><!-- end of add_remove_helper -->
                    </div><!-- end of categ_ div -->
                @endforeach
            </div><!-- end of categories -->
        
            <div id="recurring" class = "span3">
                <div id="recurring_transaction_start_date" class = "control-group {{ ($errors->has('start_date')) ? 'error' : '' }}">
                    {{ Form::label('recurring_transaction[start_date]','Start Date') }}
                    {{ Form::text('recurring_transaction[start_date]', Input::old('start_date'), ['id'=>'start_date']) }}
                </div>

                    {{ Form::label('recurring_transaction[temporal_expression_id]','Transaction Type') }}
                    {{ Form::select('recurring_transaction[temporal_expression_id]',[1 => 'Weekly',2 => 'Monthly',3 => 'Yearly',
                       4=>'Daily'], '1' ,['id' => 'temporal_expression']) }}
                    <br />

                    <div id="recurring_transaction_stop_date" class = "control-group {{ ($errors->has('stop_date')) ? 'error' : '' }}">
                        Stops On: {{ Form::radio('recurring_transaction[recurring_end_options_id]',1,true,['id'=>'recur_stop']) }}
                        {{ Form::text('recurring_transaction[stop_date]', Input::old('stop_date'), ['id'=>'stop_date']) }}
                    </div>

                    <br />
                    Indefinitely: {{ Form::radio('recurring_transaction[recurring_end_options_id]', 2, '', ['id'=>'recur_indefinite']) }}
                    
            </div><!-- end of recurring -->
        </div><!-- end of row-fluid -->

        <div id="save_and_cancel_buttons" class = "span8">
            {{ Form::submit('Save Transaction',['class'=>'btn btn-primary']) }}
        </div><!-- end of save_and_cancel_buttons -->
        {{ Form::close() }}

    @stop
