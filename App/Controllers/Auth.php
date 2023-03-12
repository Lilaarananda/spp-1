<?php

class Auth extends controller{
  public function index(){
    $data['users'] = $this->model("user_model")->getAllUsers();
    $this->view("templates/header");
    $this->view("auth/login", $data);
    $this->view("templates/footer");
  }

  public function login(){
    if($_POST['username'] == 'admin' && $_POST['password'] == 'admin'){
        header("Location: " . BASE_URL . "/admin");
    } else{
        $user = $this->model("User_model")->getUserByUsername($_POST['username']);
        if($this->model("User_model")->authByUsername($_POST) > 0){
            if($user['role'] == '1'){
                header("Location: " . BASE_URL . "/petugas");
            } else{
                header("Location: " . BASE_URL . "/home");
            }
        } else{
            header("Location: ". BASE_URL . "/auth");
        }
    }
 }

 public function logout(){
  session_unset();
  session_destroy();
  header("Location:" .BASE_URL. "/auth/login");
 }
}