@extends('master')

    @section('content')
        <h1>Reset Your Password Now</h1>

    <div class="span4">
        {{ Form::open() }}
            {{ Form::hidden('token', $token) }}

            <p>
                {{ Form::label('email', 'Email Address') }}
                {{ Form::email('email', null, ['required' => true]) }}
            </p>

            <p>
                {{ Form::label('password', 'Enter New Password:') }}
                {{ Form::password('password', ['required' => true]) }}
            </p>

            <p>
                {{ Form::label('password_confirmation', 'Confirm New Password') }}
                {{ Form::password('password_confirmation', ['required' => true]) }}
            </p>

            <p class="actions">
                {{ Form::submit('Create New Password', ['class' => 'btn btn-primary']) }}
            </p>
        {{ Form::close() }}

    </div>
@stop