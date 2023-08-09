<?php

require_once "../../../Controllers/CustomerController.php";
require_once "../../../Models/customer.php";
if(isset($_POST['cname'])){
   $cc=new CustomerController;                       
   $cus=new Customer;
   $cus->cname=$_POST['cname'];
   $cus->balnce=$_POST['balance'];  
   $cc->addCustomer($cus);
   header("location: ../AddCustomer.php?status=true");
}