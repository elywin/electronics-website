    <!-- Special Price -->

    <?php 
    //code to create add a new brand button automatically when a brand is added
    /**
     * 1st create a button for that brand
     * - Filter that brand 
     * - New brand is entered into the database and it can be filtered.
     * - get all brand names in the database
     * - all products are in the $product_shuffle array
     */
    $brand = array_map(function($pro){return $pro['item_brand'];}, $product_shuffle);

    // get a unique brand
    $unique = array_unique($brand);
    //print_r($unique);
    
    sort($unique);

    //shuffle() images on different displays
    shuffle($product_shuffle); 
    
    //print_r($brand); //ALL brands


    //request method post
    if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['special_price_submit'])){
        //CAll method addToCart
        $Cart->addToCart( $_POST['user_id'], $_POST['item_id']);
    }
}

    //new variable for an item or product already in cart
    $in_cart = $Cart->getCartId($product->getData('cart'));

    ?>

    <section id="special-price">
        <div class="container">
            <h4 class="font-os font-size-20 ">Electronics Price</h4>
            <div id="filters" class="button-group text-end font-raleway font-size-20">
                <button class="btn is-checked" data-filter="*">All Brands</button>
                <?php 
                array_map(function($brand){
                    printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);
                }, $unique);
                
                ?>
            </div>

            <div class="grid">
                <?php
                //use array_map()
                array_map(function($item) use($in_cart){?>
                <div class="grid-item <?php echo $item['item_brand']; ?> border">
                    <div class="item py-2" style="width: 200px;">
                        <div class="product font-raleway">
                            <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id'])  ?>"><img
                                    src="<?php echo $item['item_image'] ?? "../assets/products/dell.jpg" ?>"
                                    alt="Samsung S20" class="img-fluid"></a>
                            <div class="text-center">
                                <h6><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>
                                <div class="price py-2">
                                    <span><?php echo $item['item_price'] ?? 0; ?></span>
                                </div>
                                <form method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo  1; ?>">
                                    <?php 
                                if(in_array($item['item_id'],$in_cart)){
                                    echo '<button type="submit" class=" btn btn-success font-size-12" disabled>InCart</button>';
                                }else{
                                    echo '<button type="submit" class=" btn btn-warning font-size-12" name="special_price_submit">Add to
                                Cart</button>';
                                }
                            ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }, $product_shuffle) ?>
            </div>

        </div>
    </section>
    <!-- end Special Price -->