<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

class Homelog_test extends TestCase
{
        public function setUp(){
            if(isset($_SESSION)) $_SESSION = array();
            $this->resetInstance();
            $this->CI->load->model('Mymodel');
            $this->objl = $this->CI->Mymodel; 
        }
    
	public function test_method_404()
	{
		$this->request('GET', 'homelog/method_not_exist');
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
        public function test_index(){
            $_SESSION['status'] = "login";
            
            $output = $this->request('get', 'Homelog/index');
            $this->assertContains("Welcome to E-KostON ", $output);
        }
        
        public function test_logout_user(){
            $_SESSION['status'] = 'login';
            
            $this->assertTrue( isset($_SESSION['status']) );
            $this->request('GET', 'Homelog/logout');
        }
}
