<?php

namespace App\Components\UserList;

use App\Model\User\UserRepository;
use Nette\Application\UI\Control;

class UserList extends Control
{

	/**
	 * @var UserRepository
	 */
	private $userRepository;


	/**
	 * @param UserRepository $userRepository
	 */
	public function __construct(UserRepository $userRepository)
	{
		parent::__construct();

		$this->userRepository = $userRepository;
	}

	public function render()
	{
		$this->template->setFile(__DIR__ . '/UserList.latte');
		$this->template->userEntities = $this->userRepository->findUsers();

		$this->template->render();
	}
}

interface UserListFactoryInterface
{

	/**
	 * @return \App\Components\UserList\UserList
	 */
	function create();
}