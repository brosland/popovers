<?php

namespace App\Model\User;

class UserEntity
{

	/**
	 * @var int
	 */
	private $id;
	/**
	 * @var string
	 */
	private $fullname, $username;
	/**
	 * @var string
	 */
	private $avatar;


	/**
	 * @param int $id
	 * @param string $fullname
	 * @param string $avatar
	 */
	public function __construct($id, $fullname, $username, $avatar)
	{
		$this->id = $id;
		$this->fullname = $fullname;
		$this->username = $username;
		$this->avatar = $avatar;
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getFullname()
	{
		return $this->fullname;
	}

	/**
	 * @return string
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * @return string
	 */
	public function getAvatar()
	{
		return $this->avatar;
	}
}