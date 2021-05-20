<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vue extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper('vite');
    }

	public function index()
	{
		$this->load->view('index.vue.php');
	}
}
