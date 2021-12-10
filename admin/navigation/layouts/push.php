<header id="masthead" class="site-header" style="width: 100%; position: relative; height: 80px;">
    <div class="container" style="padding:0;">
        <div id="primary-nav-row" class="" style="width: 100%; margin:0;">
            <div class="" style="padding:0; display: inline-block; width: auto; float: left; position:relative;">
                <img src="" alt="overture-logo" style="min-height: 80px; padding: 10px;">
            </div>
            <div class="float-end" style="padding:0; display: inline-block; width:auto; position:relative;">
                <nav id="primary-nav-menu" class="overture-nav main-navigation">
                <?php 
                wp_nav_menu(
                    array(
                        'theme_location' => 'overture-creative',
                        'menu_id'        => 'primary-menu',
                    )
                );
                ?>
                </nav>
                
            </div>
        </div>
    </div>
    <nav id="primary-mobile-nav-menu" class="overture-nav">
        <div id="top-mobile-nav" class="text-center">
            <div style="min-height: 80px; padding: 20px 10px;"></div>
            <!-- <img src="" alt="logo" style="min-height: 80px; padding: 20px 10px;"> -->
            <div class="hamburger-menu-wrapper" style="position: absolute; top:0; right:0; height:100%;">
                <button class="hamburger-menu ham-1">
                    <span>toggle menu</span>
                </button>
            </div>
        </div>
        <div id="push-menu-outer">
            <div id="push-menu-abs">
                <div id="push-top-control" style="position:relative; height:80px;">
                    <div class="hamburger-menu-wrapper" style="position: absolute; top:0; right:0; height:100%;">
                        <button class="hamburger-menu ham-2 active">
                            <span>toggle menu</span>
                        </button>
                    </div>
                </div>
                <div id="mobile-menu-dd">
                    <?php 
                    wp_nav_menu(
                        array(
                            'theme_location' => 'overture-creative-mobile',
                            'menu_id'        => 'mobile-menu',
                        )
                    );
                    ?>
                </div>
            </div>
        </div>
    </nav>
</header><!-- #masthead -->
    <div id="push-overlay" class="closed" style="display: none;"></div>
    <div id="page" class="site">