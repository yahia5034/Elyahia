<?php 

require_once 'DBController.php';
// require_once '../Models/customer.php';
class CustomerController
{

    public function addCustomer(Customer $customer){
        $db=new DBController;
        if($db->openConnection()){
            $query="INSERT into customer values('','$customer->cname','$customer->balance');";
            $db->setQry($query);
            $db->insert();
            $db->closeConnection();
        }else{
            echo "error in opening connection ";
        }
    }
    public function updateCustomer(Customer $customer){
        $db=new DBController;
        if($db->openConnection()){
            $query="UPDATE customer SET cname = '$customer->cname', balance ='$customer->balance' where cid='$customer->cid';";
            $db->setQry($query);
            return $db->update();
            $db->closeConnection();
        }else{
            echo "error in opening connection ";
        }
    }
    public function getCustomers(){
        $db=new DBController;
        if($db->openConnection()){
            $query="SELECT * FROM customer";
            $db->setQry($query);
            return $db->select();
            $db->closeConnection();

        }else{
            echo "error in opening connection ";
        }
    }
    public function getCustomerandreciepts(Customer $customer){
        
    }
    public function getCustomerById($id){
        $db=new DBController;
        if($db->openConnection()){
            $query="SELECT * FROM customer where cid=$id";
            $db->setQry($query);
            $customer= $db->select();
            $db->closeConnection();
            if(isset($customer[0])){
                return $customer[0];
            } else{
                return 0;
            }   
        }else{
            echo "error in opening connection ";
        }
    }
    public function getCustomerByName($name){
        $db=new DBController;
        if($db->openConnection()){
            $query="SELECT * FROM customer where name=$name";
            $db->setQry($query);
            $customer= $db->select();
            $db->closeConnection();
            if(isset($customer[0])){
                return $customer[0];
            } else{
                return 0;
            }   
        }else{
            echo "error in opening connection ";
        }
    }
}