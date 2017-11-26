<?php

declare (strict_types = 1);

/**
 * @author Marvin Aleman <mraleman@gmail.com>
 *
 * Write a function that takes a string and returns the index of the first
 * brace that breaks its balance (or returns the special value -1 if the string
 * is balanced). The first brace that breaks the balance is the brace closest
 * to the start of the string that isn’t part of a balanced pair. Please state
 * any additional assumptions you make and try to make your function as
 * efficient as you can. For extra credit, write unit tests!
 *
 * Examples:
 *
 * hello world		returns -1	Input is balanced
 * {}				returns -1	Input is balanced
 * {{{foo();}}}{}	returns -1	Input is balanced
 * {{}{}}			returns -1	Input is balanced
 * {{{}				returns 0	Brace at 0 has no close brace
 * }				returns 0	Brace at 0 has no open brace
 * {}{foo{}			returns 2	Brace at 2 has no close brace
 */
function isBalanced($str) {

	$val = -1;

	//return balanced if no braces found
	if (strpos($str, '{') === FALSE && strpos($str, '}') === false) {
		return $val;
	}

	$opened = [];
	$closed = 0;

	for ($i = 0; $i < strlen($str); $i++) {

		$char = substr($str, $i, 1);

		if ($char == '{') {

			//save last occurance of opened brace
			$opened[] = $i;

		} elseif ($char == '}') {

			$o = count($opened);

			//return 0 if there are no opened braces left
			if ($o === 0) {
				return 0;
			}

			//grab last closed brace and remove it
			unset($opened[$o - 1]);
			$opened = array_values($opened);
		}

	}

	return count($opened) != $closed ? $opened[0] : $val;

}
