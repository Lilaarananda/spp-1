<?php

class Home extends Controller{
	public function index() {
		// echo "Hello World";
		$this->view("templates/header");
		$this->view("home/index");
		$this->view("templates/footer");
	}
}