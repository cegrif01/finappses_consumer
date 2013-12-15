
@include('errors_and_flash_messages')
<div class="span4">
    {{ Form::open(array('method' => 'PUT', 'route' => array('change_password_update', $user->id)) ) }}
    
        <p>
            {{ Form::label('old_password','Old Password') }}
            {{ Form::password('old_password', ['required' => true]) }}
        </p>

        <p>
            {{ Form::label('password','New Password') }}
            {{ Form::password('password', ['required' => true]) }}
        </p>

        <p>
            {{ Form::label('password_confirmation','Confirm New Password') }}
            {{ Form::password('password_confirmation', ['required' => true]) }}
        </p>

        <p class="actions">
            {{ Form::submit('Change Password',['class'=>'btn btn-primary']) }}
        </p>
    {{ Form::close() }}
</div>