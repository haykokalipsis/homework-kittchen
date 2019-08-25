@extends('front.layouts.main')

@section('content')

    <div class="container product">

        <h5 class="car-header">Լրացրեք դաշտերը<span style="color: #f00;">*</span></h5>

        @include('admin.partials.flash-messages')

        <div class="container-fluid select-category-list">
            <div class="container-fluid"><h6>  {{ $category->title_en }} </h6></div>

            <div class="container-fluid select-category-list">
                <form method="POST" action="{{ route('user.products.storeUpdate') }}">
                    @csrf
                    <input type="hidden" name="category_id" value="{{ $category->id ?? ''}}" >
                    <input type="hidden" name="product_id" value="{{ $product->id }}" >
                    <input type="hidden" name="images_order" id="imagesOrder">

                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <p class="text-left">
                                    <label>Condition
                                        <br>
                                        <select class="form-control" style="width: auto;display: inline;" name="home" id="_idcurrency">
                                            <option value="new"  {{ $product->condition === 'new' ?  'selected' : '' }}>New</option>
                                            <option value="used" {{ $product->condition === 'used' ? 'selected' : '' }}>Used</option>
                                        </select>
                                    </label>
                                </p>
                            </div>

                            <div class="form-group">
                                <p class="text-left">
                                    <label>Title
                                        <input type="text" name="title" id="" class="form-control" value="{{ $product->title }}">
                                    </label>
                                </p>
                            </div>

                            <div class="form-group">
                                <label>Description
                                    <textarea class="form-control" rows="8" cols="50" style="width:100%;height:200px" name="description" placeholder="A detailed description of your product or offer">{{ $product->description }}</textarea>
                                </label>
                            </div>

                            <!-- Google Maps -->
                            @if ($product->address_address)
                                <div class="form-group">
                                    <label for="address-input">Address</label>

                                    <button type="button" id="hideMap">Hide</button>
                                    <button type="button" id="showMap" >Show</button>

                                    <input type="text" id="address-input" name="address_address" class="form-control map-input" value="{{ $product->address_address }}" >
                                    <input type="hidden" id="addressAll" name="addressAll">
                                    <input type="hidden" name="address_latitude" id="address-latitude" value="address-latitude" />
                                    <input type="hidden" name="address_longitude" id="address-longitude" value="address-longitude" />
                                </div>

                                <div id="address-map-container" style="width:100%;height:400px; ">
                                    <div data-longitude="{{ $product->address_longitude }}"  data-latitude="{{ $product->address_latitude }}" style="width: 100%; height: 100%" id="address-map"></div>
                                </div>

                                <div id="addresinputhide"></div>
                            @endif
                            <!-- Google Maps END -->

                            <div class="form-group">
                                <label>Price
                                    <br>
                                    <input class="form-control" style="width: auto;display: inline;" maxlength="12"  style="width:100px" name="price" id="_idprice" type="number" placeholder="Price" value="{{ $product->price }}">
                                </label>

                                <select class="form-control" style="width: auto;display: inline;" name="currency" id="_idcurrency">
                                    <option value="AMD" {{ $product->currency ===  'AMD' ? 'selected' : ''}}>AMD</option>
                                    <option value="USD" {{ $product->currency ===  'USD' ? 'selected' : ''}}>USD</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tel
                                    <p class="text-left">
                                        <input class="form-control" type="tel" name="tel" id="_idtel" placeholder="Հեռ․" value="{{ $product->tel }}">
                                    </p>
                                </label>
                            </div>

                            @foreach($fields as $field )
                                <div class="form-group">
                                    <label>{{ $field->name }}</label>
                                    @if($field->type == 'select')
                                        <select class="form-control" name="{{ $field->name }}">
                                            @foreach(json_decode($field->value) as $value)
                                                <option value="{{ $value }}" {{ $value === $product->fields->first()->pivot->value ? 'selected' : ''}}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <input class="form-control"  type="{{ $field->type }}" name="{{ $field->name }}" placeholder="{{ $field->placeholder }}">
                                    @endif
                                </div>
                            @endforeach

                            <div class="form-group">
                                <div class="dropzone" id="dropzone">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-info" name="" id="" value="Առաջ">
                            </div>


                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="__margin-top-75"></div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/front/js/Dropzone/dropzone.css') }}">

    <style>
        .dz-message{
            text-align: center;
            font-size: 28px;
        }

        .dz-preview .dz-image img{
            width: 100% !important;
            height: 100% !important;
            object-fit: cover;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" rel='nofollow'></script>

    <script src="{{ asset('assets/front/js/Dropzone/dropzone.js') }}"></script>

    <!-- Подключение Карт -->
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initializeGMap" async defer></script>
    <script src="{{ asset('assets/front/js/mapInput.js') }}"></script>

    <!-- Инициализация карт с существующими координатами -->
    <script>
        // $(document).ready(function () { или вместо этого прописать коллбэк в срц скрипта как тут
            var map = null;
            var myMarker;
            var myLatlng;

            // Re-init map before show modal
            function initializeGMap() {
                myLatlng = new google.maps.LatLng($('#address-map').data('latitude'), $('#address-map').data('longitude'));

                var myOptions = {
                    zoom: 12,
                    zoomControl: true,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                // map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                map = new google.maps.Map(document.getElementById("address-map"), myOptions);

                myMarker = new google.maps.Marker({
                    position: myLatlng
                });

                myMarker.setMap(map);
            }
        // });

    </script>

    <!-- Кнопки показа/скрытности карт -->
    <script type="text/javascript">
        $(document).on('click', '#hideMap', function(){
            $('#address-input').css('display','none');
            $('#address-map-container').css('display','none');
            $('#addresinputhide').append('<input type="hidden" name="addreshide" value="hide">')
        });

        $(document).on('click', '#showMap', function(){
            $('#address-input').css('display','block');
            $('#address-map-container').css('display','block');
            $('#addresinputhide').html('');
        });

        let completeFiles = [];
        Dropzone.autoDiscover = false;
        let product_id = {{ $product->id }}

        $(".dropzone").dropzone({
            init: function() {
                myDropzone = this;
                completeFiles = myDropzone.files;

                // this.on("addedfile", function(event) {
                //     while (myDropzone.files.length > myDropzone.options.maxFiles) {
                //         myDropzone.removeFile(myDropzone.files[0]);
                //         // I think backend works here to
                //     }
                // });

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('dropzone-get-product-images') }}",
                    type: 'get',
                    data: {product_id: product_id},
                    dataType: 'json',
                    success: function(response){

                        $.each(response, function(key,value) {
                            // Create the mock file, attach images data from database to it
                            var mockFile = { name: value.name, size: value.size, id: value.name, accepted: true, kind: 'image' };
                            myDropzone.files.push(mockFile);
                            myDropzone.emit("addedfile", mockFile);

                            // myDropzone.createThumbnailFromUrl(mockFile, mockFile.url);
                            myDropzone.emit("thumbnail", mockFile, value.path);

                            myDropzone.emit("complete", mockFile);
                            myDropzone._updateMaxFilesReachedClass();

                        });

                        completeFiles = myDropzone.files;
                        setOrder();

                    }
                });
            },

            maxFilesize: 12,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 5000,
            url: "{{route('dropzone-upload-product-image') }}",
            paramName: "file", // The name that will be used to transfer the file
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            // clickable: true,
            // url: 'upload_files.php',
            // autoProcessQueue: false

            dictDefaultMessage: 'Upload your files here',

            sending: function(data, xhr, formData){
                formData.append('product_id', product_id);
            },

            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
                return time+file.name;
            },

            queuecomplete: function (file) {
                completeFiles = this.files;
                setOrder();
            },

            success: function(file, response) {
                console.log(response);
                completeFiles = myDropzone.files;
                file.id = response.id;
                setOrder();
            },

            error: function(file, response) {
                return false;
            },

            removedfile: function(file) {
                // var name = file.upload.filename;
                let id = file.id;
                // console.log(file.upload);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: "{{ route('dropzone-delete-product-image') }}",
                    // data: {filename: name, id: id},
                    data: {id: id},
                    success: function (data){
                        // console.log(data);
                        // console.log(completeFiles);
                        // console.log(myDropzone.files);
                        completeFiles = myDropzone.files;
                        setOrder();
                    },
                    error: function(e) {
                        file.previewElement.classList.add("dz-error");
                        console.log(e);
                    }});
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },

        });

        $('#dropzone').sortable({
            update: function( event, ui ) {
                setOrder();
            }
        });

        function setOrder() {
            let imagesOrder = $('#imagesOrder');

            let orderData = [];

            for (let singleFile of completeFiles) {
                orderData.push({
                    id: singleFile.id,
                    order: $(singleFile.previewElement).index('.dz-preview'),
                });
            }

            orderData = JSON.stringify({ 'orderData': orderData});

            imagesOrder.val(orderData);
        }

    </script>
@endpush






{{--@section('publish')--}}
{{--    <script src="{{asset('asset/js/postPublish.js')}}"></script>--}}
{{--@endsection--}}
