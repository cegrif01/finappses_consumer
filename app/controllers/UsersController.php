<?php

class UsersController extends BaseController {

	public function __construct(User $user)
	{
		$this->user = $user;

	}

	public function index()
	{
		$users = $this->user->findAll();

		return Response::json($users);
	}

}