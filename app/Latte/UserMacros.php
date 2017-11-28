<?php

namespace App\Latte;

use Latte\Compiler;
use Latte\MacroNode;
use Latte\Macros\MacroSet;
use Latte\PhpWriter;

class UserMacros extends MacroSet
{

	/**
	 * @param Compiler $compiler
	 */
	public static function install(Compiler $compiler)
	{
		$me = new static($compiler);

		$me->addMacro('userPopover', null, null, [$me, 'macroUserPopover']);
	}

	/**
	 * n:user_popover="..."
	 */
	public function macroUserPopover(MacroNode $node, PhpWriter $writer)
	{
		$write = '$_tmp = %node.array; echo \' data-user-popover="\' . '
			. '$presenter->link(\'showUserPopover!\', $_tmp[0]->getId()) . \'"\';';

		return $writer->write($write);
	}
}