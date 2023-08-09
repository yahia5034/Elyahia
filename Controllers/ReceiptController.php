<?php
require_once 'DBController.php';
class ReceiptController
{
    
    public function getRecieptOfProduct($sku)
    {
        $db=new DBController;
        if($db->openConnection()){
            $query="SELECT date,product_reciept.quantity,product_reciept.price,product_reciept.rid,reciept.status FROM reciept join product_reciept on reciept.rid = product_reciept.rid
             join customer on customer.cid = reciept.cid join products on products.sku=product_reciept.sku WHERE products.sku = '$sku' ORDER BY date DESC ;";
            $db->setQry($query);
            $result=$db->select();
            $db->closeConnection();
            return $result;
        }else{
            echo "failed in opeining connection";
            die();
        }
    }
    public function getReciepts()
    {
        $db=new DBController;
        if($db->openConnection()){
            $query="SELECT * FROM reciept join customer on reciept.cid= customer.cid";
            $db->setQry($query);
            $result=$db->select();
            $db->closeConnection();
            return $result;
        }else{
            echo "failed in opeining connection";
            die();
        }
    }
    public function getRecieptByRid($rid)
    {
        $db=new DBController;
        if($db->openConnection()){
            $query="SELECT * FROM reciept  join customer on reciept.cid= customer.cid WHERE rid ='$rid'";
            $db->setQry($query);
            $result=$db->select();
            $db->closeConnection();
            return $result;
        }else{
            echo "failed in opeining connection";
            die();
        }
    }

    public function addReceipt(Receipt $r)
    {
        $db=new DBController;
        if($db->openConnection()){
            $query="INSERT INTO reciept values ('','$r->date','$r->status','$r->cid');";
            $db->setQry($query);
            $result= $db->insert();
            $db->closeConnection();
            return $result;
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function addProductToReceipt(Product_receipt $r)
    {
        $db=new DBController;
        if($db->openConnection()){
            $query="INSERT INTO product_reciept values ('$r->sku','$r->rid','$r->quantity','$r->price');";
            $db->setQry($query);
            return $db->insert();
            $db->closeConnection();
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
}