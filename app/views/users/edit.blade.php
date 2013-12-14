{{ Form::open(['route' => ['users.update', $user->id], 'method' => 'PATCH']) }}

    @include('users.partials.user_partial')

    <p class="actions">
        {{ Form::submit('Save Changes',['class'=>'btn btn-primary']) }}
        {{ HTML::linkRoute('users.show', 'Cancel', [$user->id], ['class'=>'btn']) }}
    </p>

{{ Form::close() }}