<?php

class UsersController extends BaseController {

	public function __construct(User $user, Transaction $transaction)
	{
		$this->user = $user;
		$this->transaction = $transaction;

	}

	public function index()
	{
		$users = $this->user->findAll([], null, null, null, ['includes[0]' => 'transactions', 'includes[1]' => 'accounts']);
		pp($users);
		return View::make('users.index', compact('users'));
	}

	public function create()
	{

	}

	public function store()
	{


	}



	public function account_overview($id)
	{
		$user = $this->user->find($id, ['includes[0]' => 'accounts'])->collection;
		Transaction::$resourceName = 'Transaction';
		Transaction::$nestedUnder = "User:$id";
		
		$transactions = $this->transaction->findAll();
		
		$user = json_decode($user);
		

		return View::make('users.account_overview', compact('user', 'transactions'));
	}


	public function edit($id)
	{

		
		
		return View::make('users.edit', compact('user'));
		
	}

	public function update($id)
	{
		$user = $this->user->find($id);
		
		if(! $user) {

			throw new ModelNotFoundException;
		}

		$user->updateAttributes(Input::all());
		$user->id = $id;
		
		if($user->save()) {
			return Redirect::route('users.show', $id);	
		} else {
			pp($user);
			return Redirect::route('users.edit', $id)->withErrors();
		}
		


	}

}