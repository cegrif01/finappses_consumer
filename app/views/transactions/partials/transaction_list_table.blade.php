
    
    {{--@if( sizeof($transactions)== 0)
        There are no transactions, you should add some transactions
    @else--}}
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Description</th>
                <th>Purchase Date</th>
                <th>Purchase Amount</th>
                <th>Account</th>
                <th>View Transaction</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user->accounts as $account)
                @foreach($account->transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->description }}</td>
                        <td>{{ $transaction->purchase_date}}</td>
                        <td>{{ $transaction->amount}}</td>
                        <td>{{ $account->name }}</td>

                        <td>{{ HTML::link(URL::to('transactions/'.$transaction->id.'/edit'), 'Update', ['class'=>'edit_transaction']) }}</td>

                        {{ Form::open(['url' => 'transactions/'.$transaction->id,  'method' => 'DELETE']) }}
                        
                            <td>{{ Form::submit('Delete',['class'=>'btn btn-primary']) }}</td>
                        {{ Form::close() }}
                    </tr>
                @endforeach
            @endforeach

        </tbody>
    </table>
    {{-- $user->transactions->links() --}}
    {{--@endif--}}