@extends('master')

    @section('content')

    <div class="span4">
        {{ Form::open(['route' => 'store_uploaded_csv', 'method' => 'POST', 'enctype'=>'multipart/form-data']) }}
    <div class="page-header">
        <h1>Welcome {{ (Auth::user()->name) ?: Auth::user()->username }}</h1>
     
    </div>
        <div class="control-group">
            {{ Form::label('csv', 'Csv File') }}
     
            <div class="fileupload" data-provides="fileupload">
                <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;">
                   
                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image">
                   
                </div>
                <div>
                    <span class="btn btn-file">
                        <span class="fileupload-new">Select csv file</span>
                        <span class="fileupload-exists">Change</span>
                        {{ Form::file('csv') }}
                    </span>
                    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                </div>
            </div>
        </div>

    <p class="actions">
        {{ Form::submit('Save Changes',['class'=>'btn btn-primary']) }}
        {{ HTML::link(URL::to('/transactions/upload_csv'),'Cancel',['class'=>'btn']) }}
    </p>
    
    </div><!-- end of span4 -->

    <div class="span4">
        <p>
            {{ Form::label('account_id', 'Accounts') }}
            {{ Form::select('account_id', $accounts) }}
        </p>
    </div>
 
    {{ Form::close() }}
    @stop
