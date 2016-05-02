<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function index(){		
		$this->load->database('default');
		$this->load->model('animal_model');

		$this->load->view("Login/index.php");
	}
}