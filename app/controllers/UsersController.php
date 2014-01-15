<?php

use Finappses\FormObjects\AccountOverviewForm;

class UsersController extends BaseController {

	public function __construct(AccountOverviewForm $accounts_overview)
	{

		$this->accounts_overview = $accounts_overview;
	}

	public function index()
	{
		$users = $this->user->findAll([], null, null, null, ['includes[0]' => 'transactions', 'includes[1]' => 'accounts']);
		
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

		$user = $this->accounts_overview->getUserFinancialData($id);
		
		return View::make('users.account_overview', compact('user'));
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