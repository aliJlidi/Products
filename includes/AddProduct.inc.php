<?php
require_once('Product.inc.php');


//initialize the Error message 
$skuErr = $nameErr = $priceErr = $typeErr = $sizeErr =$heightErr =$widthErr =$lengthErr = $weightErr = "";
$sku = $name =$price = $type =$size=$width=$height=$length=$weight ="";
$displayDVD =$displayFurniture =$displayBook ="none";

//validate fields before submit 
if(isset($_POST['save'])){
    $name = $_POST["name"];  
    $price = $_POST["price"]; 
    $data = new Product();
    $record = $data->fetchOne($_POST['sku']); 
    //Sku Validation  
    if (empty($_POST["sku"])) {  
        $skuErr = "SKU is required";
  
   }
   // check if record already exist 
           elseif ($record) {  
               $skuErr = $record['sku']." exists"; 
             
           } 
        

    //Name Validation  
    elseif (empty($_POST["name"])) {  
         $nameErr = "Name is required"; 
        
    } elseif(!preg_match("/^[a-zA-Z ]*$/",$name))  {  
        
            // check if name only contains letters and whitespace  
           
                $nameErr = "Only alphabets and white space are allowed";  
            
        }  

   //Number Validation  
    elseif (empty($_POST["price"])) {  
        $priceErr = "Price is required";  
} 
elseif(!preg_match ("/^[0-9]*$/", $price) ) {  
      
     
         
        $priceErr = "Only numeric value is allowed.";  
        
    }  
        
//Empty Field Validation  
    elseif (empty($_POST["productType"])||$_POST["productType"]=="") {  
        $typeErr = "Type is required";  
             }
    elseif($_POST["productType"]=='DVD'){
           
            $displayDVD='Block';
            $displayBook='none';
            $displayFurniture='none';
            $size = $_POST["size"];
            //Number Validation  
           if (empty($_POST["size"])) {  
        $sizeErr = "Size is required";  
            } 
    elseif (!preg_match ("/^[0-9]*$/", $size) ) {  
        $sizeErr = "Only numeric value is allowed.";  
                 }
          else {
          $obj = new DVD();
          $obj->set_sku($_POST['sku']);
          $obj->set_name($_POST['name']);
          $obj->set_price($_POST['price']);
          $obj->set_size($_POST['size']);
          $obj->AddDVD(); 
        }
      
 
        }
        elseif($_POST["productType"]=='Furniture'){
            $displayDVD='none';
            $displayBook='none';
            $displayFurniture='Block';
            $width =$_POST["width"];
            $height=$_POST["height"];
            $length=$_POST["length"];
            if (empty($_POST["height"])) {  
                $heightErr = "height is required";  
                    } 
            elseif(!preg_match ("/^[0-9]*$/", $height) )  {  
                 
                $heightErr = "Only numeric value is allowed.";  
                }
            
            elseif(empty($_POST["width"])) {  
                $widthErr = "width is required";  
                    } 
            elseif(!preg_match ("/^[0-9]*$/", $width) ) 
                {  
                $widthErr = "Only numeric value is allowed.";  
                }
            
            elseif(empty($_POST["length"])) {  
                $lengthErr = "length is required";  
                    } 
            elseif(!preg_match ("/^[0-9]*$/", $length) ) {  
             
                 
                $lengthErr = "Only numeric value is allowed.";  
                }
            else{
            $obj = new Furniture();
            $obj->set_sku($_POST['sku']);
            $obj->set_name($_POST['name']);
            $obj->set_price($_POST['price']);
            $obj->set_dimension($_POST['height'],$_POST['width'],$_POST['length']);
            $obj->AddFurniture(); 
        
            }
        }
        elseif($_POST["productType"]=='Book'){
            $displayDVD='none';
            $displayBook='Block';
            $displayFurniture='none';
            $weight =$_POST["weight"];
            if (empty($_POST["weight"])) {  
                $weightErr = "weight is required";  
                    } 
            elseif(!preg_match ("/^[0-9]*$/", $weight) ) {  
                $weightErr = "Only numeric value is allowed.";  
                }
            else{
            $obj = new Book();
            $obj->set_sku($_POST['sku']);
            $obj->set_name($_POST['name']);
            $obj->set_price($_POST['price']);
            $obj->set_weight($_POST['weight']);
            $obj->AddBook(); 
          
        }
    }
        else{
            $displayDVD='none';
            $displayBook='none';
            $displayFurniture='none';
        }
        $sku = $_POST["sku"];
        $name =$_POST["name"];
        $price=$_POST["price"];
        $type =$_POST["productType"] ;
         }  
       
     
 


   /* 
 */



?>