<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function test()
	{
		return 'test';
	}

	public function base64url_encode($data) 
	{ 
		return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
	} 

	public function base64url_decode($data) 
	{ 
		return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
	} 

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */