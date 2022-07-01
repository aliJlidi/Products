<?php
require_once('includes/AddProduct.inc.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Add product</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/javascript.js"></script>
    </head>
    <body>
        <section id="Header">
            <h2>Product Add</h2>
            <div class="ButtonContainer">
                <button type="submit" 
                form="myform"
                value="Save"
                name="save" class="btn btn-primary" style="margin-right: 10px;">Save</button>
                <button type="button" class="btn btn-light " onclick="location.href='index.php'">Cancel</button>
            </div>
    
          </section>
          <hr class="solid">
          <section id="productForm" class="col-md-3 contents">
    
            <form id="myform" class="form" action="includes\AddProduct.inc.php" method="POST">
                <div class="formElement">
                  <label class="label">SKU  </label>
                  <span class="error">*<?php echo $skuErr; ?> </span>
                  <input type="text"
                    id="sku"
                    name="sku"
                     class="form-control" style="width: 100%;"  placeholder="Enter Id of Product">
                </div>
                <div class="formElement">
                  <label  class="label">Name</label>
                  <span class="error">* <?php echo $nameErr; ?> </span>
                  <input type="text"
                  id="name"
                  name="name"
                   class="form-control " style="width: 100%;" placeholder="Name">
                </div>
                <div class=" formElement">
                    <label class="label" >Price ($)</label>
                    <span class="error">* <?php echo $priceErr; ?> </span>
                    <input type="text"
                    id="price" 
                    name="price" class="form-control " style="width: 100%;" placeholder="Price">
                  </div>
                  <div class="input-group mb-3 formElement">
                    <div class="input-group-prepend">
                      <label  class="label" >Type Switcher</label>
                      <span class="error">* <?php echo $typeErr; ?> </span>
                    </div>
                    <select class="custom-select" id="productType" name="productType">
                      <option selected>Choose...</option>
                      <option value="DVD">DVD</option>
                      <option value="Furniture">Furniture</option>
                      <option value="Book">Book</option>
                    </select>
                  </div>

                    <!-- DVD -->
                  <div class="DVD input-group col-xs-2 formElement">
                    <label class="label" >Size(MB)</label>
                    <input type="text" class="form-control " style="width: 100%;" id="size" placeholder="Please provide size">
                  </div>

                  <!--Furniture-->
                  <div class="Furniture input-group col-xs-2 formElement">
                    <label class="label" >Height(CM)</label>
                    <input type="text" class="form-control " style="width: 100%;" id="height" placeholder="Please provide height">

                    <label class="label" >Width(CM)</label>
                    <input type="text" class="form-control " style="width: 100%;" id="width" placeholder="Please provide width">

                    <label class="label" >Lenght(CM)</label>
                    <input type="text" class="form-control " style="width: 100%;" id="length" placeholder="Please provide lenght">
                  </div>

                  <!--Book-->
                  <div class="Book input-group col-xs-2 formElement">
                    <label class="label" >Weigth(KG)</label>
                    <input type="text" class="form-control " style="width: 100%;" id="weight" placeholder="Please provide weight">
                  </div>
                
              </form>
            
        </section>
        <hr class="solid">
        <section id="Footer">
        <div>Scandiweb Test assignment</div>
            
        </section>
            
            <script src="" async defer></script>
        
        <script src="" async defer></script>
    </body>
</html>