

    {{ Form::open(['route'=>'sessions.store', 'id' => 'login_form']) }}

        <p>
            {{ Form::label('email','Email') }}
            {{ Form::text('email') }}
        </p>

        <p>
            {{ Form::label('password','Password') }}
            {{ Form::password('password') }}
        </p>

        <p class="actions">
            {{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
            {{ link_to('password/remind', 'Forgot Your Password?') }}

        </p>
    {{ Form::close() }}
