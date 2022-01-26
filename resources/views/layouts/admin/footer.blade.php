

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

    $('select[name="category_id"]').on('change', function () {
        var category_id = $(this).val();

        $('select[name="child_id"]').empty();
        $('select[name="child_id"]').append('<option selected value="">Choose...</option>');
        $('select[name="subchild_id"]').empty();
        $('select[name="subchild_id"]').append('<option selected value="">Choose...</option>');
        $('select[name="subcategory_id"]').empty();

        if (category_id) {
            $.ajax({
                url: "{{ URL::to('/admin/categryselect') }}/" + category_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    if(Object.keys(data).length > 0){
                        $('.selectsubcategory').removeClass('subcategory_id');
                        $('.selectchild').addClass('child_id');
                        $('.selectsubchild').addClass('subchild_id');

                        $('select[name="subcategory_id"]').empty();
                        $('select[name="subcategory_id"]').append('<option selected value="">Choose...</option>');
                        $.each(data, function (key, value) {
                            $('select[name="subcategory_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });

                    }else{
                        $('.selectsubcategory').addClass('subcategory_id');
                        $('.selectchild').addClass('child_id');
                        $('.selectsubchild').addClass('subchild_id');
                    }
                },
            });
        }
        else {
            $('.selectsubcategory').addClass('subcategory_id');
            $('.selectchild').addClass('child_id');
            $('.selectsubchild').addClass('subchild_id');
        }
    });

    $('select[name="subcategory_id"]').on('change', function () {

        $('select[name="subchild_id"]').empty();
        $('select[name="subchild_id"]').append('<option selected value="" >Choose...</option>');
        $('select[name="child_id"]').empty();

        var subcategory_id = $(this).val();
        if (subcategory_id) {
            $.ajax({
                url: "{{ URL::to('/admin/categryselect') }}/" + subcategory_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    if(Object.keys(data).length > 0){
                        $('.selectchild').removeClass('child_id');
                        $('.selectsubchild').addClass('subchild_id');

                        $('select[name="child_id"]').empty();
                        $('select[name="child_id"]').append('<option selected value="" >Choose...</option>');
                        $.each(data, function (key, value) {
                            $('select[name="child_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }else{
                        $('.selectchild').addClass('child_id');
                        $('.selectsubchild').addClass('subchild_id');
                    }
                },
            });
        }
        else {
            $('.selectchild').addClass('child_id');
            $('.selectsubchild').addClass('subchild_id');
        }
    });

    $('select[name="child_id"]').on('change', function () {

        var child_id = $(this).val();
        $('select[name="subchild_id"]').empty();

        if (child_id) {
            $.ajax({
                url: "{{ URL::to('/admin/categryselect') }}/" + child_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    if(Object.keys(data).length > 0){
                        $('.selectsubchild').removeClass('subchild_id');
                        $('select[name="subchild_id"]').empty();
                        $('select[name="subchild_id"]').append('<option selected value="" >Choose...</option>');
                        $.each(data, function (key, value) {
                            $('select[name="subchild_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });

                    }else{
                        $('.selectsubchild').addClass('subchild_id');
                    }

                },
            });
        }
        else {
            $('.selectsubchild').addClass('subchild_id');
        }
    });


</script>

@yield('js')

</body>
</html>
