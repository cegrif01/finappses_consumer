{{-- This page get's called by user.account_overview when you click on
     the checking_accounts, savings_accounts, or retirement_accounts link
     This page populates the edit_account div via ajax
 --}}
    
    @if( sizeof($accounts)== 0 && $type==1)
        There are no checking accounts
    @elseif( sizeof($accounts)==0 && $type==2 )
        There are no savings accounts
    @elseif( sizeof($accounts)==0 && $type==3 )
        There are no retirement accounts
    @else
        @foreach($accounts as $account)
            {{ $account->name }}{{ HTML::link(URL::to('accounts/'.$account->id.'/edit'),'Edit Account',['class'=>'edit_account']) }}
        @endforeach
    @endif
    <script>
        $('.edit_account').click(function() {
            var href = $(this).attr('href');
            $('#edit_account_modal').load(href);
            $('#edit_account_modal').modal('show');
            return false; //keeps page from redirecting to account/{id}/edit
        });
    </script>