
@include('errors_and_flash_messages')
{{ Form::open(['route' => ['user_settings_update', $user->id], 'method' => 'PUT']) }}

    <p>Allow Recurring Transactions From Csv Imports</p>

    No:  {{ Form::radio("user_setting[1]", 0, $user->get_user_settings(1, 0), ['id' => 'no_recurring_from_upload']) }} <br />
    Yes: {{ Form::radio("user_setting[1]", 1, $user->get_user_settings(1, 1), ['id' => 'yes_recurring_from_upload']) }}

    <div id= "upload_option_description">We'd prefer that you manually add recurring transactions so you don't inadvertenly save the same recurring transaction twice.</div>
    <hr />

    <p class="actions">
        {{ Form::submit('Save Changes',['class'=>'btn btn-primary']) }}
        {{ HTML::linkRoute('user_profile', 'Cancel', $user->id, ['class'=>'btn']) }}
    </p>

{{ Form::close() }}