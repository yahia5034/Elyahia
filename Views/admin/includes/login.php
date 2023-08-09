<?php
  if(isset($_GET['logout']))
  {
    session_start();
    session_destroy();
    header("location: ../login.php");
  }
  require_once "../../../Models/user.php";
  require_once "../../../Controllers/AuthController.php";
  $errMsg="";
  if(isset($_POST['name']) && isset($_POST['password']))
    {
      if(!empty($_POST['name']) && !empty($_POST['password']))
      {
        $Auth=new AuthController;
        $user=new User;
        $user->email=$_POST['name'];
        $user->password=$_POST['password'];
        if($Auth->login($user))
        {
          if(!isset($_SESSION['userId']))
          {
            session_start();
          }
          if($_SESSION['userRole']=="admin")
          {
            
            header("location: ../Main.php");
          }
          else
          {
            header("location: ../Main.php");
          }
        }
        else
        {
          if(!isset($_SESSION['errMsg']))
          {
            session_start();
          }
          $errMsg=$_SESSION['errMsg'];
          header("location: ../login.php?err=$errMsg"); 
        }
      }
      else{
        header("location: ../login.php?err=Enter all fields"); 
       }
    }
    else{
      header("location: ../login.php?"); 
     }

?>