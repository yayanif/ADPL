<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

class Login_test extends TestCase
{
        
        public function test_index_user() {
            $_SESSION['nama'] = 'alila@gmail.com';
            $_SESSION['status'] = 'login';
            
            $output = $this->request('GET', 'login/aksi_login');
            $this->assertRedirect('http://localhost/adpl/index.php/login');
        }
        
        public function test_index_admin() {
            $_SESSION['nama'] = "admin";
            $_SESSION['status'] = 'log';
            
            $output = $this->request('GET', 'Login/aksi_login');
            $this->assertRedirect('http://localhost/adpl/index.php/login');
        }
        
        public function test_index_notlogin() {
            $_SESSION['nama'] = '';
            $_SESSION['status'] = '';
            
            $output = $this->request('GET', 'Login/aksi_login');
            $this->assertRedirect('http://localhost/adpl/index.php/login', $output);
        }
        
        public function test_loginmasuk_user() {
            $this->request('POST', 'Login/aksi_login',
                    [
                        'nama' => 'alila@gmail.com',
                        'status' => 'login' 
                    ]);
            $actual = $_SESSION['status'];
            //$this->assertEquals('login', $actual);
             //$this->assertFalse( isset($_SESSION['status']) );
            $this->assertRedirect('http://localhost/adpl/index.php/login');
           
        }
        
	public function test_index()
	{
		$output = $this->request('GET', '/login');
		$this->assertContains('<input type="submit" value="Login">', $output);
	}

	public function test_method_404()
	{
		$this->request('GET', 'Login/method_not_exist');
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
