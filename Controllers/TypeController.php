<?php

require_once 'DBController.php';

class TypeController
{
    //ADD Type
    public function addType(Type $type)
    {
        $db=new DBController();
        if ($db->openConnection()) {
            $query="INSERT into types values('','$type->type_name','$type->madein');";
            $db->setQry($query);
            $db->insert();
            $db->closeConnection();
        } else {
            echo "error in opening connection ";
        }
    }

    //update Type
    public function updateType(Type $type)
    {
        $db=new DBController();
        if ($db->openConnection()) {
            $query="UPDATE type SET 'type_name' = '$type->type_name', madein ='$type->madein' where type_id='$type->type_id';";
            $db->setQry($query);
            return $db->update();
            $db->closeConnection();
        } else {
            echo "error in opening connection ";
        }
    }

    public function getTypes()
    {
        $db=new DBController();
        if ($db->openConnection()) {
            $query="SELECT * FROM types";
            $db->setQry($query);
            return $db->select();
            $db->closeConnection();
        } else {
            echo "error in opening connection ";
        }
    }
}
