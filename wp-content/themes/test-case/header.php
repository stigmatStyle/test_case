<?php

$field = get_field( 'option_field', 'option' );

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<?php
	if ( function_exists( 'has_site_icon' ) && has_site_icon() ) {
		wp_site_icon();
	} ?>

    <title><?php
		wp_title(); ?></title>
	<?php
	wp_head(); ?>

</head>
<body <?php
body_class(); ?>>

<div id="preloader">
    <div class="wrapper">
        <div class="cssload-loader"></div>
    </div>
</div>

<div class="top-search-area">
    <!-- Search Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- Close Button -->
                    <button type="button" class="btn close-btn" data-dismiss="modal"><i class="fa fa-times"></i>
                    </button>
                    <!-- Form -->
                    <form action="index.html" method="post">
                        <input type="search" name="top-search-bar" class="form-control"
                               placeholder="Search and hit enter...">
                        <button type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<header class="header-area">
    <!-- Main Header Start -->
    <div class="main-header-area">
        <div class="classy-nav-container breakpoint-off">
            <!-- Classy Menu -->
            <nav class="classy-navbar justify-content-between" id="uzaNav">

                <!-- Logo -->

                <a class="nav-brand" href="index.html"><img src="<?php
					echo get_template_directory_uri() ?>/img/core-img/logo.png" alt=""></a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">
                    <!-- Menu Close Button -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <?
                        wp_nav_menu([
	                        'theme_location' => 'main-menu',
	                        'menu_id'        => 'nav',
	                        'container'      => false,
	                        'walker'         => new CustomWalker()
                        ]);
                        ?>
                        <!-- Get A Quote -->
                        <div class="get-a-quote ml-4 mr-3">
                            <a href="#" class="btn uza-btn">Get A Quote</a>
                        </div>

                        <!-- Login / Register -->
                        <div class="login-register-btn mx-3">
                            <a href="#">Login <span>/ Register</span></a>
                        </div>

                        <!-- Search Icon -->
                        <div class="search-icon" data-toggle="modal" data-target="#searchModal">
                            <i class="icon_search"></i>
                        </div>
                    </div>
                    <!-- Nav End -->

                </div>
            </nav>
        </div>
    </div>
</header>

<?php if (!is_front_page()) { ?>
<div class="breadcrumb-area">
    <div class="container h-100">
        <div class="row h-100 align-items-end">
            <div class="col-12">
                <div class="breadcumb--con">
                    <h2 class="title">Portfolio</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Portfolio</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Background Curve -->
    <div class="breadcrumb-bg-curve">
        <img src="<?php
        echo get_template_directory_uri() ?>/img/core-img/curve-5.png" alt="">
    </div>
</div>
<?php } ?>