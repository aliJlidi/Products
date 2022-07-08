<?php
class CreateProduct extends Product {
//initialize variables
public $skuErr ="";public $nameErr = "";public $priceErr ="";public $typeErr ="";
public $sizeErr =""; public $heightErr ="";public $weightErr = "";public $sku ="";
public $name =""; public $price =""; public $size=""; public $width="";public $height="";
public $length="";public $weight ="";public $type="";

public function AddProduct(){
$boolErr = False;
    $record = parent::fetchOne($_POST['sku']); 
    //Sku Validation  
    if (empty($_POST["sku"])) {  
        $this->skuErr = "SKU is required";
        $boolErr = True;
        }
   // check if record already exist 
     if($record) {  
        $this->skuErr = $record['sku']." exists";
        $boolErr = True;       
       } 
    //Name Validation  
    if (empty($_POST["name"])) {  
         $this->nameErr = "Name is required";
         $boolErr = True; 
        }
    if(!preg_match("/^[a-zA-Z ]*$/",$_POST["name"])) {  
            // check if name only contains letters and whitespace  
                $this->nameErr = "Only alphabets and white space are allowed";
                $boolErr = True;   
        }  
   //Price Validation  
   if (empty($_POST["price"])) {  
        $this->priceErr = "Price is required";
        $boolErr = True;   
            } 
    if(!preg_match ("/^[0-9]*$/", $_POST["price"]) ) {      
        $this->priceErr = "Only numeric value is allowed.";
        $boolErr = True;        
    }
    //Type Validation  
    if (empty($_POST["productType"]) || $_POST["productType"]=="Choose...") {  
        $this->typeErr = "Type is required";
        $boolErr = True;   
            }
    //Still working on validation for the product type properties  
    $type = filter_input(INPUT_POST, 'productType');
     if($type =="size" &&  empty($_POST["size"])){
        $this->sizeErr = "Size is required"; 
        $boolErr = True; 
     }
     if($type =="size" && !preg_match("/^[0-9]*$/",$_POST["size"])) {  
        // check if name only contains letters and whitespace  
            $this->sizeErr = "Only numeric value is allowed.";
            $boolErr = True;   
    } 
     if($type =="weight" &&  empty($_POST["weight"])){
        $this->weightErr = "Weight is required"; 
        $boolErr = True; 
     }
     if($type =="weight" && !preg_match("/^[0-9]*$/",$_POST["weight"])) {  
        // check if name only contains letters and whitespace  
            $this->weightErr = "Only numeric value is allowed.";
            $boolErr = True;   
    } 
     if($type =="height" && (empty($_POST["height"])||empty($_POST["width"])||empty($_POST["length"]))){
        $this->heightErr = "All dimension are  required"; 
        $boolErr = True; 
     }
     if($type =="height" && ( !preg_match("/^[0-9]*$/",$_POST["height"])|| !preg_match("/^[0-9]*$/",$_POST["width"])||
      !preg_match("/^[0-9]*$/",$_POST["length"]))) {  
        // check if name only contains letters and whitespace  
            $this->heightErr = "Only numeric value is allowed.";
            $boolErr = True;   
    } 
   /*   USING INDEXED ARRAY INSTEAD OF CONDITIONS  */ 
   $Products = [
    'size' => 'DVD',
    'height' => 'Furniture',
    'weight' => 'Book',
    ""=>'None'
];
// if form validated <<save product>>
if(!$boolErr){
$type = filter_input(INPUT_POST, 'productType');
$Class= $Products[$type];
$obj = new $Class();
$obj->set_sku($_POST['sku']);
$obj->set_name($_POST['name']);
$obj->set_price($_POST['price']);
$obj->set_type($_POST[$type],$_POST['width'],$_POST['length']);
$obj->Add();
  }
/*           END OF REGION                       */
$this->sku = $_POST["sku"];
$this->name =$_POST["name"];
$this->price=$_POST["price"];
$this->type=$_POST["productType"];   
$this->size = $_POST["size"];
$this->height = $_POST["height"];
$this->width = $_POST["width"];
$this->length = $_POST["length"];
$this->weight = $_POST["weight"];
     }  
}

?>