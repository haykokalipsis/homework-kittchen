@extends('front.layouts.main')

@section('content')

    <div class="container product">
        <div class="row">
            <div class="col-12 col-sm-12 col-md- col-lg-8 col-xl-8 pWind-1">
                <div class="product-window">
                    <h3>{{ $product->title_en }}</h3>
                    <p>
{{--                        <button class="btn btn-warning @if ($isFavourite) success @else favourite @endif" onclick="" data-id="{{ $product->id }}">--}}

{{--                        <button class="btn btn-warning {{ $isFavourite ? 'favourites' : 'success'}}" data-id="{{ $product->id }}">--}}
{{--                            <i class="fa fa-star" aria-hidden="true" style="color:{{ $isFavourite ? 'red' : 'white'}};"></i>--}}
{{--                        </button>--}}

                        @if($isFavourite)
                            <button class="btn btn-warning success" data-id="{{ $product->id }}">
                                <i class="fa fa-star" aria-hidden="true" style="color: red;"></i>
                            </button>

                            <button class="btn btn-warning favorites" data-id="{{ $product->id }}" style="display: none;">
                                <i class="fa fa-star" aria-hidden="true" style="color: white;"></i>
                            </button>
                        @else
                            <button class="btn btn-warning success" data-id="{{ $product->id }}" style="display: none;">
                                <i class="fa fa-star" aria-hidden="true" style="color: red;"></i>
                            </button>

                            <button class="btn btn-warning favorites" data-id="{{ $product->id }}">
                                <i class="fa fa-star" aria-hidden="true" style="color: white;"></i>
                            </button>
                        @endif

                        <!-- Map Modal opener link -->
                        @if ($product->address_address)
                            <a
                                    href="#"
                                    data-toggle="modal"
                                    data-target="#myModalmap"
                                    data-lat='{{ $product->address_latitude }}'
                                    data-lng='{{ $product->address_longitude }}'>

                                <i class="fa fa-map-marker" aria-hidden="true" style="color: #005cbf"></i> {{ $product->address_address }}
                            </a>
                        @endif
                        <!-- Map Modal opener link END-->
                    </p>

                    <div class="container">
                        <a class="thumbnail mainImg-link" href="#" data-image-id="" data-toggle="modal" data-title=""
                           data-image="{{ asset('img/products/' . $product->lastImage->original_path ?? '') }}"
                           data-target="#image-gallery">
                            <img class="img-thumbnail mainImg"
                                 src="{{ asset('img/products/' . $product->lastImage->resized_path ?? '') }}"
                                 alt="Another alt text">
                        </a>
                    </div>

                    <section class="center slider">
{{--                        <div>--}}
{{--                            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""--}}
{{--                               data-image="{{ asset('img/products/' . $product->lastImage->original_path ?? '') }}"--}}
{{--                               data-target="#image-gallery">--}}
{{--                                <img class="img-thumbnail secndImegSlde"--}}
{{--                                     src="{{ asset('img/products/' . $product->lastImage->resized_path ?? '') }}"--}}
{{--                                     alt="Another alt text">--}}
{{--                            </a>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""--}}
{{--                               data-image="{{ asset('img/products/' . $product->lastImage->original_path ?? '') }}"--}}
{{--                               data-target="#image-gallery">--}}
{{--                                <img class="img-thumbnail secndImegSlde"--}}
{{--                                     src="{{ asset('img/products/' . $product->lastImage->resized_path ?? '') }}"--}}
{{--                                     alt="Another alt text">--}}
{{--                            </a>--}}
{{--                        </div>--}}

                        @foreach($product->images as $image)
                            <div>
                                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                                   data-image="{{ asset('img/products/' . $image->original_path ?? '') }}"
                                   data-target="#image-gallery">
                                    <img class="img-thumbnail secndImegSlde"
                                         src="{{ asset('img/products/' . $image->resized_path ?? '') }}"
                                         alt="Another alt text">
                                </a>
                            </div>
                        @endforeach
                    </section>

                    <div class="container gallery">
                        <div class="row">
                            <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="image-gallery-title"></h4>
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img alt="IMG" id="image-gallery-image" class="img-responsive col-md-12" src="#">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                                            </button>

                                            <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <ul class="list-group">
                            <li class="list-group-item" style="color: #333;">
                                <p><span style="color: #666;">Additional information</span></p>

{{--                                {{ dump($product->pattributes) }}--}}
                                @foreach($product->fields as $field)
                                    <p>{{ $field->pivot->title }} : {{ $field->pivot->value }}</p>
                                @endforeach
                                <p>
                                    For more details please leave a message
                                </p>
                            </li>
                        </ul>
                    </div>

                    <div class="container">
                        <ul class="list-group">
                            <li class="list-group-item" style="color: #333;">
                                <p><span style="color: #666;">Advertising information</span></p>

                                <p>
                                    For more details please leave a message
                                </p>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-12 col-sm-12 col-md- col-lg-4 col-xl-4 pWind-2">
                <div class="product-window-info">
                    <p class="text-right" style="font-size: 12px;">
                        <span style="color: #666;">Posted by </span><i>2019 Jul 03 01:11</i>
                    </p>
                    <div class="personImage">
                        <img id="thumbImgs" src="{{ asset('img/products/' . $product->lastImage->resized_path ?? '') }}"
                             alt="">

                        <p class="text-center">Profcontact</p>
                        <p class="text-center">
                            <button class="btn btn-primary" onclick="location.href
='../../login.html'"><i class="fa fa-envelope" aria-hidden="true"></i></button>

                        </p>
                        <div id="coll" class="collapse text-center">
                            <h6>Show numbers</h6>
                            <button style="width: 40%;" class="btn btn-success" data-toggle="modal" data-target="#coll-modal">Yes</button>
                            <button style="width: 40%;" class="btn btn-danger" data-toggle="collapse" data-target="#coll">No</button>
                            <!-- The Modal -->
                            <div class="modal" id="coll-modal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Profcontact</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <p class=""><i class="fa fa-phone btn btn-info" aria-hidden="true"></i> </p>

                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#coll" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <form action="#" method="get">
                            <p class="text-center">
                                <button type="submit" value="top" class="btn btn-secondary paragBtn"><i class="fa fa-line-chart" aria-hidden="true"></i> топ</button>
                                <button type="submit" value="main" class="btn btn-secondary paragBtn"><i class="fa fa-home" aria-hidden="true"></i> главная</button>
                                <button type="submit" value="urgently" class="btn btn-secondary paragBtn"><i class="fa fa-clock-o" aria-hidden="true"></i> срочно</button>
                            </p>
                        </form>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-4 col-lg-12 col-xl-6">
                            <div class="advWindows">
                                <a href="10.html" style="color: inherit;">
                                    <div class="advWindImage">

                                        <img src="../../myitem/resize/d1a8b2492ad723334ce43dca083681d2c08e9e36A0.jpg" alt="IMage">
                                    </div>
                                    <div class="advWindText">
                                        <p>{{ $product->title_en }}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-12 col-xl-6">
                            <div class="advWindows">
                                <a href="12.html" style="color: inherit;">
                                    <div class="advWindImage">

                                        <img src="../../myitem/resize/2bc534a55a2732f75d74ecff60a2e9f79d5ea0f5BQ.jpg" alt="IMage">
                                    </div>
                                    <div class="advWindText">
                                        <p>Single door reach in refrigerator</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-12 col-xl-6">
                            <div class="advWindows">
                                <a href="11.html" style="color: inherit;">
                                    <div class="advWindImage">

                                        <img src="../../myitem/resize/df401a3511145be7b09937d6b3ebb88e3acdabc8W3.jpg" alt="IMage">
                                    </div>
                                    <div class="advWindText">
                                        <p>Single glass door reach in freezer</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Modal -->
    <div class="modal fade" id="myModalmap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog  modal-lg custom-class" role="document">
            <div class="modal-content">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12 ">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 modal_body_map">
                            <div class="location-map" id="location-map">
                                <div style="width: 400px; height: 400px;" id="map_canvas"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Map Modal END -->

@endsection

@push('scripts')
    <!-- Подключение Карт -->
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
    <script src="{{ asset('assets/front/js/mapInput.js') }}"></script>

    <!-- Инициализация карт с существующими координатами -->
    <script>
        var map = null;
        var myMarker;
        var myLatlng;

        function initializeGMap(lat, lng) {
            myLatlng = new google.maps.LatLng(lat, lng);

            var myOptions = {
                zoom: 12,
                zoomControl: true,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

            myMarker = new google.maps.Marker({
                position: myLatlng
            });
            myMarker.setMap(map);
        }

        // Re-init map before show modal
        $('#myModalmap').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            initializeGMap(button.data('lat'), button.data('lng'));
            $("#location-map").css("width", "100%");
            $("#map_canvas").css("width", "100%");
        });

        // Trigger map resize event after modal shown
        $('#myModalmap').on('shown.bs.modal', function() {
            google.maps.event.trigger(map, "resize");
            map.setCenter(myLatlng);
        });
    </script>
@endpush