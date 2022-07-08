<?php
class MassDelete extends Product {
      function deleteItems(){
    $checkboxex = $_POST['checkbox'];
foreach($checkboxex as $sku){
    parent::delete($sku);
            }
echo "<script>document.location='index.php'</script>";         
   }
}
?>