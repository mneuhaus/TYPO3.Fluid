<?php
namespace TYPO3\Fluid\Tests\Unit\ViewHelpers;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "TYPO3.Fluid".           *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

require_once(__DIR__ . '/ViewHelperBaseTestcase.php');

/**
 * Testcase for UnlessViewHelper
 */
class UnlessViewHelperTest extends \TYPO3\Fluid\ViewHelpers\ViewHelperBaseTestcase {

	/**
	 * @var \TYPO3\Fluid\ViewHelpers\UnlessViewHelper
	 */
	protected $viewHelper;

	/**
	 * @var \TYPO3\Fluid\Core\ViewHelper\Arguments
	 */
	protected $mockArguments;

	public function setUp() {
		parent::setUp();
		$this->viewHelper = $this->getAccessibleMock('TYPO3\Fluid\ViewHelpers\UnlessViewHelper', array('renderChildren'));
		$this->injectDependenciesIntoViewHelper($this->viewHelper);
		$this->viewHelper->initializeArguments();
	}

	/**
	 * @test
	 */
	public function viewHelperRendersThenChildIfConditionIsTrue() {
		$actualResult = $this->viewHelper->render(TRUE);
		$this->assertEquals(NULL, $actualResult);
	}

	/**
	 * @test
	 */
	public function viewHelperRendersElseChildIfConditionIsFalse() {
		$this->viewHelper->expects($this->at(0))->method('renderChildren')->will($this->returnValue('foo'));
		$actualResult = $this->viewHelper->render(FALSE);
		$this->assertEquals('foo', $actualResult);
	}
}

?>