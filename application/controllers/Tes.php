<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tes extends CI_Controller {
	function index()
	{
		$this->load->view('tes');
	}
}