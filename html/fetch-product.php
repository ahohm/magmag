


<div class="row">  
<?php



include('./phploginapp-master/db.php');


$query = "SELECT * FROM tbl_product";

$statement = $connect->prepare($query);

if($statement->execute())
{
  $result = $statement->fetchAll();
  $output = '';
  
  foreach($result as $k)
  {
    $output .= '
    <div class="col-md-3 product-men">
    <div class="men-pro-item simpleCart_shelfItem">
      <div class="men-thumb-item">
        
        <img src="img/'.$k["image"].'"" class="card-img-top"
            >
        <img src="images/wc1.jpg" alt="" class="pro-image-back">
          <div class="men-cart-pro">
          
          </div>
          <span class="product-new-top"></span>
          
      </div>
      <div class="item-info-product ">
        <h4><a href="#">'.$k["cathegories"].'</a></h4>
        <div class="info-product-price">
          <span class="item_price">TND '.$k["price"] .'</span>
          <del>TND '.$k["price"] .'</del>
        </div>
        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                  <form action="#" method="post">
                    <fieldset>
                      <input type="hidden" name="cmd" value="_cart" />
                      <input type="hidden" name="add" value="1" />
                      <input type="hidden" name="business" value=" " />
                      <input type="hidden" name="item_name" value="Black T-Shirt" />
                      <input type="hidden" name="amount" value="30.99" />
                      <input type="hidden" name="discount_amount" value="1.00" />
                      <input type="hidden" name="currency_code" value="TND" />
                      <input type="hidden" name="return" value=" " />
                      <input type="hidden" name="cancel_return" value=" " />
                      <input type="submit" name="submit" value="Add to cart" class="button" />
                    </fieldset>
                  </form>
                </div>
                          
      </div>
    </div>
  </div>
    ';
  }
  

  echo $output;
}
?>

</div>