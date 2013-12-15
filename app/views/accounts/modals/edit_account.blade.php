
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="edit_account_label">Edit Account</h3>
</div>

<div class="modal-body">

    {{ Form::open(['url' => 'accounts/'.$account->id, 'method' => 'PUT']) }}
        
        <p>
            {{ Form::label('name','Account Name') }}
            {{ Form::text('name',$account->name) }}
        </p>

        <p>
            {{ Form::label('account_type_id','Account Type') }}
            {{ Form::select('account_type_id',[1 => 'checking',2 => 'savings',3 => '401k'],$account->account_type_id) }}
        </p>

        <p>
            {{ Form::label('opening_balance','Opening Balance') }}
            {{ Form::text('opening_balance',$account->opening_balance) }}
        </p>

                <p>
            {{ Form::label('current_balance','Current Balance') }}
            {{ Form::text('current_balance',$account->current_balance) }}
        </p>

        <div class="modal-footer">
            {{ Form::button('Cancel',['class'=>'btn btn-primary', 'data-dismiss'=>'modal']) }}
            {{ Form::submit('Save Changes',['class'=>'btn btn-primary']) }}
        </div>

        {{ Form::close() }}
</div>
