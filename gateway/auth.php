<?php
  include "../inc/functions.php";
  $db = new phpork_functions();

  /*if(isset($_POST['loginFlag'])){
    $u = $_POST['username'];
    $p = base64_decode($_POST['password']);
    if($db->login($u,$p)){
     //  $db->addHistory("",$_SESSION['username'] . " Logged in");
      header("location: /phpork/home");
    }else{
      header("location: /phpork/in?loginFailed=1");
    }
  }*/
  if(isset($_POST['signup'])){
    $u = $_POST['username'];
    $p = base64_encode($_POST['password']);
    $uType = $_POST['usertype'];
    $user = $_POST['user'];
    $db->signup($u, $p , $uType,$user);
     
  }

  if(isset($_POST['getUser'])){
    $user_id = $_POST['user_id'];
    echo json_encode($db->getUser($user_id)); 
    
  
  }

  if(isset($_POST['ddl_user'])){
     echo json_encode($db->ddl_user()); 
  }


?>