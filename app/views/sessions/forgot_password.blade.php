@extends('master')

    @section('content')
    <div class="page-header">
        
    </div>
    <div class="span4">
        {{ Form::open(['route' => 'send_temp_password', 'method' => 'POST']) }}
                
            <p>
                {{ Form::label('email','Email') }}
                {{ Form::text('email') }}
            </p>

            <p class="actions">
                {{ Form::submit('Send Link To Password Reset', ['class' => 'btn btn-primary']) }}
                {{ HTML::link(URL::to('forgot_password'), 'Cancel', ['class' => 'btn']) }}
            </p>
        {{ Form::close() }}
    </div>
    @stop