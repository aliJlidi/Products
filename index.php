
<?php
require_once('includes/Product.inc.php');

$data = new Product();

$all = $data->fetchAll();



   
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Product List</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </head>
    <body>
      <section id="Header">
        <h2>Product List</h2>
        <div class="ButtonContainer">
            <button type="button" class="btn btn-light" style="margin-right: 10px;" onclick="location.href='productForm.php'">ADD</button>
            <button type="button" class="btn btn-danger">MASS DELETE</button>
        </div>

      </section>
      <hr class="solid">
      <section id="ProductList">
  <?php

  foreach ($all as $key=>$val) {?>
         <div class="Product">
             <div class="Checkbox">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
             </div>
             <div class="Description">
                 <div id="sku"><?= $val['sku']?></div>
                 <div id="name"><?= $val['name']?></div>
                 <div id="price"><?=$val['price']?></div>
                 <div id="productType"><?=$val['type']?></div>

             </div>
            
         </div>
         <?php }  ?>
    </section>
    <hr class="solid">
    <section id="Footer">
    <div>Scandiweb Test assignment</div>
        
    </section>
        
        <script src="" async defer></script>
    </body>
</html>