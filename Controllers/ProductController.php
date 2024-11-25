<?php 

require_once 'DBController.php';
class ProductController
{
    private $db;

    //1. Open connection.
    //2. Run query & logic.
    //3. Close connection
   //  public function getCategories()
   //  {
   //       $this->db=new DBController;
   //       if($this->db->openConnection())
   //       {
   //          $query="select * from categories";
   //          return $this->db->select($query);
   //       }
   //       else
   //       {
   //          echo "Error in Database Connection";
   //          return false; 
   //       }
   //  }
    public function addProduct(Product $product)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="INSERT into products values('$product->sku','$product->pname','$product->quantity','$product->price','$product->property','','$product->type','$product->sellprice');";
            $this->db->setQry($query);
            return $this->db->insert();
            $this->db->closeConnection();
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }     
    }
    public function getAllProducts()
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $this->db->setQry("SELECT * from products join types on type=type_id ORDER BY type,pname;");
            $result=$this->db->select();
            $this->db->closeConnection();
            return $result;
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function getProductByName($name)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $this->db->setQry("SELECT * from products join types on type=type_id Where pname like '%$name%'  ORDER BY property;");
            $product=$this->db->select();
            $this->db->closeConnection();
            return $product;
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function getProductBySku($Sku)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $this->db->setQry("SELECT * from products join types on type=type_id Where sku = '$Sku';");
            $product=$this->db->select();
            $this->db->closeConnection();
            if(isset($product[0])){
               return $product[0];
            }else{
               return "";
            }
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function getPrices($Sku)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $this->db->setQry("SELECT * from prices Where sku = '$Sku' ORDER BY prices.date DESC;");
            $result= $this->db->select();
            $this->db->closeConnection();
            return $result;
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    

    public function deleteProduct($Sku)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="delete from products where sku = '$Sku'";
            $this->db->setQry($query);
            $result = $this->db->delete($query);
            $this->db->closeConnection();
            return $result;
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
/*
   //  public function getAllProductsWithImages()
   //  {
   //       $this->db=new DBController;
   //       if($this->db->openConnection())
   //       {
   //          $query="select products.id,products.name,price,quantity,categories.name as 'category',image from products,categories where products.categoryid=categories.id;";
   //          return $this->db->select($query);
   //       }
   //       else
   //       {
   //          echo "Error in Database Connection";
   //          return false; 
   //       }
   //  }
    
    
   //  public function getCategoryProducts($id)
   //  {
   //       $this->db=new DBController;
   //       if($this->db->openConnection())
   //       {
   //          $query="select products.id,products.name,price,quantity,categories.name as 'category',image from products,categories where products.categoryid=categories.id and categories.id=$id;";
   //          $this->db->setQry($query);
   //          return $this->db->select();
   //       }
   //       else
   //       {
   //          echo "Error in Database Connection";
   //          return false; 
   //       }
   //  }
*/
    public function updateProduct(Product $product,$prevsku)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="UPDATE products SET sku = '$product->sku',pname ='$product->pname', quantity = '$product->quantity', price = ROUND('$product->price',0), property = '$product->property',sellprice = ROUND('$product->sellprice',0), type = $product->type  WHERE products.sku = '$prevsku';";
            $this->db->setQry($query);
            return $this->db->update();
            $this->db->closeConnection();
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function updateProductReceipt(Product $product)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="UPDATE products SET  quantity = quantity+'$product->quantity', price = '$product->price' WHERE products.sku = '$product->sku';";
            $this->db->setQry($query);
            return $this->db->update();
            $this->db->closeConnection();
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function sellProductReceipt(Product $product)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="UPDATE products SET  quantity = quantity-'$product->quantity', sellprice = '$product->sellprice' WHERE products.sku = '$product->sku';";
            $this->db->setQry($query);
            $result =$this->db->update();
            $this->db->closeConnection();
            return $result;
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }//UPDATE products SET products.price = ROUND(products.price,0);
    public function updatePrice($type,$percent)
    {
      $this->db=new DBController;
      if($this->db->openConnection())
      {
         $query="UPDATE products SET  price = ROUND(price+(price*$percent),0) WHERE products.type = '$type';";
         $this->db->setQry($query);
         $result= $this->db->update();
         $this->db->closeConnection();
         return $result;
      }
      {
         echo "Error in Database Connection";
         return false; 
      }
    }
    public function updateAllPrice($percent)
    {
      $this->db=new DBController;
      if($this->db->openConnection())
      {
         $query="UPDATE products SET  price = ROUND(price+(price*$percent),0) ;";
         $this->db->setQry($query);
         $result= $this->db->update();
         $this->db->closeConnection();
         return $result;
      }
      {
         echo "Error in Database Connection";
         return false; 
      }
    }
    public function updateSellPrice($type, $percent)
    {
      $this->db=new DBController;
      if($this->db->openConnection())
      {
         $query="UPDATE products SET  sellprice = ROUND(price/(1-$percent),0) WHERE products.type = '$type';";
         $queryAll ="UPDATE products SET  sellprice = ROUND(price/(1-$percent),0);";
         $this->db->setQry($type == "*" ? $queryAll : $query);
         $result= $this->db->update();
         $this->db->closeConnection();
         return $result;
      }
      {
         echo "Error in Database Connection";
         return false; 
      }
    }
}

?>