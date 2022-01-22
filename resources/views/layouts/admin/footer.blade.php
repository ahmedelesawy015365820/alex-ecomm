

<!-- Scripts -->
{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
<!-- latest jquery-->
<script src="{{ asset('assets/js/jquery-3.3.1.min.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.js')}}"></script>

<!-- feather icon js-->
<script src="{{ asset('assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js')}}"></script>

<!-- Sidebar jquery-->
<script src="{{ asset('assets/js/sidebar-menu.js')}}"></script>

<!-- lazyload js-->
<script src="{{ asset('assets/js/lazysizes.min.js')}}"></script>

<!--copycode js-->
<script src="{{ asset('assets/js/prism/prism.min.js')}}"></script>
<script src="{{ asset('assets/js/clipboard/clipboard.min.js')}}"></script>
<script src="{{ asset('assets/js/custom-card/custom-card.js')}}"></script>

<!--counter js-->
<script src="{{ asset('assets/js/counter/jquery.waypoints.min.js')}}"></script>
<script src="{{ asset('assets/js/counter/jquery.counterup.min.js')}}"></script>
<script src="{{ asset('assets/js/counter/counter-custom.js')}}"></script>

@yield('chart')

<!--right sidebar js-->
<script src="{{ asset('assets/js/chat-menu.js')}}"></script>

<!--height equal js-->
<script src="{{ asset('assets/js/equal-height.js')}}"></script>

<!-- lazyload js-->
<script src="{{ asset('assets/js/lazysizes.min.js')}}"></script>

<!--script admin-->
<script src="{{ asset('assets/js/admin-script.js')}}"></script>

<script>
    $('.custom-theme').on('click', function() {
    if($('.custom-theme').hasClass('rtl')){
        document.querySelector(".ar").click();
    }else{
        document.querySelector(".en").click();
    }
    });

    $('.name-ar').on('input', function(e) {
            $('.slug-ar').val($(this).val());
    });

    $('.name-en').on('input', function(e) {
            $('.slug-en').val($(this).val());
    });

</script>

</body>
</html>
