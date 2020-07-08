<nav class="navbar navbar-expand-lg navbar-light header-navigation stricky">
    <div class="container clearfix">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="logo-box clearfix">
            <button class="menu-toggler" data-target="#main-nav-bar">
                <span class="fa fa-bars"></span>
            </button>
        </div><!-- /.logo-box -->
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="main-navigation" id="main-nav-bar">
            <ul class="navigation-box">
                <li class=" current ">
                    <a href="<?=$root?>">Home</a>
                </li>
                <li><a href="<?=$root?>about">About</a></li>
                <li>
                    <a href="#">Pages</a>
                    <ul class="sub-menu">
                        <li><a href="<?=$root?>driver">Our Drivers</a></li>
                        <li><a href="<?=$root?>taxi">Our Taxi</a></li>
                        <li><a href="<?=$root?>single-taxi">Taxi Details</a></li>
                    </ul><!-- /.sub-menu -->
                </li>
                <li><a href="<?=$root?>book-ride">Book A Ride</a></li>
                <li>
                    <a href="<?=$root?>blog">Blog</a>
                    <ul class="sub-menu">
                        <li><a href="<?=$root?>blog">Blog Grid</a></li>
                        <li><a href="<?=$root?>blog-details">Blog Details</a></li>
                    </ul><!-- /.sub-menu -->
                </li>
                <li><a href="<?=$root?>contact">Contact</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
        <div class="right-side-box">
            <a href="callto:888-888-0000" class="contact-btn-block">
                <span class="icon-block">
                    <i class="conexi-icon-phone-call"></i>
                </span>
                <span class="text-block">
                    888 888 0000
                    <span class="tag-line">Phone line</span>
                </span>
            </a>
        </div><!-- /.right-side-box -->
    </div>
    <!-- /.container -->
</nav>