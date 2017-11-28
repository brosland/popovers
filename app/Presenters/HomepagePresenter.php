<?php

namespace App\Presenters;

use App\Components\UserList\UserList;
use App\Components\UserList\UserListFactoryInterface;

final class HomepagePresenter extends \App\Presenters\BasePresenter
{

	/**
	 * @var UserListFactoryInterface
	 */
	private $userListFactory;


	/**
	 * @param UserListFactoryInterface $userListFactory
	 */
	public function __construct(UserListFactoryInterface $userListFactory)
	{
		parent::__construct();
		
		$this->userListFactory = $userListFactory;
	}

	/**
	 * @return UserList
	 */
	protected function createComponentUserList()
	{
		return $this->userListFactory->create();
	}
}