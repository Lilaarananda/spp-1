<?php

class Middleware{
    public static function auth(){
        if($_SESSION['user']['status'] != 'login'){
            header("Location: " . BASE_URL . "/auth");
        }
    }
}