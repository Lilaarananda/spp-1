<?php

class Home extends Controller{
	public function index() {
		// echo "Hello World";
		$this->view("templates/header");
		$this->view("admin/index");
		$this->view("templates/footer");
	}
}
