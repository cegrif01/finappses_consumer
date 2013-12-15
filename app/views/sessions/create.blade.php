@if ($errors->any() || Session::has('error'))
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>{{ Session::get('error') }}</strong>
        <ul>
            {{ implode("\n", $errors->all('<li class="error">:message</li>')) }}
        </ul>
    </div>
@endif

<div class="span4">
    {{ Form::open(['route' => 'sessions.store']) }}
   
        <p>
            {{ Form::label('email','Email') }}
            {{ Form::text('email', '', ['required' => true]) }}
        </p>

        <p>
            {{ Form::label('password','Password') }}
            {{ Form::password('password', ['required' => true]) }}
        </p>

        <p class="actions">
            {{ Form::submit('login', ['class'=>'btn btn-primary']) }}
            {{ link_to('password/remind', 'Forgot Your Password?') }}
        </p>
    
    {{ Form::close() }}
</div>
