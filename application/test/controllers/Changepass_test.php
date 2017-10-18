<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

class Changepass_test extends TestCase
{
	public function test_index()
	{
                $_SESSION['status'] = "log";
		$output = $this->request('GET', 'Changepass/index');
		$this->assertContains('Silahkan ganti pass anda...', $output);
	}

	public function test_method_404()
	{
		$this->request('GET', 'Changepass/method_not_exist');
		$this->assertResponseCode(404);
	}

	public function test_APPPATH()
	{
		$actual = realpath(APPPATH);
		$expected = realpath(__DIR__ . '/../..');
		$this->assertEquals(
			$expected,
			$actual,
			'Your APPPATH seems to be wrong. Check your $application_folder in tests/Bootstrap.php'
		);
	}
}
