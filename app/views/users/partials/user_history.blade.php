@include('errors_and_flash_messages')

@foreach($user->history as $history)
    {{ $history->event }} on {{ $history->created_at }}
    <hr />
@endforeach