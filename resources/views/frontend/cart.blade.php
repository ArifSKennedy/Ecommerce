<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>Product Cart Page</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets1/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets1/css/font-awesome.css') }}">

    <link rel="stylesheet" href="{{ asset('assets1/css/templatemo-hexashop.css') }}">

    <link rel="stylesheet" href="{{ asset('assets1/css/owl-carousel.css') }}">

    <link rel="stylesheet" href="{{ asset('assets1/css/lightbox.css') }}">
    <!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="{{ asset('assets1/images/logo.png') }}">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index.html" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="index.html">Men's</a></li>
                            <li class="scroll-to-section"><a href="index.html">Women's</a></li>
                            <li class="scroll-to-section"><a href="index.html">Kid's</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Pages</a>
                                <ul>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="products.html">Products</a></li>
                                    <li><a href="single-product.html">Single Product</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a rel="nofollow" href="https://templatemo.com/page/4" target="_blank">Template
                                            Page 4</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="index.html">Explore</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Keranjang (Cart Page)</h2>
                        <span>Windahbatubara &amp; Reza Kecap Hitam</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
        <div class="site-section">
            <div class="container">
                <div class="row mb-5">
                    <form class="col-md-12" action="" method="POST">
                        <div class="site-blocks-table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Gambar</th>
                                        <th class="product-name">Produk</th>
                                        <th class="product-price">Harga</th>
                                        <th class="product-quantity">Jumlah</th>
                                        <th class="product-total">Total Harga</th>
                                        <th class="product-remove">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <form action="{{url('cart',$obat->slug)}}" method="GET"> --}}

                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="" alt="Image" class="img-fluid">
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>


                                        <td></td>
                                        <td><a href="#" class="btn btn-primary height-auto btn-sm">X</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="" alt="Image" class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black"></h2>
                                        </td>
                                        <td></td>
                                        <td>
                                            <div class="input-group mb-3" style="max-width: 120px;">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-primary js-btn-minus"
                                                        type="button">&minus;</button>
                                                </div>
                                                <input type="text" class="form-control text-center" value="1"
                                                    placeholder="" aria-label="Example text with button addon"
                                                    aria-describedby="button-addon1">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary js-btn-plus"
                                                        type="button">&plus;</button>
                                                </div>
                                            </div>

                                        </td>
                                        <td>$49.00</td>
                                        <td><a href="#" class="btn btn-primary height-auto btn-sm">X</a></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="row mb-5">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <a href="" class="btn btn-primary btn-md btn-block">Kembali</a>
                            </div>
                            <div class="col-md-6 mb-3 mb-md-0">
                                <button type="submit" class="btn btn-primary btn-md btn-block">
                                    checktout</button>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="first-item">
                        <div class="logo">
                            <img src="{{ asset('assets1/images/white-logo.png') }}"
                                alt="hexashop ecommerce templatemo">
                        </div>
                        <ul>
                            <li><a href="#">16501 Collins Ave, Sunny Isles Beach, FL 33160, United States</a>
                            </li>
                            <li><a href="#">hexashop@company.com</a></li>
                            <li><a href="#">010-020-0340</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Shopping &amp; Categories</h4>
                    <ul>
                        <li><a href="#">Men’s Shopping</a></li>
                        <li><a href="#">Women’s Shopping</a></li>
                        <li><a href="#">Kid's Shopping</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Homepage</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Help &amp; Information</h4>
                    <ul>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">FAQ's</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Tracking ID</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Copyright © 2022 HexaShop Co., Ltd. All Rights Reserved.

                            <br>Design: <a href="https://templatemo.com" target="_parent"
                                title="free css templates">TemplateMo</a>

                            <br>Distributed By: <a href="https://themewagon.com" target="_blank"
                                title="free & premium responsive templates">ThemeWagon</a>
                        </p>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- jQuery -->
    <script src="{{ asset('assets1/js/jquery-2.1.0.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('assets1/js/popper.js') }}"></script>
    <script src="{{ asset('assets1/js/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('assets1/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets1/js/accordions.js') }}"></script>
    <script src="{{ asset('assets1/js/datepicker.js') }}"></script>
    <script src="{{ asset('assets1/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('assets1/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets1/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets1/js/imgfix.min.js') }}"></script>
    <script src="{{ asset('assets1/js/slick.js') }}"></script>
    <script src="{{ asset('assets1/js/lightbox.js') }}"></script>
    <script src="{{ asset('assets1/js/isotope.js') }}"></script>
    <script src="{{ asset('assets1/js/quantity.js') }}"></script>

    <!-- Global Init -->
    <script src="{{ asset('assets1/js/custom.js') }}"></script>

    <script>
        $(function() {
            var selectedClass = "";
            $("p").click(function() {
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function() {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);

            });
        });
    </script>

</body>

</html>
