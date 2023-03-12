<?php

class Controller { //ur class controller untuk mengontrol ur website via url yang didapet dari app.php
  public function view($view, $data = []) {
    require_once "../app/view/{$view}.php"; // get di view file dari view folder
  }

   public function model($models) {
    require_once "../app/model/{$models}.php";
    return new $models; //return inisiasi class
   }
}