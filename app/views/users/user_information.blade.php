@extends('master')

    @section('content')
   
    <ul class = "inline">
         <li>{{ HTML::linkRoute('user_info_show', 'User Profile', [$user->id], ['id' => 'default_view', 'class'=>'user_pages']) }}</li>
        |<li>{{ HTML::linkRoute('change_password_show', 'Password Reset', [$user->id], ['class'=>'user_pages']) }}</li>
        |<li>{{ HTML::linkRoute('user_history', 'History', [$user->id], ['class'=>'user_pages']) }}</li>
        |<li>{{ HTML::linkRoute('user_settings_show', 'User Settings', [$user->id], ['class'=>'user_pages']) }}</li>
    </ul>
    <hr />
    <div id="user_content"></div>

    <script>
        //TODO - move this to a seperate file
        //TODO - use onLoad instead of document.ready to avoid the delay
        $(document).ready(function() {

            var href = $('#default_view').attr('href');
            $('#user_content').load(href);

            $('.user_pages').click(function() {
                var href = $(this).attr('href');
                $('#user_content').load(href);
                return false; //keeps page from redirecting
            });
        });
        
    </script>

@stop


