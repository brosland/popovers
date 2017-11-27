<?php

namespace App\Components\UserPopover;

use App\Model\User\UserEntity;
use Nette\Application\UI\Control;
use Nette\Http\Session;
use Nette\Http\SessionSection;

final class UserPopoverControl extends Control
{

	/**
	 * @var Session
	 */
	private $session;
	/**
	 * @var SessionSection
	 */
	private $sessionSection;
	/**
	 * @var UserEntity
	 */
	private $user;


	/**
	 * @param Session $session
	 * @param UserEntity $user
	 */
	public function __construct(Session $session, UserEntity $user)
	{
		parent::__construct();

		$this->session = $session;
		$this->user = $user;

		$this->onAnchor[] = [$this, 'init'];
	}

	public function init()
	{
		$this->sessionSection = $this->session->getSection(self::class);

		if (!isset($this->sessionSection['following']))
		{
			$this->sessionSection['following'] = [];
		}
	}

	/**
	 * @param boolean $follow
	 */
	public function handleFollow($follow)
	{
		$following = $this->sessionSection['following'];
		$following[$this->user->getId()] = $follow;

		$this->sessionSection['following'] = $following;

		$this->redrawControl();
	}

	public function handleMessage()
	{
		$this->flashMessage('Not implemented.');
		$this->redrawControl('flashes');
	}

	public function render()
	{
		$following = isset($this->sessionSection['following'][$this->user->getId()]) &&
			$this->sessionSection['following'][$this->user->getId()];

		$this->template->setFile(__DIR__ . '/UserPopoverControl.latte');
		$this->template->user = $this->user;
		$this->template->following = $following;
		$this->template->render();
	}
}

interface UserPopoverControlFactoryInterface
{

	/**
	 * @param UserEntity $user
	 * @return UserPopoverControl
	 */
	function create(UserEntity $user);
}