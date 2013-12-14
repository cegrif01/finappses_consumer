
    @include('users.partials.user_partial')

    {{ HTML::linkRoute('users.edit', 'Edit User', [$user->id], ['class'=>'btn']) }}