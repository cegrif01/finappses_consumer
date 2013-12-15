@extends('master')

    @section('content')
        <div class="page-header">
            
        </div>
        
        <div class="span4">
            {{ Form::open() }}
                    
                <p>
                    {{ Form::label('email', 'Email') }}
                    {{ Form::email('email', null, ['required' => true]) }}
                </p>

                <p class="actions">
                    {{ Form::submit('Send Temporary Password', ['class' => 'btn btn-primary']) }}
                    
                </p>

            {{ Form::close() }}
        </div>
    
    @stop