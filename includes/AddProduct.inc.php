<?php

use function PHPSTORM_META\type;

require_once('Product.inc.php');


//initialize the Error message 
$skuErr = $nameErr = $priceErr = $typeErr = $sizeErr =$heightErr = $weightErr = "";
$sku = $name =$price  =$size=$width=$height=$length=$weight ="";
$type="";
$boolErr = False;

           /*   USING INDEXED ARRAY INSTEAD OF CONDITIONS  */ 
           $Products = [
            'size' => 'DVD',
            'height' => 'Furniture',
            'weight' => 'Book',
            ""=>'None'
        ];

          /************************************* */

//validate fields before submit 
if(isset($_POST['save'])){
    $name = $_POST["name"];  
    $price = $_POST["price"];
    $size = $_POST["size"];
    $weight = $_POST["weight"];
    $height = $_POST["height"];
    $height = $_POST["height"];
    $width = $_POST["width"];
    $length = $_POST["length"];
    $data = new Product();
    $record = $data->fetchOne($_POST['sku']); 
    //Sku Validation  
    if (empty($_POST["sku"])) {  
        $skuErr = "SKU is required";
        $boolErr = True;
        }
   // check if record already exist 
     if($record) {  
        $skuErr = $record['sku']." exists";
        $boolErr = True;       
       } 
    //Name Validation  
    if (empty($_POST["name"])) {  
         $nameErr = "Name is required";
         $boolErr = True; 
        }
    if(!preg_match("/^[a-zA-Z ]*$/",$name)) {  
            // check if name only contains letters and whitespace  
                $nameErr = "Only alphabets and white space are allowed";
                $boolErr = True;   
        }  

   //Price Validation  
   if (empty($_POST["price"])) {  
        $priceErr = "Price is required";
        $boolErr = True;   
            } 
    if(!preg_match ("/^[0-9]*$/", $price) ) {      
        $priceErr = "Only numeric value is allowed.";
        $boolErr = True;        
    }
    //Type Validation  
    if (empty($_POST["productType"]) || $_POST["productType"]=="Choose...") {  
        $typeErr = "Type is required";
        $boolErr = True;   
            }

    //Still working on validation for the product type properties  
    $type = filter_input(INPUT_POST, 'productType');
     if($type =="size" &&  empty($_POST["size"])){
        $sizeErr = "Size is required"; 
        $boolErr = True; 
     }
     if($type =="size" && !preg_match("/^[0-9]*$/",$size)) {  
        // check if name only contains letters and whitespace  
            $sizeErr = "Only numeric value is allowed.";
            $boolErr = True;   
    } 
     if($type =="weight" &&  empty($_POST["weight"])){
        $weightErr = "Weight is required"; 
        $boolErr = True; 
     }
     if($type =="weight" && !preg_match("/^[0-9]*$/",$weight)) {  
        // check if name only contains letters and whitespace  
            $weightErr = "Only numeric value is allowed.";
            $boolErr = True;   
    } 
     if($type =="height" && (empty($_POST["height"])||empty($_POST["width"])||empty($_POST["length"]))){
        $heightErr = "All dimension are  required"; 
        $boolErr = True; 
     }
     if($type =="height" && ( !preg_match("/^[0-9]*$/",$height)|| !preg_match("/^[0-9]*$/",$width)||
      !preg_match("/^[0-9]*$/",$length))) {  
        // check if name only contains letters and whitespace  
            $heightErr = "Only numeric value is allowed.";
            $boolErr = True;   
    } 
  
    

            /*   USING INDEXED ARRAY INSTEAD OF CONDITIONS  */ 
            $Products = [
                'size' => 'DVD',
                'height' => 'Furniture',
                'weight' => 'Book',
                ""=>'None'
            ];
    if(!$boolErr){
        //need some variables to be updated
           $type = filter_input(INPUT_POST, 'productType');
           $Class= $Products[$type];
            $obj = new $Class();
            $obj->set_sku($_POST['sku']);
            $obj->set_name($_POST['name']);
            $obj->set_price($_POST['price']);
            $obj->set_type($_POST[$type],$_POST['width'],$_POST['height']);
            $obj->Add();

              }

            /*           END OF REGION                       */
 
        $sku = $_POST["sku"];
        $name =$_POST["name"];
        $price=$_POST["price"];
        $type=$_POST["productType"];
       
      

         }  
       


?>