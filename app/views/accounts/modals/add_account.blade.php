
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Add Account</h3>
</div>

<div class="modal-body">

    {{ Form::open(array('route' => array('add_account', $user->id))) }}

    <p>
        {{ Form::label('name','Account Name') }}
        {{ Form::text('name') }}
    </p>

    <p>
        {{ Form::label('account_type_id','Account Type') }}
        {{ Form::select('account_type_id',[1 => 'checking',2 => 'savings',3 => '401k'],'1') }}
    </p>

    <p>
        {{ Form::label('opening_balance','Opening Balance') }}
        {{ Form::text('opening_balance') }}
    </p>

    <div class="modal-footer">
        {{ Form::button('Cancel',['class'=>'btn btn-primary', 'data-dismiss'=>'modal']) }}
        {{ Form::submit('Save Changes',['class'=>'btn btn-primary']) }}
    </div>

    {{ Form::close() }}

</div>
