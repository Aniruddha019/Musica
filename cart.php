<?php
require("inc/products.php");

$page_title = "Cart";
$hero_image = "img/bg-img/breadcumb6.jpg";
$style = "style1.css";
$style2 = "cart-style.css";



$cart_products = get_cart_products();

include("inc/header.php");
?>

<script src="js/cart-script.js"></script>

    <div class = "container cart-body">
        <h1><b>Shopping Cart</b></h1>

            <div class="shopping-cart">
                <form method="post" action="checkout.php">
            
              <div class="column-labels">
                <label class="product-image">Image</label>
                <label class="product-details">Product</label>
                <label class="product-price">Price</label>
                <label class="product-quantity">Quantity</label>
                
                <label class="product-line-price">Total</label>
              </div>
            
                <?php
                $sub_total = 0;
                if(!empty($cart_products)){
                    $purchased_albums = array();
                    
                    foreach($cart_products as $item){
                        echo get_table_view_cart($item);
                        $sub_total = $sub_total + ($item['price'] * $item['quantity']);
                    }
                    $_SESSION["purchased_albums"] = $purchased_albums;
                }
                ?>
    
                   
            
              
              
              <div class="totals">
                <div class="totals-item">
                  <label><b>Subtotal</b></label>
                  <div class="totals-value" id="cart-subtotal"><?php if($sub_total != 0){ echo $sub_total;} else echo '0';?></div>
                </div>
                <div class="totals-item">
                  <label><b>Tax (5%)</b></label>
                  <div class="totals-value" id="cart-tax"><?php if(!empty($cart_products)){ echo '2.60';} else{ echo '0.00';} ?></div>
                </div>
                <div class="totals-item">
                  <label><b>Shipping</b></label>
                  <div class="totals-value" id="cart-shipping">15.00</div>
                </div>
                <div class="totals-item">
                  <label><strong>Grand Total</strong></label>
                  <div class="totals-value" id="cart-total"><?php if($sub_total != 0){ echo ($sub_total + 15.00 + 3.60);}else echo '0'; ?></div>
                  <input class="totals-value" type="hidden" id="cart-total1" name="cart-total1" value="">
                </div>
              </div>
                  
                  <input type="submit" class="checkout musica-btn btn-2" value="Checkout" name="submit">
            </form>
      </div>
    </div>
    
    
<?php
include("inc/footer.php");
?>