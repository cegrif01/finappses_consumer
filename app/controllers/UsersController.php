<?php

class UsersController extends BaseController {

	public function __construct(User $user)
	{
		$this->user = $user;

	}

	public function index()
	{
		$users = $this->user->findAll();
		
		return View::make('users.index', compact('users'));
	}



	public function show($id)
	{
		$user = (object) $this->user->find($id)->collection;

		return View::make('users.show', compact('user'));
	}


	public function edit($id)
	{

		$user = (object) $this->user->find($id)->collection;
		
		return View::make('users.edit', compact('user'));
		
	}

	public function update($id)
	{
		$user = $this->user->find($id);

		if(! $user) {

			throw new ModelNotFoundException;
		}

		$user->updateAttributes(Input::all());
		
		$user->save();
		pp($user);


	}

}