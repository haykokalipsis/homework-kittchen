@extends('front.layouts.main')

@section('content')

    <div class="container product">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        COOKING EQUIPMENT
                    </li>   <li class="breadcrumb-item active" aria-current="page">
                        Stoves
                    </li>
                </ol>
            </div>
            <div class="step_p ">
                <div class="step_p">
                    <div class="bline"></div>
                    <div class="box_off">
                        <div class="circle">1</div>Sections</div>
                    <div class="box_on" style="width:25%;">
                        <div class="circle">2</div>Announcements</div>
                    <div class="box_off">
                        <div class="circle">3</div>Add photos</div>
                    <div class="box_off">
                        <div class="circle">4</div>Add</div>
                </div>
            </div>
        </div>


        <h5 class="car-header">Fill fields<span style="color: #f00;">*</span></h5>

        <!--Легковые автомобили-->

        <div class="container-fluid select-category-list">
            <div class="container-fluid"><h6>  COOKING EQUIPMENT </h6></div>

            <!-- Спецтехника и мотоциклы -->
            <div class="container-fluid select-category-list">

                <form method="POST" action="https://bymykitchen.com/en/add/category/items/uploadeitems" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="GsoFlp2VOV4sm44Ga6MfoAsnpbGIL1QXL9jkKaWW">                            <input type="hidden" name="section_id" value="1">
                    <input type="hidden" name="item_id" value="20" >

                    <p class="text-left">
                        <select class="form-control" style="width: auto;display: inline;" name="home" id="_idcurrency">
                            <option value="new" cheked>New</option>
                            <option value="used">Used</option>
                        </select>
                    </p>
                    <div class="row">

                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <p class="text-left">
                                    <input class="form-control" type="text" name="title" value=""  placeholder="The name:">
                                </p>

                            </div>
                            <div class="form-group ">
                                <textarea class="form-control" rows="8" cols="50" style="width:100%;height:200px" name="description" placeholder="A detailed description of your product or offer"></textarea>

                            </div>

                            <div class="form-group ">

                                <p class="text-left">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="address_address">Address</label>
                                        <input type="text" id="address-input" name="address_address" class="form-control map-input" value="">
                                        <input type="hidden" name="address_latitude" id="address-latitude" value="" />
                                        <input type="hidden" name="address_longitude" id="address-longitude" value="" />
                                    </div>
                                    <div id="address-map-container" style="width:100%;height:400px; ">
                                        <div style="width: 100%; height: 100%" id="address-map"></div>
                                    </div>
                                </div>
                                </p>
                                <p class="text-left">
                                    <input class="form-control" style="width: auto;display: inline;" maxlength="12"  style="width:100px" name="price" id="_idprice" type="number" placeholder="Price">
                                    <select class="form-control" style="width: auto;display: inline;" name="currency" id="_idcurrency">
                                        <option value="$">USD</option>
                                    </select>
                                </p>
                            </div>
                            <div class="form-group">

                                <p class="text-left">
                                    <input class="form-control" type="tel" name="tel" id="_idtel" placeholder="Tel">
                                </p>


                            </div>



                            <div class="form-group">
                                <br>
                                <button class="btn btn-info" type="submit">Next</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>




        </div>





    </div>














{{--    <div class="container product">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">--}}
{{--                <ol class="breadcrumb">--}}
{{--                    <li class="breadcrumb-item active" aria-current="page">--}}
{{--                        {{ $category->parent->title_en }}--}}
{{--                    </li>   <li class="breadcrumb-item active" aria-current="page">--}}
{{--                        {{ $category->title_en ??'' }}--}}
{{--                    </li>--}}
{{--                </ol>--}}
{{--            </div>--}}

{{--            <div class="step_p ">--}}
{{--                <div class="step_p">--}}
{{--                    <div class="bline"></div>--}}
{{--                    <div class="box_off">--}}
{{--                        <div class="circle">1</div>Բաժին--}}
{{--                    </div>--}}
{{--                    <div class="box_on">--}}
{{--                        <div class="circle">2</div>Հայտարարություն--}}
{{--                    </div>--}}
{{--                    <div class="box_off">--}}
{{--                        <div class="circle">3</div>Ավելացնել--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


{{--        <h5 class="car-header">Լրացրեք դաշտերը<span style="color: #f00;">*</span></h5>--}}

{{--        <!--Легковые автомобили-->--}}

{{--        <div class="row select-category-list">--}}
{{--            <div class="col-12"><h6>  {{ $category->title_en }} </h6></div>--}}

{{--            <!-- Спецтехника и мотоциклы -->--}}
{{--            <div class="row select-category-list">--}}

{{--                <form method="POST" action="{{ route('user.products.storeUpdate') }}">--}}
{{--                    @csrf--}}
{{--                    <input type="hidden" name="section_id" value="{{$section->id}}">--}}
{{--                    <input type="hidden" name="category_id" value="{{ $category->id ?? ''}}" >--}}
{{--                    <input type="hidden" name="product_id" value="{{ $product_id }}" >--}}
{{--                    <input type="hidden" name="images_order" id="imagesOrder">--}}

{{--                    <div class="row">--}}

{{--                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">--}}
{{--                            <div class="selCatWind">--}}
{{--                                <input type="text" name="country" placeholder="Տարածաշրջան">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">--}}
{{--                            <div class="selCatWind">--}}
{{--                                <input maxlength="12"  style="width:100px" name="price" id="_idprice" type="number" placeholder="Գին">--}}
{{--                                <select name="currency" id="_idcurrency"> --}}
{{--                                    <option value="$">USD</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">--}}
{{--                            <div class="selCatWind">--}}
{{--                                @if(auth()->user()->tel)--}}
{{--                                    <input type="tel" name="tel" id="_idtel" placeholder="Հեռ․" value="{{\Auth::user()->tel}}">--}}
{{--                                @else--}}
{{--                                    <input type="tel" name="tel" id="_idtel" placeholder="Հեռ․  +37498657545">--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">--}}
{{--                            <div class="selCatWind">--}}
{{--                                <div class="felement">--}}
{{--                                    <input maxlength="100" style="width:100%" name="title" id="_idtitle" type="text" placeholder="Անվանում">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="__margin-top-75"></div>--}}


{{--                        <label for="_iddescription"></label>--}}
{{--                        <textarea rows="8" cols="50" style="width:100%;height:200px" name="description" id="_iddescription" placeholder="Ձեր ապրանքի կամ առաջարկի մանրամասն նկարագրությունը"></textarea>--}}

{{--                    </div>--}}

{{--                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">--}}
{{--                        <button class="btn btn-info" type="submit">Առաջ</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}

{{--            {{ dd($product) }}--}}




{{--        </div>--}}
{{--        <div class="row">--}}



{{--            <div class="col-12">--}}
{{--                --}}{{--                        <div class="selCatWind">--}}
{{--                <form method="post" action="{{ route('dropzone-upload-product-image')}}" enctype="multipart/form-data"--}}
{{--                      class="dropzone" id="dropzone">--}}
{{--                    <input type="hidden" name="product_id" value="{{ $product_id }}">--}}
{{--                    @csrf--}}
{{--                </form>--}}
{{--                --}}{{--                        </div>--}}
{{--            </div>--}}
{{--            --}}{{--                <h3 class="jumbotron">Laravel Multiple Images Upload Using Dropzone</h3>--}}
{{--        </div>--}}


{{--    </div>--}}

{{--        <div class="__margin-top-75"></div>--}}
{{--    </div>--}}
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/front/js/Dropzone/dropzone.css') }}">
    @endpush

    @push('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" rel='nofollow'></script>

        <script src="{{ asset('assets/front/js/Dropzone/dropzone.js') }}"></script>

        <script type="text/javascript">

            let completeFiles = [];
            Dropzone.autoDiscover = false;
            let product_id = {{ $product_id }}

            $(".dropzone").dropzone({
                init: function() {
                    myDropzone = this;
                    completeFiles = myDropzone.files;
                },

                maxFilesize: 12,
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 5000,
                {{-- url: "{{ route('dropzone-upload-product-image') }}",--}}
                paramName: "file", // The name that will be used to transfer the file

                // clickable: true,
                // url: 'upload_files.php',
                // autoProcessQueue: false

                dictDefaultMessage: 'Upload your files here',

                renameFile: function(file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time+file.name;
                },

                queuecomplete: function (file) {
                    // completeFiles = this.files;
                    setOrder();
                    // alert(4);
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
                            console.log(e);
                        }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },

                {{--sending: function(file, xhr, formData){--}}
                        {{--    formData.append('product', {{ $product_id }});--}}
                        {{--},--}}
                success: function(file, response) {
                    console.log(response);
                    completeFiles = myDropzone.files;
                    file.id = response.id;
                    // alert(3);
                    setOrder();
                },

                error: function(file, response) {
                    return false;
                }
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
                // console.log(orderData);

                {{--$.ajax({--}}
                {{--    headers: {--}}
                {{--        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
                {{--    },--}}
                {{--    type: 'POST',--}}
                {{--    url: '{{ route('sort-images') }}',--}}
                {{--    data: {'orderData' : orderData},--}}
                {{--    dataType: 'json',--}}
                {{--    success: function (data) {--}}
                {{--        // console.log(data);--}}
                {{--        // console.log(completeFiles);--}}
                {{--        // console.log(myDropzone.files);--}}
                {{--    },--}}
                {{--    error: function (xhr, str) {--}}
                {{--        alert('Возникла ошибка: ' + xhr.responseCode);--}}
                {{--    }--}}
                {{--});--}}
            }

        </script>
    @endpush

@endsection

{{--@section('publish')--}}
{{--    <script src="{{asset('asset/js/postPublish.js')}}"></script>--}}
{{--@endsection--}}
