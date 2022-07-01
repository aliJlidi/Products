<?php
require __DIR__.'/Dbh.inc.php';
class Product {
  // Properties
  private $sku;
  private $name;
  private $price;
  private $type;
  protected $dbCnx;

  public function __construct($sku="",$name="",$price="",$type=""){
    $this->sku=$sku;
    $this->name=$name;
    $this->price=$price;
    $this->type =$type;

    $this ->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD,[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
  }
  public function set_sku($sku){
    $this->sku = $sku;
  }
  public function get_sku() {
    return $this->sku;
  }

  public function set_name($name){
    $this->name = $name;
  }
  public function get_name() {
    return $this->name;
  }
  public function set_price($price){
    $this->price = $price;
  }
  public function get_price($price){
    return $this->price;
  }

  public function get_type($type){
    return $this->type;
  }
  public function set_type($type){
    $this->type = $type;
  }

  public function fetchAll(){
    try{
      $stm = $this->dbCnx->prepare("SELECT * FROM product");
      $stm->execute();
      return $stm->fetchAll();
    }
    catch(Exception $e){
           return $e->getMessage();
    }
  }

  public function fetchOne($id){
    try{
         $stm = $this->dbCnx->prepare("SELECT FROM product where id=?");
         $stm->execute([$id]);
         return $stm->fetchAll();
    }
    catch(Exception $e){
      return $e->getMessage();
    }
  }

  public function delete(){
    $selectedItems=[];
    try{
    
      $stm = $this->dbCnx->prepare("DELETE * FROM product WHERE sku IN (?)");
      $stm->execute([$selectedItems]);
      return $stm->fetchAll();
    }
    catch(Exception $e){
      return $e->getMessage();
    }
  }

}


// DVD is inherited from Product
class DVD extends Product {
    private $size;
 // Methods
 public function __construct($sku="",$name="",$price="",$size="")
 {
    $this->sku = $sku;
    $this->name = $name;
    $this->price =$price;
    $this->size = $size;
    $this ->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD,[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
    
 }
 public function set_size($size){
  $this->size = $size;
}
 public function get_size() {
    return $this->size;
   }

 public function insertData(){
  try{
    $stm = $this->dbCnx->prepare("INSERT INTO product(sku,name,price,type) values(?,?,?,?)");
    $stm->execute([$this->sku,$this->name,$this->price,$this->size,]);
    
  }
  catch(Exception $e){
    return $e->getMessage();
  }
 }


  }


  // Furniture is inherited from Product
class Furniture extends Product {
    private $height;
    private $width;
    private $length;
    private $dimension;
 // Methods
 public function __construct($sku,$name,$price,$height,$width,$length)
 {
    $this->sku = $sku;
    $this->name = $name;
    $this->price =$price;
    $this->height = $height;
    $this->width =$width;
    $this->length=$length;
    $this ->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD,[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
    
 }
 public function set_dimension($dimension){
  $this->dimension = $dimension;
}
   public function get_dimension() {
    global $height;
    global $width;
    global $lenght;
    return $this->$height."x".$width."x".$lenght;
   }
   public function insertData(){
    try{
      $stm = $this->dbCnx->prepare("INSERT INTO product(sku,name,price,type) values(?,?,?,?)");
      $stm->execute([$this->sku,$this->name,$this->price,$this->dimension,]);
      
    }
    catch(Exception $e){
      return $e->getMessage();
    }
   }

  }



  // Book is inherited from Product
class Book extends Product {
    public $weight;
 // Methods
 public function __construct($sku,$name,$price,$weight)
 {
    $this->sku = $sku;
    $this->name = $name;
    $this->price =$price;
    $this->weight = $weight;
    $this ->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD,[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
    
 }
 public function set_weight($weight){
  $this->name = $weight;
}
 public function get_weight() {
    return $this->weight;
   }
   public function insertData(){
    try{
    
      $stm =$this->dbCnx->prepare("INSERT INTO product(sku,name,price,type) values(?,?,?,?)");
      $stm->execute([$this->sku,$this->name,$this->price,$this->weight,]);
      
    }
    catch(Exception $e){
      return $e->getMessage();
    }
   }
  }
?>