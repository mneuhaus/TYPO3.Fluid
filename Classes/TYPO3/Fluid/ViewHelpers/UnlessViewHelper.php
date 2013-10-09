<?php
namespace TYPO3\Fluid\ViewHelpers;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "TYPO3.Fluid".           *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * This view helper implements an if/else condition as an opposite to the if viewhelper.
 * The only difference is, that the condition is negated.
 * Check \TYPO3\Fluid\Core\Parser\SyntaxTree\ViewHelperNode::convertArgumentValue() to see how boolean arguments are evaluated
 *
 * **Conditions:**
 *
 * As a condition is a boolean value, you can just use a boolean argument.
 * Alternatively, you can write a boolean expression there.
 * Boolean expressions have the following form:
 * XX Comparator YY
 * Comparator is one of: ==, !=, <, <=, >, >= and %
 * The % operator converts the result of the % operation to boolean.
 *
 * XX and YY can be one of:
 * - number
 * - Object Accessor
 * - Array
 * - a ViewHelper
 * Note: Strings at XX/YY are NOT allowed, however, for the time being,
 * a string comparison can be achieved with comparing arrays (see example
 * below).
 * ::
 *
 *   <f:unless condition="{rank} > 100">
 *     Will be shown if rank is > 100
 *   </f:unless>
 *   <f:unless condition="{rank} % 2">
 *     Will be shown if rank % 2 != 0.
 *   </f:unless>
 *   <f:unless condition="{rank} == {k:bar()}">
 *     Checks if rank is equal to the result of the ViewHelper "k:bar"
 *   </f:unless>
 *   <f:unless condition="{0: foo.bar} == {0: 'stringToCompare'}">
 *     Will result true if {foo.bar}'s represented value equals 'stringToCompare'.
 *   </f:unless>
 *
 * = Examples =
 *
 * <code title="Basic usage">
 * <f:unless condition="somecondition">
 *   This is being shown in case the condition does not match.
 * </f:unless>
 * </code>
 * <output>
 * Everything inside the <f:unless> tag is being displayed if the condition evaluates to FALSE.
 * </output>
 *
 * @see \TYPO3\Fluid\Core\Parser\SyntaxTree\ViewHelperNode::convertArgumentValue()
 * @api
 */
class UnlessViewHelper extends AbstractViewHelper {

	/**
	 * Renders it's childNodes if the condition is FALSE
	 *
	 * @param boolean $condition View helper condition
	 * @return string the rendered string
	 * @api
	 */
	public function render($condition) {
		if (!$condition) {
			return $this->renderChildren();
		}
	}
}

?>