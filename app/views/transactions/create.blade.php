@extends('master')
    @section('content')

    {{ Form::open(['route' => 'transactions.store', 'id' => 'transaction_create_form']) }}
    <div class="row-fluid">
        <div class="span3">

            <p>
                {{ Form::label('transaction[account_id]', 'Accounts') }}
                {{ Form::select('transaction[account_id]', $accounts) }}
            </p>

            <p>
                {{ Form::label('transaction[transaction_type_id]','Transaction Type') }}
                {{ Form::select('transaction[transaction_type_id]', ['1' => 'expense', '2' => 'income', '3' => 'recurring expense',
                   '4' => 'recurring income'], '1', ['id'=>'transaction_type_id']) }}
            </p>

            <div class = "control-group {{ ($errors->has('amount')) ? 'error' : '' }}">
                {{ Form::label('transaction[amount]', 'Amount') }}
                {{ Form::text('transaction[amount]', 
                              Input::old('amount'), 
                              ['placeholder' => '0.00']) }}
            </div>

            <div id="transaction_purchase_date" class = "control-group {{ ($errors->has('purchase_date')) ? 'error' : '' }}">
                {{ Form::label('transaction[purchase_date]','Purchase Date') }}
                {{ Form::text('transaction[purchase_date]', Input::old('purchase_date'), ['id'=>'purchase_date']) }}
            </div>


            <div class = "control-group {{ ($errors->has('description')) ? 'error' : '' }}">
                {{ Form::label('transaction[description]','Description *', ['class' => 'control-label']) }}
                {{ Form::textarea('transaction[description]', Input::old('description')) }}

            </div>

        </div><!-- span3 -->

        @if(Session::has('number_of_categories'))
            {{ Form::hidden('number_of_categories', Session::get('number_of_categories'), ['id' => 'number_of_categories']) }}
            {{ Form::hidden('old_input_values', json_encode(Input::old()), ['id' => 'old_input_values']) }}
            {{ Session::forget('number_of_categories') }}
        @endif
        
        <p id="add_image">+ Add Category</p>
        
        <div id="categories" class = "span6 form-inline">
            
                <div id="categ_0">
                    <div class="add_remove_helper"><!-- We need this div in order to perform add/remove javascript -->
                        <div class = "control-group {{ ($errors->has('name')) ? 'error' : '' }}">
                            {{ Form::label("category[0][name]",'Category Name') }}
                            {{ Form::text("category[0][name]", '', ['placeholder' => 'Uncategorized', 'id' => 'category_0_name']) }}
                        </div>

                        <div class = "control-group {{ ($errors->has('amount')) ? 'error' : '' }}">
                            {{ Form::label("category[0][amount]", 'Category Amount') }}
                            {{ Form::text("category[0][amount]", '' , ['placeholder' => '0.00', 'id' => 'category_0_amount']) }}
                            {{ HTML::image('img/subtract_something.png','subtract category',['id'=>'subtract_field_0','onClick'=>'removeCategorySet($(this).attr("id"))','width'=>25,'length'=>25]) }}    
                        </div>       
                        
                    </div><!-- end of add_remove_helper -->
                </div><!-- end of categ_ div -->

        </div><!-- end of categories -->

        <div id="recurring" class = "span3">
                <div id="recurring_transaction_start_date" class = "control-group {{ ($errors->has('start_date')) ? 'error' : '' }}">
                    {{ Form::label('recurring_transaction[start_date]','Start Date') }}
                    {{ Form::text('recurring_transaction[start_date]', Input::old('start_date'), ['id'=>'start_date']) }}
                </div>


                {{ Form::label('recurring_transaction[temporal_expression_id]','Transaction Type') }}
                {{ Form::select('recurring_transaction[temporal_expression_id]',[1 => 'Weekly', 2 => 'Monthly',3 => 'Yearly',
                   4=>'Daily'], '1' ,['id' => 'temporal_expression']) }}
                <br />

                <div id="recurring_transaction_stop_date" class = "control-group {{ ($errors->has('stop_date')) ? 'error' : '' }}">
                    Stops On: {{ Form::radio('recurring_transaction[recurring_end_options_id]', 1 ,true , ['id' => 'recur_stop']) }}
                    {{ Form::text('recurring_transaction[stop_date]', Input::old('stop_date'), ['id'=>'stop_date']) }}
                </div>
                <br />

                    Indefinitely: {{ Form::radio('recurring_transaction[recurring_end_options_id]', 2, '', ['id' => 'recur_indefinite']) }}
                <br />

                {{-- save for version 0.9 --}}
                {{-- Exactly: {{ Form::radio('recurring_transaction[recurring_end_options_id]',3, '', ['id'=>'recur_exactly']) }}
                {{ Form::text('recurring_transaction[exactly_how_many_times]', Input::old('exactly_how_many_times'), ['id'=>'exactly_how_many_times']) }} --}}
            
        </div><!-- end of recurring -->

    </div><!-- end of row-fluid -->

    <div id="save_and_cancel_buttons" class = "span8">
        {{ Form::submit('Save Transaction',['class'=>'btn btn-primary']) }}
    </div><!-- end of save_and_cancel_buttons -->
    {{ Form::close() }}
    
@stop
