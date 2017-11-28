<?php

namespace App\Components\UserPopover;

use App\Model\User\UserRepository;
use Nette\Application\BadRequestException;
use Nette\Application\UI\Multiplier;
use RuntimeException;
use stdClass;

trait UserPopoverControlTrait
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
	 * @return stdClass
	 */
	public abstract function terminate();

	/**
	 * @param int $userId
	 */
	public function handleShowUserPopover($userId)
	{
		$this['userPopover'][$userId]->render();

		$this->terminate();
	}

	// inject *****************************************************************/
	/**
	 * @param UserRepository $userRepository
	 */
	public function injectUserRepository(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	/**
	 * @param UserPopoverControlFactoryInterface $upcf
	 */
	public function injectUserPopoverControlFactoryInterface(UserPopoverControlFactoryInterface $upcf)
	{
		$this->userPopoverControlFactory = $upcf;
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