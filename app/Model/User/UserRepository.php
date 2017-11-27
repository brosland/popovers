<?php

namespace App\Model\User;

class UserRepository
{

	/**
	 * @var UserEntity[]
	 */
	private $users = [];


	public function __construct()
	{
		$this->users[1] = new UserEntity(
			1, 'Adam Žurek', 'adaam',
			'https://ca.slack-edge.com/T09DZEGDN-U31SFKHP0-gf9638e8674c-72'
		);
		$this->users[2] = new UserEntity(
			2, 'Marek Bartoš', 'mabar',
			'https://ca.slack-edge.com/T09DZEGDN-U4F6AQ803-af93c64bdd0e-72'
		);
		$this->users[3] = new UserEntity(
			3, 'Martin Bros', 'brosland',
			'https://ca.slack-edge.com/T09DZEGDN-U3N9GR4N4-07aa27cbd457-72'
		);
	}

	/**
	 * @return UserEntity[]
	 */
	public function findUsers()
	{
		return $this->users;
	}

	/**
	 * @param int $id
	 * @return UserEntity
	 * @throws RuntimeException
	 */
	public function getUserById($id)
	{
		if (isset($this->users[$id]))
		{
			return $this->users[$id];
		}

		throw new RuntimeException('User not found.');
	}
}