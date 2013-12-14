<?php

class UsersController extends BaseController {

	public function __construct(User $user)
	{
		parent::__construct();
		$this->user = $user;

	}

	public function index()
	{
		$users = $this->user->all();

		pp($users);
	}

}