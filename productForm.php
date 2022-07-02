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
          <span class = "error">* required field </span>  
            <form id="myform" class="form" action="productForm.php" method="POST">
                <div class="formElement">
                  <label class="label">SKU  </label>
                  <input type="text"
                    id="sku"
                    name="sku"
                    value="<?=$sku?>"
                     class="form-control" style="width: 100%;"  placeholder=" SKU">
                     <span class="error" >*<?php echo $skuErr; ?> </span>
                </div>
                <div class="formElement">
                  <label  class="label">Name</label>
                  <input type="text"
                  id="name"
                  name="name"
                  value="<?=$name?>"
                   class="form-control " style="width: 100%;" placeholder="Name">  
                  <span class="error">* <?php echo $nameErr; ?> </span>
                </div>
                <div class=" formElement">
                    <label class="label" >Price ($)</label>
                    <input type="text"
                    id="price" 
                    name="price" 
                    value="<?=$price?>"
                    class="form-control " style="width: 100%;" placeholder="Price">
                    <span class="error">* <?php echo $priceErr; ?> </span>
                  </div>
                  <div class="input-group mb-3 formElement">
                    <div class="input-group-prepend">
                      <label  class="label" >Type</label>
                    </div>
                    <span class="error">* <?php echo $typeErr; ?> </span>
                    <select style="margin-left:50px;"  class="custom-select" id="productType" name="productType">
                      <option selected><?=$type ?></option>
                      <option value="DVD">DVD</option>
                      <option value="Furniture">Furniture</option>
                      <option value="Book">Book</option>
                    </select>
                   
                  </div>

                    <!-- DVD -->
                 <div class='DVD  formElement' style='display:<?=$displayDVD?> ;'> 
                    <label class="label" >Size(MB)</label>
                    <input type="text" class="form-control " style="width: 100%;"
                     id="size"
                     name="size"
                     value="<?=$size?>"
                      placeholder="Size">
                    <span class="error">* <?php echo $sizeErr; ?> </span>
                  </div>

                  <!--Furniture-->
                   <div class='Furniture  formElement' style='display:<?=$displayFurniture?> ;'>
                    <div>
                    <label class="label" >Height(CM)</label>
                    <input type="text" class="form-control " style="width: 100%;"
                     id="height"
                     name="height"
                     value="<?=$height?>"
                      placeholder="Height">
                    <span class="error">* <?php echo $heightErr; ?> </span>
                    </div>
                    <div>
                    <label class="label" >Width(CM)</label>
                    <input type="text" class="form-control " style="width: 100%;"
                     id="width" 
                     name="width"
                     value="<?=$width?>"
                      placeholder="Width">
                    <span class="error">* <?php echo $widthErr; ?> </span>
                    </div>
                    <div>
                    <label class="label" >Lenght(CM)</label>
                    <input type="text" class="form-control " style="width: 100%;"
                     id="length" 
                     name="length"
                     value="<?=$length?>"
                     placeholder="Lenght">
                    <span class="error">* <?php echo $lengthErr; ?> </span>
                    </div>
                    <input type="text" class="form-control " style="display:none;"
                     id="dimension" 
                     name="dimension"
                     value="<?=$height."x".$width."x".$length?>"
                      >
                  </div>

                  <!--Book-->
                 <div class='Book  formElement' style='display:<?=$displayBook?> ;'>
                    <label class="label" >Weigth(KG)</label>
                    <input type="text" class="form-control " style="width: 100%;"
                     id="weight"
                     name="weight"
                     value="<?=$weight?>"
                      placeholder="Weight">
                    <span class="error">* <?php echo $weightErr; ?> </span>
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