<script src="{{ asset('assets/front/js/_JQuery/jquery.js') }}"></script>
<script src="{{ asset('assets/front/js/_Popper/popper.js') }}"></script>
<script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>

<!--right before the closing </body> tag-->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/popper.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha256-CjSoeELFOcH0/uxWu6mC/Vlrc1AARqbm/jiiImDGV3s=" crossorigin="anonymous"></script>--}}

<script>

    $('.favorites').click(function () {
        var id=$(this).data('id');
        let block = $(this);
        block.attr('disabled', true);
        // alert(7);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('user.favourites.add') }}",
            data: {product_id: id},
            type: 'post',

            beforeSend: function() {
                // block.attr('disabled', true);
                // alert(7);
            },

            success:function(data){
                $('.favorites').hide(300);
                $('.success').show(300);
                console.log(data);
                block.attr('disabled', false);
            },
        });

    });

    $('.success').click(function () {
        var id=$(this).data('id');
        let block = $(this);
        block.attr('disabled', true);

        // alert(8);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            // url:'https://buymykitchen.com/favourite/'+id,
            url: "{{ route('user.favourites.delete') }}",
            data: {product_id: id},
            type: 'delete',

            beforeSend: function() {
                // block.attr('disabled', true);
            },

            success:function(data){

                $('.favorites').show(300);
                $('.success').hide(300);
                console.log(data);
                block.attr('disabled', false);
            },
        });

    });

    {{--let num = 0;--}}

    {{--$(document).on('click', '.favourite', function () {--}}
    {{--    var id=$(this).data('id');--}}
    {{--    let block = $(this);--}}
    {{--    num++;--}}
    {{--    $.ajax({--}}
    {{--        headers: {--}}
    {{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
    {{--        },--}}
    {{--        url: "{{ route('user.favourites.add') }}",--}}
    {{--        data: {product_id: id},--}}
    {{--        type: 'post',--}}
    {{--        beforeSend: function() {--}}
    {{--            block.attr('disabled', true);--}}
    {{--            // alert(7);--}}
    {{--        },--}}
    {{--        success: function(data) {--}}
    {{--            block.addClass('remove').removeClass('favourite');--}}
    {{--            block.find('.fa').addClass('fa-star').removeClass('fa-close');--}}
    {{--            block.attr('disabled', false);--}}

    {{--            // $('.favourite').hide(300);--}}
    {{--            // $('.success').show(300);--}}
    {{--            console.log(data);--}}
    {{--            // alert(num);--}}
    {{--        },--}}

    {{--    })--}}

    {{--});--}}

    {{--$(document).on('click', '.remove', function () {--}}
    {{--    num++;--}}
    {{--    var id=$(this).data('id');--}}
    {{--    let block = $(this);--}}

    {{--    $.ajax({--}}

    {{--        headers: {--}}
    {{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
    {{--        },--}}
    {{--        // url:'https://buymykitchen.com/favourite/'+id,--}}
    {{--        url: "{{ route('user.favourites.delete') }}",--}}
    {{--        data: {product_id: id},--}}
    {{--        type: 'delete',--}}
    {{--        beforeSend: function() {--}}
    {{--            block.attr('disabled', true);--}}
    {{--            // alert(7);--}}
    {{--        },--}}
    {{--        success:function(data){--}}
    {{--            block.addClass('favourite').removeClass('remove');--}}
    {{--            block.find('.fa').addClass('fa-close').removeClass('fa-star');--}}
    {{--            block.attr('disabled', false);--}}
    {{--            console.log(data);--}}
    {{--            // alert(num);--}}
    {{--        },--}}
    {{--    })--}}

    {{--})--}}
</script>

<script src="{{ asset('assets/front/js/_Slick/slick.js') }}"></script>
<script src="{{ asset('assets/front/js/index.js') }}"></script>
<script src="{{ asset('assets/front/js/product.js') }}"></script>

<script>


    $(document).ready(function() {


        {{--$('.search').on('input',function () {--}}

        {{--    var search =new FormData(this);--}}
        {{--    console.log(search);--}}
        {{--    $.ajax({--}}
        {{--        headers: {--}}
        {{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
        {{--        },--}}
        {{--        url: "{{ route('searchindex')}}",--}}
        {{--        type:'post',--}}
        {{--        data:search,--}}
        {{--        dataType : 'html',--}}
        {{--        cache:false,--}}
        {{--        contentType: false,--}}
        {{--        processData: false,--}}
        {{--        success:function(data){--}}
        {{--            $('.searchlist').html(data);--}}


        {{--        },--}}

        {{--        error: function(data){--}}



        {{--        }--}}

        {{--    });--}}
        {{--});--}}




    });


</script>
<script>
    (function(w,d,s,g,js,fs){
        g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
        js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
        js.src='../../../apis.google.com/js/platform.js';
        fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
    }(window,document,'script'));
</script>

<!-- Individual pages scripts -->
@stack('scripts')



