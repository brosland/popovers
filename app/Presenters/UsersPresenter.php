<?php

namespace App\Presenters;

use App\Components\UserPopover\UserPopoverControl;
use App\Components\UserPopover\UserPopoverControlFactoryInterface;
use App\Model\User\UserRepository;
use Nette\Application\BadRequestException;
use Nette\Application\ForbiddenRequestException;
use Nette\Application\UI\Multiplier;
use Nette\Application\UI\Presenter;
use RuntimeException;

final class UsersPresenter extends Presenter
{

	/**
	 * @var UserRepository
	 */
	private $userRepository;
	/**
	 * @var UserPopoverControlFactoryInterface
	 */
	private $userPopoverControlFactory;


	/**
	 * @param UserRepository $userRepository
	 * @param UserPopoverControlFactoryInterface $userPopoverControlFactory
	 */
	public function __construct(UserRepository $userRepository,
		UserPopoverControlFactoryInterface $userPopoverControlFactory)
	{
		parent::__construct();

		$this->userRepository = $userRepository;
		$this->userPopoverControlFactory = $userPopoverControlFactory;
	}

	/**
	 * @param int $userId
	 */
	public function actionUserPopover($userId)
	{
		if (!$this->isAjax())
		{
			throw new ForbiddenRequestException();
		}
	}

	/**
	 * @param int $userId
	 */
	public function renderUserPopover($userId)
	{
		$this->template->userId = $userId;
	}

	// factories **************************************************************/
	/**
	 * @return UserPopoverControl
	 * @throws BadRequestException
	 */
	protected function createComponentUserPopover()
	{
		return new Multiplier(function ($userId)
		{
			try
			{
				$user = $this->userRepository->getUserById($userId);

				return $this->userPopoverControlFactory->create($user);
			}
			catch (RuntimeException $ex)
			{
				throw new BadRequestException();
			}
		});
	}
}