@include('errors_and_flash_messages')

{{ Form::open(['route' => ['user_info_update', $user->id], 'method' => 'PUT', 'enctype'=>'multipart/form-data']) }}
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

            <p class="actions">
                {{ Form::submit('Save Changes',['class'=>'btn btn-primary']) }}
                {{ HTML::link(URL::to('/'),'Cancel',['class'=>'btn']) }}
            </p>
        </div><!-- end of span4 -->

        <div class = "span4">
            <p>
                {{ Form::label('link_to_blog','Link To Blog') }}
                {{ Form::text('link_to_blog', $user->link_to_blog) }}
            </p>
            
            @foreach(SocialMediaType::all() as $i => $social_media)

                <p>
                {{ Form::label("social_media[$social_media->name][screen_name]", ucwords($social_media->name)) }}

                {{ Form::text("social_media[$social_media->name][screen_name]", $user->extract_screen_name($social_media->id) ) }}
                </p>
            @endforeach
        </div><!-- end of span4 -->

    </div><!-- end row-fluid -->
{{ Form::close() }}