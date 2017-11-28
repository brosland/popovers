<?php

namespace App\Presenters;

use App\Components\UserPopover\UserPopoverControlTrait;
use Nette\Application\UI\Presenter;

abstract class BasePresenter extends Presenter
{
	use UserPopoverControlTrait;
}