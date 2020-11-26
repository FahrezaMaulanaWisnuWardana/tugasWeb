<?php
    error_reporting (E_ALL ^ E_NOTICE);
    $login = [
        ['username' => "aziz",
        'password' => "admin"],
        ['username' => "rahmawan",
        'password' => "123"]];
      foreach($login as $data){
        if($_POST['user'] == $data['username']){
          if($_POST['pass'] == $data['password']){
            header('Location: index.php');
          }else{
            echo "Password salah";
            die();
          }
        }else{
          echo "Username salah";
          die();
        }}
?>