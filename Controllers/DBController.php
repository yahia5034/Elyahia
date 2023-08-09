<?php


class DBController
{
    private $dbHost="localhost";
    private $dbUser="root";
    private $dbPassword="";
    private $dbName="elyahia";
    private $connection;
    private $qry;
    public function openConnection()
    {
        $this->connection=new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
        if ($this->connection->connect_error) {
            echo " Error in     Connection : ".$this->connection->connect_error;
            return false;
        } else {
            return true;
        }
    }

    public function closeConnection()
    {
        if ($this->connection) {
            $this->connection->close();
        } else {
            echo "Connection is not opened";
        }
    }
    public function select()
    {
        $result=$this->connection->query($this->qry);
        if (!$result) {
            echo "Error : ".mysqli_error($this->connection);
            return false;
        } else {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }
    
    public function insert()
    {
        $result=$this->connection->query($this->qry);
        if (!$result) {
            echo "Error : ".mysqli_error($this->connection);
            return false;
        } else {
            return $this->connection->insert_id;
        }
    }
    public function delete()
    {
        $result=$this->connection->query($this->qry);
        if (!$result) {
            echo "Error : ".mysqli_error($this->connection);
            return false;
        } else {
            return $result;
        }
    }
    public function update()
    {
        $result=$this->connection->query($this->qry);
        if (!$result) {
            echo "Error : ".mysqli_error($this->connection);
            return false;
        } else {
            return $result;
        }
    }
    public function getQry()
    {
        return $this->qry;
    }

    /**
     * Set the value of qry
     *
     * @return  self
     */ 
    public function setQry($qry)
    {
        $this->qry = $qry;
        return $this;
    }
}
