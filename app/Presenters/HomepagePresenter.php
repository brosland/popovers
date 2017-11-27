<?php

namespace App\Presenters;

use App\Model\User\UserRepository;
use Nette\Application\UI\Presenter;

class HomepagePresenter extends Presenter
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

	public function renderDefault()
	{
		$this->template->userEntities = $this->userRepository->findUsers();
	}
}