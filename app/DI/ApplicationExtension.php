<?php

namespace App\DI;

use Nette\DI\CompilerExtension;

class ApplicationExtension extends CompilerExtension
{

	public function loadConfiguration()
	{
		parent::loadConfiguration();

		$builder = $this->getContainerBuilder();

		$services = $this->loadFromFile(__DIR__ . DIRECTORY_SEPARATOR . 'config.neon');

		$this->compiler->loadDefinitions($builder, $services, $this->name);
	}
}