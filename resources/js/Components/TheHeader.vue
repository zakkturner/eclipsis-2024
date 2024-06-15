<script setup>

</script>

<template>
<!--    &lt;!&ndash; Preloader &ndash;&gt;-->
<!--    <div class="preloader">-->
<!--        <div class="icon"></div>-->
<!--    </div>-->


    <header class="main-header header-style-two">

        <!-- Header Upper -->
        <div class="header-upper">
            <div class="inner-container clearfix header-flex">
                <!--Logo-->
                <div class="logo-box">
                    <div class="logo"><a href="/#top" title="Eclipsis Studios"><img
                        src="{{asset('/images/logos/cropped-eclipsis-dark.png')}}" class="main-logo"
                        alt="Eclipsis Studios | Web Agency"
                        title="Eclipsis Studios | Web Agency"><img src="/images/logos/cropped-eclipsis-yellow.png"
                                                                   id="thm-logo" alt="Eclipsis Studios | Web Agency"
                                                                   title="Eclipsis Studios | Web Agency" class="stricked-logo"></a></div>
                </div>
                <div class="nav-outer clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler"><span class="icon flaticon-menu-2"></span><span
                        class="txt">Menu</span></div>

                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li ><a href="/#top">Home</a>

                                </li>
                                <li>
                                    <a href="#about">About Us</a>

                                </li>
                                <li><a href="#services">Services</a>

                                </li>
                                <li><a href="#work">Our Work</a></li>

                                <li><a href="#discover">Discover</a></li>
                                <li><a href="#contact">Contact</a></li>

                            </ul>
                        </div>
                    </nav>
                </div>

                <div class="other-links clearfix">

                    <div class="link-box">
                        <div class="call-us">
                            <a class="link" href="tel:6668880000">
                                <span class="icon"></span>
                                <span class="sub-text">Call Anytime</span>
                                <span class="number">404-482-3287</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--End Header Upper-->


    </header>

    <!--Mobile Menu-->
    <div class="side-menu__block">


        <div class="side-menu__block-overlay custom-cursor__overlay">
            <div class="cursor"></div>
            <div class="cursor-follower"></div>
        </div><!-- /.side-menu__block-overlay -->
        <div class="side-menu__block-inner ">
            <div class="side-menu__top justify-content-end">

                <a href="#" class="side-menu__toggler side-menu__close-btn"><img src="images/icons/close-1-1.png"
                                                                                 alt=""></a>
            </div><!-- /.side-menu__top -->


            <nav class="mobile-nav__container">
                <!-- content is loading via js -->
            </nav>
            <div class="side-menu__sep"></div><!-- /.side-menu__sep -->
            <div class="side-menu__content">
                <p>Let's eclipse the competition!</p>
                <p><a href="mailto:admin@eclipsis.dev">admin@eclipsis.dev</a> <br> <a href="tel:4044823287">404-482-3287</a></p>
                <div class="side-menu__social">
                    <a href="https://www.facebook.com/eclipsisstudiosllc"><i class="fab fa-facebook-square"></i></a>
                    <a href="https://twitter.com/eclipsisdev"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/eclipsisstudios/"><i class="fab fa-instagram"></i></a>
                </div>
            </div><!-- /.side-menu__content -->
        </div><!-- /.side-menu__block-inner -->
    </div><!-- /.side-menu__block -->

    <!--Search Popup-->
    <div class="search-popup">
        <div class="search-popup__overlay custom-cursor__overlay">
            <div class="cursor"></div>
            <div class="cursor-follower"></div>
        </div><!-- /.search-popup__overlay -->
        <div class="search-popup__inner">
            <form action="#" class="search-popup__form">
                <input type="text" name="search" placeholder="Type here to Search....">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div><!-- /.search-popup__inner -->
    </div><!-- /.search-popup -->

</template>

<style scoped>

</style>
