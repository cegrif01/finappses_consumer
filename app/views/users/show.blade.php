
    <div class="row-fluid">

        <div class="span4">
            <p>
                {{ Form::label('name','Name') }}
                {{ Form::text('name', $user->name) }}
            </p>

            <p>
                {{ Form::label('username','Username') }}
                {{ Form::text('username', $user->username) }}
            </p>

            <p>
                {{ Form::label('email','Email') }}
                {{ Form::text('email', $user->email, ['required' => true]) }}
            </p>

            <p>
                {{ Form::label('bio','Bio') }}
                {{ Form::textarea('bio', $user->bio) }}
            </p>

        </div><!-- end of span4 -->
        {{ HTML::linkRoute('users.edit', 'Edit User', [$user->id], ['class'=>'btn']) }}

    </div>
