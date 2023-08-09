<?php

require_once "../../../Controllers/TypeController.php";
require_once "../../../Models/type.php";
if(isset($_POST['madein'])){
   $cc=new TypeController;                       
   $type=new Type;
   $type->type_name=$_POST['typename'];
   $type->madein=$_POST['madein'];  
   $cc->addType($type);
   header("location: ../AddType.php?status=true");
}