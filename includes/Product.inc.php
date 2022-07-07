<?php
require __DIR__.'/Dbh.inc.php';
class Product {
  // Properties
  private $sku;
  private $name;
  private $price;
  private $type;
  protected $dbCnx;

  //fucntions
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
    $this->price = $price." $";
  }
  public function get_price(){
    return $this->price;
  }
  public function __construct($sku="",$name="",$price=""){
    $this->sku=$sku;
    $this->name=$name;
    $this->price=$price;
    $this ->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD,[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
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
         $stm = $this->dbCnx->prepare('SELECT * FROM product where sku=?');
         $stm->execute([$id]);
         return $row = $stm->fetch(PDO::FETCH_ASSOC); 
  }
  public function insertData($sku,$name,$price,$type){
    try{
      $stm = $this->dbCnx->prepare("INSERT INTO product(sku,name,price,type) values(?,?,?,?)");
      $stm->execute([$sku,$name,$price,$type]);
     echo "<script>document.location='index.php'</script>";   
    }
    catch(Exception $e){
      echo 'Message: '. $e->getMessage();
    }
   }
  public function delete($id){  
      $stm = $this->dbCnx->prepare("DELETE  FROM product WHERE sku=?");
      $stm->execute([$id]);
      return $stm->fetchAll();  
  }
}




// DVD is inherited from Product
class DVD extends Product {
 // Methods
  public function __construct($sku="",$name="",$price="",$type="")
    {
    parent::__construct($sku,$name,$price,$type);
    $this->type=$type;
    }
  public function set_type($type){
  $this->type = "Size: ".$type." MB";
    }
  public function get_type() {
    return $this->type;
    }
  public function Add(){
       $add = parent::insertData($this->get_sku(),$this->get_name(),$this->get_price(),$this->get_type());
       return $add;
 }
}




  // Furniture is inherited from Product
class Furniture extends Product {
    private $height;
    private $width;
    private $length;
    private $type;
 // Methods
   public function set_height($height){
  $this->height = $height;
     }
   public function get_height() {
    return $this->height;
     }
   public function set_width($width){
    $this->width = $width;
     }
   public function get_width() {
      return $this->width;
     }
   public function set_length($length){
      $this->length = $length;
     }
   public function get_length() {
        return $this->length;
      }
 public function set_type($height,$width,$length){
  $this->type = "Dimension: ".$height."x".$width."x".$length;
      }
   public function get_type() {
    return $this->type;
     }
 public function __construct($sku="",$name="",$price="",$type=""){
  parent::__construct($sku,$name,$price,$type);
    $this->type=$type;       
     }
 public function Add(){
  $add = parent::insertData($this->get_sku(),$this->get_name(),$this->get_price(),$this->get_type());
  return $add;
    }
  }



  // Book is inherited from Product
class Book extends Product {
 // Methods
 public function set_type($type){
  $this->type = "Weight: ".$type." KG";
   }
 public function get_type() {
    return $this->type;
   }

 public function __construct($sku="",$name="",$price="",$type="")
 {
    parent::__construct($sku,$name,$price,$type);
    $this->type = $type;  
 }

 public function Add(){
  $add = parent::insertData($this->get_sku(),$this->get_name(),$this->get_price(),$this->get_type());
  return $add;
}
  }
