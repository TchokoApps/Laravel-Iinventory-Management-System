@include('frontend.head')
<body>

<!-- preloader-start -->
<div id="preloader">
    <div class="rasalina-spin-box"></div>
</div>
<!-- preloader-end -->

<!-- Scroll-top -->
<button class="scroll-top scroll-to-target" data-target="html">
    <i class="fas fa-angle-up"></i>
</button>
<!-- Scroll-top-end-->

<!-- header-area -->
@include('frontend.header-area')
<!-- header-area-end -->

<!-- main-area -->
<main>
    @yield('main')
</main>
<!-- main-area-end -->


<!-- Footer-area -->
@include('frontend.footer-area')
<!-- Footer-area-end -->


<!-- JS here -->
@include('frontend.js-area')
</body>
</html>
