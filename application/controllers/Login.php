<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
        if($this->session->userdata('username') != ''){
            redirect(base_url('Home/index'));
		}
		else{
			$this->load->view('login');
		}
	}
}