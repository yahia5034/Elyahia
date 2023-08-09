<?php 

require_once '../../../Models/user.php';
require_once '../../../Controllers/DBController.php';
require_once '../../../Models/generalAuth.php';

class AuthController
{
    protected $db;

    //1. Open connection.
    //2. Run query & logic.
    //3. Close connection
    public function login(User $user)
    {
        $auth=new Auth;
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $query="select * from users where email='$user->email' or name='$user->email' and password ='$user->password'";
            $this->db->setQry($query);
            try{

                $result=$this->db->select();
            }catch(mysqli_sql_exception $e) {
                $auth->opensession();
                $_SESSION["errMsg"]="Please Enter the data correctly";
                $this->db->closeConnection();
                return false;
                return false;
            }
            catch(Exception $e){
                return false;
            }
            if(count($result)==0)
            {
                
                $auth->opensession();
                $_SESSION["errMsg"]="You have entered wrong email or password";
                $this->db->closeConnection();
                return false; 
            }
            else
            {
                $auth->opensession();
                $_SESSION["userId"]=$result[0]["userId"];
                $_SESSION["userName"]=$result[0]["name"];
                if($result[0]["roleId"]==1)
                {
                    $_SESSION["userRole"]="Admin";
                }
                else
                {
                    $_SESSION["userRole"]="Client";
                }
                $this->db->closeConnection();
                return true;
                
            }
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }
    }
    public function register(User $user)
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $query="insert into users values ('','$user->name','$user->email','$user->password',2)";
            $this->db->setQry($query);
            $result=$this->db->insert();
            if($result!=false)
            {
                session_start();
                $_SESSION["userId"]=$result;
                $_SESSION["userName"]=$user->name;
                $_SESSION["userRole"]="Client";
                $this->db->closeConnection();
                return true;
            }
            else
            {
                $_SESSION["errMsg"]="Somthing went wrong... try again later";
                $this->db->closeConnection();
                return false;
            }
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }
    }
    
}

?>
