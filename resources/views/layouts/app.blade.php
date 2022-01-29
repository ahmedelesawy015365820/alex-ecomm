<!doctype html>
<html lang="{{LaravelLocalization::getCurrentLocale()}}" dir="{{LaravelLocalization::getCurrentLocale() == 'en' ? '': 'rtl'; }}">
<head>
    @include("layouts.website.header")
</head>
<body>
    <div id="app" class="bg-light ">

        <!-- loader start -->
        <div class="loader-wrapper">
            <div>
                <img src="{{asset('assets/images/loader.gif')}}" alt="loader">
            </div>
        </div>
        <!-- loader end -->

        <!--header start-->
        @include("layouts.website.mainHeader")
        <!--header end-->

        <!--slider start-->
        @include("layouts.website.mainSidebar")
        <!--slider end-->

        <!--services start-->
        @include("layouts.website.service")
        <!--services end-->

        <!--media-banner start-->
        @include("layouts.website.media")
        <!--media-banner end-->

        <!--blog start-->
        @include("layouts.website.blog")
        <!--blog end-->

        <!--footer start-->
        @include("layouts.website.mainFooter")
        <!--footer end-->

        <!-- Add to cart bar -->
        @include("layouts.website.cartBar")
        <!-- Add to cart bar end-->

        <!--Newsletter modal popup start-->
        @include("layouts.website.newLetter")
        <!--Newsletter Modal popup end-->

        <!-- Quick-view modal popup start-->
        @include("layouts.website.popupProduct")
        <!-- Quick-view modal popup end-->

        <!-- My account bar start-->
        @include("layouts.website.account")
        <!-- Add to account bar end-->

        <!-- Add to wishlist bar -->
        @include("layouts.website.wishlist")
        <!-- Add to wishlist bar end-->


    </div>

    @include("layouts.website.footer")
</body>
</html>
