<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
    <title>Ekko</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="icon" href="images/logo/logo_transparent.png" type="image/png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="site-wrap">


    <div class="site-navbar bg-white py-2 position-relative">

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
                                    <li><a href="#">Men</a></li>
                                    <li><a href="#">Women</a></li>
                                    <li><a href="#">Children</a></li>
                                    <li class="has-children">
                                        <a href="#">Sub Menu</a>
                                        <ul class="dropdown">
                                            <li><a href="#">Men</a></li>
                                            <li><a href="#">Women</a></li>
                                            <li><a href="#">Children</a></li>
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
                    <a href="cart.php" class="icons-btn d-inline-block bag">
                        <span class="icon-shopping-bag"></span>
                        <span class="number">2</span>
                    </a>
                    <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                                class="icon-menu"></span></a>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong
                            class="text-black">Cart</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
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
            <?php
            require 'classes/Cart.php';
            $objCart = new Cart();
            $objCart->setCustomerId($_SESSION['customer_id']);
            $cartItems = $objCart->getAllCartItems();
            ?>
            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            # Calculating subtotals and total amount
                            $sub_total = 0;

                            foreach ($cartItems as $key => $cartItem) {
                                $sub_total += $cartItem['total_amount'];
                                $quantity += $cartItem['quantity'];

                                ?>
                                <tr>
                                    <td class="product-thumbnail">
                                        <img src="images/edit/<?= $cartItem['image']; ?>"
                                             alt="<?= $cartItem['item_name']; ?>" class="img-fluid">
                                    </td>
                                    <td class="product-name">
                                        <h2 class="h5 text-black"><?= $cartItem['item_name']; ?></h2>
                                    </td>
                                    <td>$<?= number_format($cartItem['price'], 2); ?></td>
                                    <td>
                                        <div class="input-group mb-3" style="max-width: 120px;">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-primary js-btn-minus" type="button"
                                                        onclick="updateCart(<?= $cartItem['item_id']; ?>, <?= $cartItem['id']; ?>)">
                                                    &minus;
                                                </button>
                                            </div>
                                            <input type="text"
                                                   class="form-control text-center" id="item_<?= $cartItem['id']; ?>"
                                                   value="<?= $cartItem['quantity']; ?>" placeholder=""
                                                   aria-label="Example text with button addon"
                                                   aria-describedby="button-addon1">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary js-btn-plus" type="button"
                                                        onclick="updateCart(<?= $cartItem['item_id']; ?>, <?= $cartItem['id']; ?>)">
                                                    &plus;
                                                </button>
                                            </div>
                                        </div>

                                    </td>
                                    <td id="total_price_<?= $cartItem['id']; ?>">$<?= $cartItem['total_amount']; ?></td>
                                    <td><a href="#" class="btn btn-primary height-auto btn-sm"
                                           onclick="removeItem()">X</a></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <button class="btn btn-primary btn-sm btn-block">Update Cart</button>
                        </div>
                        <div class="col-md-6">
                            <a href="index.php">
                                <button class="btn btn-outline-primary btn-sm btn-block">Continue Shopping</button>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="text-black h4" for="coupon">Coupon</label>
                            <p>Enter your coupon code if you have one.</p>
                        </div>
                        <div class="col-md-8 mb-3 mb-md-0">
                            <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-sm px-4">Apply Coupon</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">

                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">Subtotal</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black"
                                            id="sub_total">$<?= number_format($sub_total, 2) ?></strong>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black"
                                            id="final_total">$<?= number_format($sub_total, 2) ?></strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-lg btn-block"
                                            onclick="window.location='checkout.html'">Proceed To Checkout
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
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
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
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
    function updateCart(item_id, cart_id) {
        console.log(parseInt($('#item_' + cart_id).val()) + 1);
        let item_quantity = parseInt($('#item_' + cart_id).val()) + 1
        $('#loader').show();
        $.ajax({
            url: "action.php",
            data: "item_id=" + item_id + "&action=update&quantity=" + item_quantity,
            method: "post"
        }).done(function (response) {
            let data = JSON.parse(response);
            $('#loader').hide();
            $('.alert').show();
            if (data.status === 0) {
                $('.alert').addClass('alert-danger');
                $('#result').html(data.message);
            } else {
                $('.alert').addClass('alert-success');
                $('#result').html(data.message);
                $('#total_price_' + cart_id).text(data.data.total_price);
                $('#sub_total').text(data.data.sub_total);
                $('#final_total').text(data.data.final_price);
            }
        })
    }


</script>
</body>
</html>