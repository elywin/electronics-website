$(document).ready(function () {
    
    //banner owl carousel
    $("#banner-area .owl-carousel").owlCarousel({
        dots: true,
        items: 1
    });

    //top sale owl carousel
    $("#top-sale .owl-carousel").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });

    // Isotope filter
    var $grid = $('.grid').isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows'
    });

    //filter items on button click
    $(".button-group").on("click", "button", function () {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });
    });

    // new gadgets owl carousel
    $("#new-gadgets .owl-carousel").owlCarousel({
        loop: true,
        dots: true,
        nav: false,
        
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });

    // product Qty Specifications
    let $qty_up = $(".qty .qty-up");
    let $qty_down = $(".qty .qty-down");
    //let $qty_input = $(".qty .qty-input");

    //click on the qty_up button
    $qty_up.click(function(e) {

        let $qty_input = $(`.qy-input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id='${$(this).data("id")}']`);

        //change product price using ajax call
        $.ajax({url: "template/ajax.php", type: 'post', data: { itemid: $(this).data("id") }, success: function (result) {
                //console.log(result);
                //fn to convert result into object
                let obj = JSON.parse(result);
                let item_price = obj[0]['item_price'];

                if($qty_input.val() >= 1 && $qty_input.val() <= 9) {
                    $qty_input.val(function (i, oldVal) {
                    return ++oldVal;
                });
                }//closed if statement for increment

        
            //increase price of the product
            $price.text(parseInt(item_price * $qty_input.val()).toFixed(2));
            
            
        }}); //closing ajax request
        
    });

    //click on the qty_down button
    $qty_down.click(function(e) {
        let $qty_input = $(`.qty-input[data-id='${$(this).data("id")}']`);
        if ($qty_input.val() > 1 && $qty_input.val() <= 10) {
            $qty_input.val(function(i, oldVal) {
                return --oldVal;
            });
        }
    });

});