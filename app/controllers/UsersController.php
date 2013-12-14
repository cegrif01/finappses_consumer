<?php

class UsersController extends BaseController {

	public function __construct(User $user)
	{
		$this->user = $user;

	}

	public function index()
	{
		pp($this->user);
		$users = $this->user->all();

		pp($users);
	}

}