<?php
class about extends CI_Controller{
	public function index(){
		$data["title"] = "About";

		$this->load->view("theme/header", $data);
		$this->load->view("about/index");
		$this->load->view("theme/footer");
	}
}