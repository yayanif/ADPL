<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

class Input_test extends TestCase
{
	public function test_index()
	{
                $_SESSION['status'] = "login";
		$output = $this->request('GET', '/input');
		$this->assertContains('Promosikan Kost Anda?', $output);
	}
        
        public function test_inputkos(){
            $this->request('POST', 'Input/d_upload',
                    [
                        'Name' => 'Kost murah',
                        'Harga' => '500000',
                        'Pemilik' => 'yayan_if@gmail.com',
                        'Alamat' => 'Jln gianti kel. sukolilo, Surabaya',
                        'Desk' => 'Kamar mandi dalam, lemari pakaian',
                        'Jenis' => 'kost',
                        'Pic' => 'kosan-500x500.jpg'
                    ]);
            $actual = $_SESSION['Name'];
            $this->assertRedirect('http://localhost/adpl/index.php/login');
        }

        public function test_method_404()
	{
		$this->request('GET', 'input/method_not_exist');
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
