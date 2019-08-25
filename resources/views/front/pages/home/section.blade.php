@extends('front.layouts.main')

@section('content')
    <div class="container __margin-top-35">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
                <form action="javascript:void(0)" id="filter">
                    <div class="catWind" style="background: #f4f4f4;padding: 5px;border-radius: 5px">
                        <h3>Sort</h3>
                        <hr style="    border-top: 2px solid rgba(0,0,0,.1);#eaeaea;">
                        <h4 class="text-left" style="text-indent: 10px;">Search for days</h4>
                        <p class="text-left">
                            <input type="date" id="date" class="form-control" name="calendar" style="width: 80%;margin: 0 auto">
                        </p>
                        <hr style="width: 80%;">
                        <h4 class="text-left" style="text-indent: 10px;">Search for days</h4>
                        <p class="text-left">
                        <p class="text-left">
                            <input  type="radio"  id="today" name="day" value="2019-07-05 00:00:00" required>
                            <label class="btn btn-secondary myCatBtn __font-size-12" for="today">day</label>
                        </p>
                        <p class="text-left">
                            <input  type="radio"  id="week" name="day" value="2019-07-01 00:00" required>
                            <label class="btn btn-secondary myCatBtn __font-size-12" for="week" >Week</label>
                        </p>
                        <p class="text-left">
                            <input  type="radio"  id="math" name="day" value="2019-07-01 00:00" required>
                            <label class="btn btn-secondary myCatBtn __font-size-12" for="math">Month</label>
                        </p>
                        </p>
                        <hr style="width: 80%;">
                        <h4 style="margin: 3px auto;text-align: left;text-indent: 10px;">Տեսակը</h4>
                        <p class="text-left">
                        <p class="text-left">
                            <input type="radio" class="" name="status" id="M" value="active" placeholder="новый" required>
                            <label for="M">Top announcements</label>
                        </p>
                        <p class="text-left">
                            <input type="radio" class="" name="status" id="N" value="inactve" placeholder="использованный" required>
                            <label for="N">Standard announcements</label>
                        </p>
                        <p class="text-left">
                            <input type="hidden" value="11" name="sec">
                        </p>
                        </p>
                    </div>
                </form>
            </div>

            <div class="col-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
                <div class="catWind">
                    <div class="row catlist1">
                        <div class="container advHeader" style="padding-right: 31px;">
                            <div class="row">
                                <div class="col-8 col-sm-9 col-md-8 col-lg-8 col-xl-10">
                                    <h3 class="catHeaderText">{{ $current_section->title_en }}</h3>
                                </div>
                                <div class="col-4 col-sm-3 col-md-4 col-lg-4 col-xl-2">
                                    <p>
                                        <button id="catTable" title="table" type="button" class="btn btn-success chooseTypeBtn"><i class="fa fa-th" aria-hidden="true"></i></button>
                                        <button id="catList" type="button" title="list" class="btn btn-light chooseTypeBtn"><i class="fa fa-list" aria-hidden="true"></i></button>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="catHeaderSecondText"><h4>Top Ads</h4></div>

{{--                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 showProducts">--}}
{{--                            <div class="CatAdvWindows">--}}
{{--                                <a href="../item/13.html" style="color: inherit">--}}
{{--                                    <div class="CatAdvWindImage">--}}
{{--                                        <img src="../../myitem/resize/667af8b4f10ff845a177045ff6e6287e649e4924dR.jpg" alt="IMage">--}}
{{--                                    </div>--}}
{{--                                    <div class="CatAdvWindText">--}}
{{--                                        <p>three door refrigerated prep table</p>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                    </div>

                    <div class="row catlist">

                        <div class="catHeaderSecondText"><h4>Standard announcements</h4></div>

                        @foreach($products as $product)
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 showProducts ">
                                <div class="CatAdvWindows">
                                    <a href="{{ route('front.product', $product->id) }}" style="color: inherit">
                                        <div class="CatAdvWindImage">
                                            <img width="40" src="{{ asset('img/products/' . $product->lastImage->resized_path ?? '') }}">
                                        </div>

                                        <div class="CatAdvWindText">
                                            <p>{{ $product->title_en }}</p>
{{--                                            <p>{{ $product->ser }}</p>--}}
{{--                                            {{ dd($product->productAttributes[0]->title) }}--}}
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>


                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('.favorites').click(function () {
            var id=$(this).data('id');
            $.ajax({
                url:'https://buymykitchen.com/favorites/'+id,
                type:'get',
                success:function(data){

                    $('.favorites').hide(300);
                    $('.success').show(300);
                    console.log(data);

                },
            })

        });

        $('.success').click(function () {
            var id=$(this).data('id');
            $.ajax({
                url:'https://buymykitchen.com/favoritesdel/'+id,
                type:'get',
                success:function(data){

                    $('.favorites').show(300);
                    $('.success').hide(300);
                    console.log(data);

                },
            })

        })
    </script>
    <script>
        $('#filter').change(function () {
            var MyData= new FormData(this);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "https://buymykitchen.com/en/newsfilter",
                type:'post',
                data:MyData,
                dataType : 'html',
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    $('.catlist').html(data);
                    console.log(data);
                    console.log(data.length);
                },
                error: function(data){
                }
            });
        });

    </script>

    <script src="{{ asset('assets/front/js/_Slick/slick.js') }}"></script>
    <script src="{{ asset('assets/front/js/index.js') }}"></script>
    <script src="{{ asset('assets/front/js/product.js') }}"></script>

    <script>


        $(document).ready(function() {


            $('.search').on('input',function () {

                var search =new FormData(this);
                console.log(search);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "https://buymykitchen.com/en/search",
                    type:'post',
                    data:search,
                    dataType : 'html',
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(data){
                        $('.searchlist').html(data);


                    },

                    error: function(data){



                    }

                });
            });




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
@endpush