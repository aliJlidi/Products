<?php
require_once('Product.inc.php');


//initialize the Error message 
$skuErr = $nameErr = $priceErr = $typeErr = "";
$sku = $name =$price = $type ="";
$validators = [
    'DVD' => 'DVD',
    'Book' => 'Book',
    'Furniture' => 'Furniture',
    'None' => 'None'
];
$type = filter_input(INPUT_POST, 'productType') == null ? "None":filter_input(INPUT_POST, 'productType') ;
$validatorClass = $validators[$type];

//validate fields before submit 
if(isset($_POST['save'])){

    //Sku Validation  
    if (empty($_POST["sku"])) {  
        $nameErr = "SKU is required";  
   } else  {
    $data = new Product();
    $all = $data->fetchOne($_POST["sku"]);
           // check if record already exist 
           if ($all[0]>1) {  
               $nameErr = "sku already exists";  
           } 
        } 

    //Name Validation  
    if (empty($_POST["name"])) {  
         $nameErr = "Name is required";  
    } else {  
        $name = $_POST["name"];  
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                $nameErr = "Only alphabets and white space are allowed";  
            }  

                //Number Validation  
    if (empty($_POST["price"])) {  
        $priceErr = "Price is required";  
} 
else {  
        $price = $_POST["price"];  
        // check if mobile no is well-formed  
        if (!preg_match ("/^[0-9]*$/", $price) ) {  
        $priceErr = "Only numeric value is allowed.";  
        }  
         //Empty Field Validation  
    if (empty($_POST["productType"])) {  
        $genderErr = "Type is required";  
            }
 else 
        {  
        $gender = $_POST["productType"];  
         }  

    }  




    require_once("Product.inc.php");
    $obj = new $validatorClass();

    $obj->set_sku($_POST['sku']);
    $obj->set_name($_POST['name']);
    $obj->set_price($_POST['price']);
    $obj->set_type($_POST['productType']);

    $obj->insertData();
}
}

?>