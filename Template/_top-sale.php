<!-- start Top Sale -->

<?php
//$product from functions.php
//$product_shuffle = $product->getData();
//shuffle products to avoid the sae sequency of Products - use pHP shuffle()
shuffle($product_shuffle);

//request method post
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['top_sale_submit'])){
        //CAll method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}

?>

<section id="top-sale">
    <div class="container py-5">
        <h4 class="font-os font-size-20">Top Sale</h4>
        <hr>
        <!-- owl carousel -->
        <div class="owl-carousel owl-theme">
            <?php 
                //foreach fn and pass array
                foreach($product_shuffle as $item){ 
            ?>

            <div class="item py-2">
                <div class="product font-raleway">
                    <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id'])  ?>"><img
                            src="<?php echo $item['item_image'] ??  "./assets/products/delljpg"; ?>" alt="Dell Laptop"
                            class="img-fluid"></a>
                    <div class="text-center">
                        <h6><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
                        <div class="rating text-warning fontsize-12">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                        </div>
                        <div class="price py-2">
                            <span><?php echo $item['item_price']; ?></span>
                        </div>
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                            <input type="hidden" name="user_id" value="<?php echo  1; ?>">
                            <?php 
                                if(in_array($item['item_id'], $Cart->getCartId($product->getData('cart')))){
                                    echo '<button type="submit" class=" btn btn-success font-size-12" disabled>InCart</button>';
                                }else{
                                    echo '<button type="submit" class=" btn btn-warning font-size-12" name="top_sale_submit">Add to
                                Cart</button>';
                                }
                            ?>

                        </form>
                    </div>
                </div>
            </div>
            <?php } //closing foreach function?>
        </div>
        <!-- owl carousel -->
    </div>
</section>
<!-- end Top Sale -->