<?php
    error_reporting (E_ALL ^ E_NOTICE);
    $login = [
        'username' => "aziz",
        'password' => "admin"
      ];
        if($_POST['user'] == $login['username']){
          if($_POST['pass'] == $login['password']){
            header('Location: index.php');
          }else{
            echo "Password salah";
          }
        }else{
          echo "Username salah";
        }  
?>
