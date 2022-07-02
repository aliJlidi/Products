<?php
require_once('Product.inc.php');
if(isset($_POST['delete']))
{
    $checkboxex = $_POST['checkbox'];
$data = new Product();

foreach($checkboxex as $sku){
    $data->delete($sku);
   
}


}
?>