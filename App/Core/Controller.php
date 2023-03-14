<?php

class Controller { //ur class controller untuk mengontrol ur website via url yang didapet dari app.php
  public function view($view, $data = []) {
    require_once "../app/views/$view.php"; // get di view file dari view folder
  }

   public function model($model) {
    require_once "../app/models/$model.php";
    return new $model; //return inisiasi class
   }
}

