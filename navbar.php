<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">Application Template</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="services.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gallery.php">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blog-home.php">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="event-home.php">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop-home.php">Shop</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Portfolio
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                        <a class="dropdown-item" href="portfolio-1-col.php">1 Column Portfolio</a>
                        <a class="dropdown-item" href="portfolio-2-col.php">2 Column Portfolio</a>
                        <a class="dropdown-item" href="portfolio-3-col.php">3 Column Portfolio</a>
                        <a class="dropdown-item" href="portfolio-4-col.php">4 Column Portfolio</a>
                        <a class="dropdown-item" href="portfolio-item.php">Single Portfolio Item</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Other Pages
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                        <a class="dropdown-item" href="full-width.php">Full Width Page</a>
                        <a class="dropdown-item" href="sidebar.php">Sidebar Page</a>
                        <a class="dropdown-item" href="faq.php">FAQ</a>
                        <a class="dropdown-item" href="404.php">404</a>
                        <a class="dropdown-item" href="pricing.php">Pricing Table</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if(SessionManager::getSecurityUserId() > 0 ) {
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAdmin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Administration
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownAdmin">
                            <a class="dropdown-item" href="admin-home.php">Admin Home</a>
                            <a class="dropdown-item" href="create-blog.php">Create Blog</a>
                            <a class="dropdown-item" href="create-item.php">Create Item</a>
                            <a class="dropdown-item" href="create-user.php">Create User</a>
                            <a class="dropdown-item" href="create-image.php">Create Image</a>
                            <a class="dropdown-item" href="create-event.php">Create Event</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <?php
                }else if(SessionManager::getCustomerId() > 0){  //customer is logged in
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="online-cart.php"><i class="icon-basket"></i> Cart
                            <span id="cartCounter" class="badge badge-pill badge-primary">
                                <?php
                                $foundcart = Cart::loadbycustomerid(SessionManager::getCustomerId());
                                $totalcartcount = 0;
                                if($foundcart != null){
                                    //use this cart id for item;
                                    $cartid = $foundcart->getId();
                                    $totalcartcount = Onlinecart::getcartcount($cartid);
                                }
                                echo $totalcartcount;
                                ?>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customer-profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <?php
                }
                else{   //nobody logged in
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create-customer.php">Register</a>
                    </li>
                    <?php
                }
                ?>

            </ul>
        </div>
    </div>
</nav>