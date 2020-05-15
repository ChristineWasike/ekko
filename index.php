<!DOCTYPE html>
<html lang="en">
<?php

?>
<head>
    <title>Ekko &mdash; Creatives E-commerce</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">
    <style>
        #snackbar {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 30px;
            font-size: 17px;
        }

        #snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }
    </style>
    <link rel="stylesheet" href="css/style.css">


</head>

<body>

<div class="site-wrap">

    <div class="site-navbar bg-white py-2">

        <div class="search-wrap">
            <div class="container">
                <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
                <form action="#" method="post">
                    <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
                </form>
            </div>
        </div>

        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <div class="logo">
                    <div class="site-logo">
                        <a href="index.php" class="js-logo-clone">Ekko</a>
                    </div>
                </div>
                <div class="main-nav d-none d-lg-block">
                    <nav class="site-navigation text-right text-md-center" role="navigation">
                        <ul class="site-menu js-clone-nav d-none d-lg-block">
                            <li class="has-children active">
                                <a href="index.php">Collection</a>
                                <ul class="dropdown">
                                    <li><a href="#">Ebooks</a></li>
                                    <li><a href="#">Music</a></li>
                                    <li class="has-children">
                                        <a href="#">Art</a>
                                        <ul class="dropdown">
                                            <li><a href="#">Paintings</a></li>
                                            <li><a href="#">Clothing</a></li>
                                            <li><a href="#">Potraits</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li><a href="shop.html">Shop</a></li>
                            <li><a href="#">Catalogs</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="icons">
                    <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
                    <a href="#" class="icons-btn d-inline-block"><span class="icon-heart-o"></span></a>

                    <?php
                    require_once('includes/DbConnect.php');
                    $db = new DbConnect();
                    $connection = $db->connection();
                    # Creating a section that fetches the customer's id upon logging in and using it during their session
                    # In the where a user clicks on the artifact, art piece or music product, they are prompted to
                    # log in first before they can proceed to add the item to cart.
                    require 'classes/Customer.php';
                    $objCustomer = new Customer($connection);
                    $objCustomer->setEmail('random.user@gmail.com');
                    # Getting the user email address to help start the session
                    $customer = $objCustomer->getCustomerByEmail();
                    session_start();
                    $_SESSION['customer_id'] = $customer['id'];

                    # Making clickable shopping bag and number tag dynamic
                    require 'classes/Cart.php';
                    $objCart = new Cart();
                    $objCart->setCustomerId($customer['id']);
                    $cartItems = $objCart->getAllCartItems();

                    ?>
                    <!--                    Add to cart functionality being implemented here, look out.-->
                    <a href="cart.php" class="icons-btn d-inline-block bag">
                        <span class="icon-shopping-bag"></span>
                        <span class="number" id="item_count"><?php echo count($cartItems); ?></span>
                    </a>
                    <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                                class="icon-menu"></span></a>
                </div>
            </div>
        </div>
    </div>

    <div class="site-blocks-cover" data-aos="fade">
        <div class="container">

            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12 text-center">
                    <div class="featured-hero-product w-100">
                        <h1 class="mb-2">Carrying Water</h1>
                        <h4>Spring Collection</h4>
                        <div class="price "><strong>$999</strong>
                            <del>$1,299</del>
                        </div>
                        <p>
                            <a href="#" class="btn btn-outline-primary rounded-0">Shop Now</a>
                            <a href="#" class="btn btn-primary rounded-0">Shop Now</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 align-self-end text-center text-lg-right"
                     style="margin-bottom: 15%;">
                    <img src="images/new/woman.png" alt="Image" class="img-fluid img-1">
                </div>

            </div>
        </div>

    </div>


    <div class="products-wrap border-top-0">
        <div class="container-fluid" id="items">

            <div class="row" style="text-align: center;">
                <div class="alert alert-dismissible" role="alert" style="display: flex; display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        x
                    </button>
                    <div id="result">
                        <div style="text-align: center;">
                            <img src="https://snoopgame.com/wp-content/uploads/2019/08/dots.gif" id="loader"
                                 alt="loader gif" style="height: 50%; width: 50%; display: none;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-gutters products">
                <?php
                require 'classes/AllItems.php';

                $objAllItems = new AllItems($connection);
                $allItems = $objAllItems->getAllItems();

                foreach ($allItems as $key => $item) {
                    echo "<br>";

                    ?>
                    <div class="col-6 col-md-6 col-lg-4">
                        <a href="#items" class="item">
                            <?php if ($item['on_sale'] == 1) {
                                echo '<span class="tag">Sale</span>';
                            } ?>
                            <img src="images/edit/<?= $item['image']; ?>" alt="Image" class="img-fluid">
                            <div class="item-info">
                                <div class="col-md-12">
                                    <h3 style="color: whitesmoke"><?= $item['name']; ?> </h3>
                                    <strong class="price" style="color: navajowhite">$<?= $item['price']; ?></strong>
                                    <span class="collection d-block" style="color: antiquewhite">
                                        <?= substr($item['description'], 0, 40) . '...'; ?>
                                </span>
                                </div>
                                <div class="col-md-12">

                                    <?php
                                    # Disabling the add to cart functionality in case the item has already been added
                                    # to cart.
                                    $disable_button = "";
                                    if (array_search($item['id'], array_column($cartItems, 'item_id')) !== false) {
                                        $disable_button = "disabled";
                                    }
                                    ?>
                                    <button id="cart_btn_<?= $item['id']; ?>" <?php echo $disable_button ?>
                                            class="btn btn-primary" style="height: 75%;"
                                            onclick="addToCart(<?= $item['id']; ?>, this.id)">
                                        <span class="icon-shopping-bag"></span>
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>

    <div class="site-blocks-cover inner-page py-5" data-aos="fade">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 ml-auto order-lg-2 align-self-start">
                    <div class="site-block-cover-content">
                        <h2 class="sub-title">#New Summer Collection
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                        </h2>
                        <h1>Art Piece</h1>
                        <p><a href="cart.php" class="btn btn-black rounded-0" onclick="snackBar()">Go to Cart</a></p>
                        <div id="snackbar">Some text some message..</div>
                    </div>
                </div>
                <div class="col-lg-8 order-1 align-self-end">
                    <img src="images/new/art_piece11.jpg" alt="Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="title-section text-center col-12">
                    <h2 class="text-uppercase">Collections</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 block-3 products-wrap">
                    <div class="nonloop-block-3 owl-carousel">

                        <div class="product">
                            <a href="#" class="item">
                                <img src="images/edit/art_edit_6.jpg" alt="Image" class="img-fluid">
                                <div class="item-info">
                                    <h3>The Shoe</h3>
                                    <span class="collection d-block">Summer Collection</span>
                                    <strong class="price">$9.50</strong>
                                </div>
                            </a>
                        </div>

                        <div class="product">
                            <a href="#" class="item">
                                <span class="tag">Sale</span>
                                <img src="images/product_2.jpg" alt="Image" class="img-fluid">
                                <div class="item-info">
                                    <h3>Marc Jacobs Bag</h3>
                                    <span class="collection d-block">Summer Collection</span>
                                    <strong class="price">$9.50
                                        <del>$30.00</del>
                                    </strong>
                                </div>
                            </a>
                        </div>

                        <div class="product">
                            <a href="#" class="item">
                                <img src="images/product_3.jpg" alt="Image" class="img-fluid">
                                <div class="item-info">
                                    <h3>The Belt</h3>
                                    <span class="collection d-block">Summer Collection</span>
                                    <strong class="price">$9.50</strong>
                                </div>
                            </a>
                        </div>

                        <div class="product">
                            <a href="#" class="item">
                                <img src="images/product_1.jpg" alt="Image" class="img-fluid">
                                <div class="item-info">
                                    <h3>The Shoe</h3>
                                    <span class="collection d-block">Summer Collection</span>
                                    <strong class="price">$9.50</strong>
                                </div>
                            </a>
                        </div>

                        <div class="product">
                            <a href="#" class="item">
                                <span class="tag">Sale</span>
                                <img src="images/product_2.jpg" alt="Image" class="img-fluid">
                                <div class="item-info">
                                    <h3>Marc Jacobs Bag</h3>
                                    <span class="collection d-block">Summer Collection</span>
                                    <strong class="price">$9.50
                                        <del>$30.00</del>
                                    </strong>
                                </div>
                            </a>
                        </div>

                        <div class="product">
                            <a href="#" class="item">
                                <img src="images/product_3.jpg" alt="Image" class="img-fluid">
                                <div class="item-info">
                                    <h3>The Belt</h3>
                                    <span class="collection d-block">Summer Collection</span>
                                    <strong class="price">$9.50</strong>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="site-blocks-cover inner-page py-5" data-aos="fade">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 ml-auto order-lg-2 align-self-start">
                    <div class="site-block-cover-content">
                        <h2 class="sub-title">#New Summer Collection 2019</h2>
                        <h1>New Denim Coat</h1>
                        <p><a href="#" class="btn btn-black rounded-0">Shop Now</a></p>
                    </div>
                </div>
                <div class="col-lg-6 order-1 align-self-end">
                    <img src="images/model_5.png" alt="Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <footer class="site-footer custom-border-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

                    <div class="block-7">
                        <h3 class="footer-heading mb-4">About Us</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quae reiciendis distinctio
                            voluptates sed dolorum excepturi iure eaque, aut unde.</p>
                    </div>
                    <div class="block-7">
                        <form action="#" method="post">
                            <label for="email_subscribe" class="footer-heading">Subscribe</label>
                            <div class="form-group">
                                <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email">
                                <input type="submit" class="btn btn-sm btn-primary" value="Send">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 ml-auto mb-5 mb-lg-0">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="footer-heading mb-4">Quick Links</h3>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <ul class="list-unstyled">
                                <li><a href="#">Sell online</a></li>
                                <li><a href="#">Features</a></li>
                                <li><a href="#">Shopping cart</a></li>
                                <li><a href="#">Store builder</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <ul class="list-unstyled">
                                <li><a href="#">Mobile commerce</a></li>
                                <li><a href="#">Dropshipping</a></li>
                                <li><a href="#">Website development</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <ul class="list-unstyled">
                                <li><a href="#">Point of sale</a></li>
                                <li><a href="#">Hardware</a></li>
                                <li><a href="#">Software</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="block-5 mb-5">
                        <h3 class="footer-heading mb-4">Contact Info</h3>
                        <ul class="list-unstyled">
                            <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
                            <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
                            <li class="email">emailaddress@domain.com</li>
                        </ul>
                    </div>


                </div>
            </div>
            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script>
                        All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i>
                        by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>

            </div>
        </div>
    </footer>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>

<script src="js/main.js"></script>

<script type="text/javascript">
    function addToCart(item_id, cart_btn_id) {
        $('#loader').show();
        $.ajax({
            url: "action.php",
            data: "item_id=" + item_id + "&action=add",
            method: "post"
        }).done(function (response) {
            console.log(response)
            var data = JSON.parse(response);
            $('#loader').hide();
            $('.alert').show();

            if (data.status === 0) {
                console.log("Something went wrong");
                $('.alert').addClass('alert-danger');
                $('#result').html(data.message);
            } else {
                console.log("Something went right");
                $('.alert').addClass('alert-success');
                $('#result').html(data.message);
                // Disabling the add to cart button once successfully added to cart
                $('#' + cart_btn_id).prop('disabled', true);
                $('#item_count').text(parseInt($('#item_count').text()) + 1)
            }


        })
    }

    function snackBar() {
        let x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function () {
            x.className = x.className.replace("show", "");
        }, 3000);
    }
</script>

</body>

</html>