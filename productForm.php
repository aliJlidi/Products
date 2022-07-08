<?php
require_once('includes/Product.inc.php');
require_once('includes/AddProduct.inc.php');
static $obj = new CreateProduct();
if(isset($_POST['save'])){ $obj->AddProduct();}

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
          <span class = "error">* required field  </span>  
            <form id="myform" name="myform" class="form" action="productForm.php" method="POST">

                                <!--SKU ELEMENT -->
                <div class="formElement">
                  <label class="label">SKU  </label>
                  <input type="text"
                    id="sku"
                    name="sku"
                    value="<?=$obj->sku?>"
                     class="form-control" style="width: 100%;"  placeholder=" SKU">
                     <span class="error" >*<?php echo $obj->skuErr; ?> </span>
                </div>
                                    <!--END OF SKU ELEMENT -->                      

                                    <!--NAME ELEMENT -->
                <div class="formElement">
                  <label  class="label">Name</label>
                  <input type="text"
                  id="name"
                  name="name"
                  value="<?=$obj->name?>"
                   class="form-control " style="width: 100%;" placeholder="Name">  
                  <span class="error">* <?php echo $obj->nameErr; ?> </span>
                </div>
                                  <!--END OF NAME ELEMENT -->

                                  <!-- PRICE ELEMENT -->
                <div class=" formElement">
                    <label class="label" >Price ($)</label>
                    <input type="text"
                    id="price" 
                    name="price" 
                    value="<?=$obj->price?>"
                    class="form-control " style="width: 100%;" placeholder="Price">
                    <span class="error">* <?php echo $obj->priceErr; ?> </span>
                  </div>
                                    <!-- END OF PRICE ELEMENT -->

                                   <!-- PRODUCT TYPE ELEMENT  -->
                                   <div id="type" style="display:none ;"><?=$obj->type?></div>
                  <div class="formElement">
                    <div class="input-group-prepend">
                      <label  class="label" >Type</label>
                    </div>
                    <select  class="custom-select type" id="productType" name="productType">
                    <option selected></option>
                      <option value="size">DVD</option>
                      <option value="height">Furniture</option>
                      <option value="weight">Book</option>
                    </select>
                    <span class="error">* <?php echo $obj->typeErr; ?> </span>
                  </div>
                          <!--        END OF PRODUCT TYPE ELEMENT            -->

                                              <!-- DVD -->
                 <div class='size  formElement' > 
                    <label class="label" >Size(MB)</label>
                    <input type="text" class="form-control " style="width: 100%;"
                     id="size"
                     name="size"
                     value="<?=$obj->size?>"
                      placeholder="Size">
                    <span class="error">* <?php echo $obj->sizeErr; ?> </span>
                  </div>

                                <!-- END OF DVD ELEMENT -->

                                <!--FURNITURE-->
                   <div class='height  formElement' >
                    <div>
                    <label class="label" >Height(CM)</label>
                    <input type="text" class="form-control " style="width: 100%;"
                     id="height"
                     value="<?=$obj->height?>"
                     name="height"
                      placeholder="Height">
                    <span class="error">* <?php echo $obj->heightErr; ?> </span>
                    </div>
                    <div>
                    <label class="label" >Width(CM)</label>
                    <input type="text" class="form-control " style="width: 100%;"
                     id="width" 
                     value="<?=$obj->width?>"
                     name="width"
                      placeholder="Width">
                    
                    </div>
                    <div>
                    <label class="label" >Lenght(CM)</label>
                    <input type="text" class="form-control " style="width: 100%;"
                     id="length" 
                     value="<?=$obj->length?>"
                     name="length"
                     placeholder="Lenght">
                    
                    </div>

                   </div>
                    
               
                    
                                      <!-- END OF FURNITURE ELEMENT -->

                                           <!--BOOK-->
                 <div class='weight formElement' >
                    <label class="label" >Weigth(KG)</label>
                    <input type="text" class="form-control " style="width: 100%;"
                     id="weight"
                     name="weight"
                     value="<?=$obj->weight?>"
                      placeholder="Weight">
                    <span class="error">* <?php echo $obj->weightErr; ?> </span>
                  </div>

                                        <!--END OF BOOK-->
                
              </form>
            
        </section>
        <hr class="solid">
        <section id="Footer">
        <div>Scandiweb Test assignment</div>
            
        </section>
            
            <script src="" async defer></script>
        
        <script src="" async defer></script>
        <script type="text/javascript" src="js/productForm.js"></script>
    </body>
</html>