    @if ($errors->any() || Session::has('error'))
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{ Session::get('error') }}</strong>
            <ul>
                {{ implode("\n", $errors->all('<li class="error">:message</li>')) }}
            </ul>
        </div>
    @endif

    <ul class = "flash">
        @if (Session::has('status'))
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h2 class = "alert alert-success">{{ Session::get('status') }}</h2>
        @endif
    </ul>


    <ul class="flash">
        @if(Session::has('invalid'))
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h2 class = "alert alert-error">{{ Session::get('invalid') }}<h2/>
        @endif
    </ul>

    <ul class="flash">
        @if(Session::has('account_successfully_updated'))
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h2 class = "alert alert-success">{{ Session::get('account_successfully_updated') }}<h2/>
            {{ Session::forget('account_successfully_updated') }}
        @endif
    </ul>

    <ul class="flash">
        @if(Session::has('password_reset'))
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h2 class = "alert alert-success">{{ Session::get('password_reset') }}<h2/>
            {{ Session::forget('password_reset') }}
        @endif
    </ul>

    <ul class="flash">
        @if(Session::has('password_updated'))
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h2 class = "alert alert-success">{{ Session::get('password_updated') }}<h2/>
            {{ Session::forget('password_updated') }}
        @endif
    </ul>

    <ul class="flash">
        @if(Session::has('password_update_failed'))
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h2 class = "alert alert-error">{{ Session::get('password_update_failed') }}<h2/>
            {{ Session::forget('password_update_failed') }}
        @endif
    </ul>
    
    <ul class="flash">
        @if(Session::has('no_user_by_that_email'))
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h2 class = "alert alert-error">{{ Session::get('no_user_by_that_email') }}<h2/>
            {{ Session::forget('no_user_by_that_email') }}
        @endif
    </ul>

    <ul class="flash">
        @if(Session::has('category_errors'))
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h2 class = "alert alert-error">@foreach(Session::get('category_errors') as $i=>$message)<h2/>
                    @foreach($message as $error)
                        {{ $error }}<br />
                    @endforeach
                @endforeach
            {{ Session::forget('category_errors') }}
        @endif
    </ul>

    <ul class="flash">
        @if(Session::has('successful_user_profile_edit'))
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h2 class = "alert alert-success">{{ Session::get('successful_user_profile_edit') }}<h2/>
            {{ Session::forget('successful_user_profile_edit') }}
        @endif
    </ul>

     <ul class="flash">
        @if(Session::has('no_accounts'))
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h2 class = "alert alert-error">{{ Session::get('no_accounts') }}<h2/>
            {{ Session::forget('no_accounts') }}
        @endif
    </ul>

    <ul class="flash">
        @if(Session::has('new_transaction_created'))
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h2 class = "alert alert-success">{{ Session::get('new_transaction_created') }}<h2/>
            {{ Session::forget('new_transaction_created') }}
        @endif
    </ul>

    <ul class="flash">
        @if(Session::has('new_account_created'))
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h2 class = "alert alert-success">{{ Session::get('new_account_created') }}<h2/>
            {{ Session::forget('new_account_created') }}
        @endif
    </ul>

    <ul class="flash">
        @if(Session::has('not_logged_in'))
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h2 class = "alert alert-error">{{ Session::get('not_logged_in') }}<h2/>
            {{ Session::forget('not_logged_in') }}
        @endif
    </ul>

    <ul class="flash">
        @if(Session::has('deny_page_visitation'))
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h2 class = "alert alert-error">{{ Session::get('deny_page_visitation') }}<h2/>
            {{ Session::forget('deny_page_visitation') }}
        @endif
    </ul>