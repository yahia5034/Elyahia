<?php

class Auth{
    public function opensession(){
        if(!isset($_SESSION['userId']))
        {
            session_start();
        }
    }
    public function loggedin(){
        $this->opensession();
        if(isset($_SESSION['userId']))
        {
            return true;
        }
        else{
            return false;
        }
    }
    public function checkAdmin(){
        $this->opensession();
        if($_SESSION['userRole']=="Admin")
        {
            return true;
        }
        else{ return false;}
    }
    public function checkClient(){
        $this->opensession();
        if($_SESSION['userRole']=="Client")
        {
            return true;
        }
        else{ return false;}
    }
}

?>