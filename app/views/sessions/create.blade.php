@extends('master')
    
    @section('content')
    
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

            <p>
                {{ Form::label('password_confirmation','Password Confirmation') }}
                {{ Form::password('password_confirmation', ['required' => true]) }}
            </p>

            <p class="actions">
                {{ Form::submit('Sign Up',['class'=>'btn btn-primary']) }}
                {{ HTML::link(URL::to('/'),'Cancel',['class'=>'btn']) }}
            </p>
        
        {{ Form::close() }}
    </div>
    @stop
