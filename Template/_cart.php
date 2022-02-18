<!-- Shopping Cart section -->

<?php   

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['delete-cart-submit'])){
            $deletedrecord = $Cart->deleteCart($_POST['item_id']);
        }
    }

?>

<section id="cart" class="py-3">
    <div class="container-fluid w-75">
        <h5 class="font-os font-size-20">Shopping Cart</h5>
        <!-- Shopping Cart items -->
        <div class="row">
            <div class="col-sm-9">
                <?php 
                    
                    foreach($product->getData('cart') as $item): 
                    //print_r($item);
                    $cart = $product->getProduct($item['item_id']);
                    //print_r($cart);
                    //array_map
                    $subTotal[] = array_map(function($item){
                ?>
                <!-- cart item -->
                <div class="row border-top py-3 mt-3">

                    <div class="col-sm-2">
                        <img src="<?php echo $item['item_image'] ?? "./assets/products/samsung.jpg" ?>"
                            style=" height: 120px;" alt="headphones" class="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-os font-size-20">
                            <?php echo $item['item_name'] ?? "Unknown" ?></h5>
                        <small><?php echo $item['item_brand'] ?? "Brand" ?></small>
                        <!-- product ratings -->
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="" class="px-2 font-raleway font-size-12">20,456 ratings</a>
                        </div>
                        <!-- product ratings -->

                        <!-- product quantity -->
                        <div class="qty d-flex pt-2">
                            <div class="d-flex font-raleway w-25">
                                <button class="qty-up border bg-light color-primary"
                                    data-id="<?php  echo $item['item_id'] ?? '0'; ?>"> <i class="fas fa-plus"></i>
                                </button>
                                <input type="text" data-id="<?php  echo $item['item_id'] ?? '0'; ?>"
                                    class="qty-input border bg-light text-center px-2 w-50 bg-light" disabled value="1"
                                    placeholder="1">
                                <button class="qty-down border bg-light color-primary"
                                    data-id="<?php  echo $item['item_id'] ?? '0'; ?>"> <i class="fas fa-minus"></i>
                                </button>
                            </div>

                            <form action="" method="post">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0 ?>" name="item_id">
                                <button name="delete-cart-submit"
                                    class=" btn text-danger px-3 border-right font-os">Delete <i
                                        class="fas fa-trash"></i> </button>

                            </form>

                            <button class=" btn text-danger px-3 font-os">Save for later <i class="fas fa-heart"></i>
                            </button>
                        </div>
                        <!-- product quantity -->

                    </div>
                    <div class="col-sm-2">
                        <div class="font-size-20 text-danger font-os">
                            $ <span data-id="<?php  echo $item['item_id'] ?? '0'; ?>"
                                class="product_price"><?php echo $item['item_price'] ?? 0 ?></span>
                        </div>
                    </div>
                </div>
                <!-- cart item -->

                <?php
                return $item['item_price'];
                    },$cart); //closing array_map
                    endforeach;
                    //print_r($subTotal);
                ?>
            </div>

            <!-- subtotal section -->
            <div class=" col-sm-3">
                <div class="subtotal border text-center">
                    <h6 class="font-raleway font-size-12 text-success pt-2"> <i class="fas fa-check"></i> Your
                        order is
                        eligible for free delivery</h6>
                    <div class="border-top py-4">
                        <h5 class="font-os font-size-20">Subtotal ( <?php echo count($subTotal) ?? 0 ?>
                            item(s) )&nbsp;
                            <span class="text-danger">$<span
                                    class="text-danger"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0 ?></span></span>
                        </h5>
                        <button type="submit" class="btn btn-warning mt-3">Proceed to buy</button>
                    </div>
                </div>
            </div>
            <!-- subtotal section -->
        </div>
        <!-- Shopping Cart item -->
    </div>
</section>
<!-- Shopping Cart section -->