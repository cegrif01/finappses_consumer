    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        
        <title>Finappses</title>
        
        {{ HTML::style('css/bootstrap.css') }}
        {{ HTML::style('css/style.css') }}
        {{ HTML::style('css/bootstrap-fileupload.min.css') }}
        {{ HTML::style('css/bootstrap-responsive.css') }}
        {{ HTML::style('css/custom.css') }}
        {{ HTML::style('http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css') }}
        {{ HTML::script('js/bootstrap.js') }}
        {{ HTML::script('js/bootstrap-fileupload.min.js') }}

        {{ HTML::script('js/jquery.js') }}
        
        {{ HTML::script('js/bootstrap-modal.js') }}
        {{ HTML::script('js/bootstrap-alert.js') }}
        {{ HTML::script('http://code.jquery.com/ui/1.10.3/jquery-ui.js') }}
    </head>

    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                    <ul class="nav">

                        <li> {{ HTML::link('/', 'Home', ['class' => 'active']) }} </li>
                        
                        <li><a href="#">Contact Us</a></li>

                        @if(Auth::user())
                            <li>{{ HTML::link('transactions/create', 'Add Transaction') }}</li>
                            <li>{{ HTML::linkRoute('users.account_overview', 'Account Overview', array(Auth::user()['id'])) }}</li>
                            <li>{{ HTML::link('logout', 'Logout') }}</li>
                            <li>{{ HTML::link('user_profile/'. Auth::user()['id'], 'User Profile') }}</li>
                            <li>{{ HTML::linkRoute('upload_csv', 'Csv Backend', array(Auth::user()['id'])) }}</li>
                        @else
                            <li>{{ HTML::link('registration', 'Signup') }}</li>
                            <li>{{ HTML::link('login', 'Login') }}</li>
                        @endif

                    </ul>
            </div>
        </div>

        <div class="container">
            
            @include('errors_and_flash_messages')
            @yield('content')
        
        </div>
        
        {{ HTML::script('js/my_javascript/ajax_page.js') }}

    </body>
    </html>

