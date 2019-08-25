@extends('admin.layouts.main')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ $product->title_en }} </h3>
                    @include('admin.partials.flash-messages')
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('products.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputTitle">Title</label>
                            <input type="text" name="title_am" class="form-control" id="exampleInputTitleEnglish" placeholder="Enter Armenian Title" value="{{ $product->title_am }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputTitle">Title</label>
                            <input type="text" name="title_ru" class="form-control" id="exampleInputTitleEnglish" placeholder="Enter Russian Title" value="{{ $product->title_ru }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputTitle">Title</label>
                            <input type="text" name="title_en" class="form-control" id="exampleInputTitleEnglish" placeholder="Enter English Title" value="{{ $product->title_en }}">
                        </div>

                        <div class="form-group">
{{--                            <label for="exampleInputTitle">Description</label>--}}
                            <textarea name="description" id="" cols="80" rows="10">{{ $product->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputTitle">Price</label>
                            <input type="number" name="price" class="form-control" id="exampleInputTitle" placeholder="Enter Price" value="{{ $product->price }}">
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <label>Category</label>--}}
{{--                            <select class="form-control" name="category_id" id="selectCategoryField">--}}
{{--                                @foreach($categories as $category)--}}
{{--                                    <option disabled value="{{ $category->id }}">{{ $category->title_en }}</option>--}}
{{--                                    @foreach($category->sections as $section)--}}
{{--                                        <option value="{{ $section->id }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--{{ $section->title_en }}</option>--}}
{{--                                    @endforeach--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <label for="exampleInputFile">File input</label>--}}
{{--                            <input type="file" name="image[]" multiple id="exampleInputFile">--}}

{{--                            <p class="help-block">Example block-level help text here.</p>--}}
{{--                        </div>--}}
{{-----------------------------------------------------------------------------------------------------------------------------------------}}
{{--                        <div id="drop-area">--}}
{{--                            <form class="my-form">--}}
{{--                                <div id="preview"></div>--}}
{{--                                <p>Upload multiple files with the file dialog or by dragging and dropping images onto the dashed region</p>--}}
{{--                                <input type="file" id="fileElem" multiple accept="image/*" >--}}
{{--                                <label class="button" for="fileElem">Select some files</label>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{-----------------------------------------------------------------------------------------------------------------------------------------}}
{{--                        <div class="field" align="left">--}}
{{--                            <h3>Upload your images</h3>--}}
{{--                            <input type="file" id="files" name="files[]" multiple />--}}
{{--                        </div>--}}
{{-------------------------------------------------------------------------------------------------------------------------------------------}}

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->



        </div>
    </div>
@endsection

@push('styles')
    <style>

        input[type="file"] {
            display: block;
        }
        .imageThumb {
            max-height: 75px;
            border: 2px solid;
            padding: 1px;
            cursor: pointer;
        }
        .pip {
            display: inline-block;
            margin: 10px 10px 0 0;
        }
        .remove {
            display: block;
            background: #444;
            border: 1px solid black;
            color: white;
            text-align: center;
            cursor: pointer;
        }
        .remove:hover {
            background: white;
            color: black;
        }
    </style>
@endpush

@push('scripts')
    <!-- SlimScroll -->
    <script src="{{ asset('assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/adminlte/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/adminlte/dist/js/demo.js') }}"></script>

    <script>
        $(document).ready(function () {

            let selectCategoryField = $('#selectCategoryField');
            let selectedCategory = selectCategoryField.val();
            let additionalFields = $('#additionalFields');

            getAdditionalFields(selectedCategory);

            selectCategoryField.change(function (e) {
                selectedCategory = $(this).val();
                getAdditionalFields(selectedCategory);
            });

            function getAdditionalFields(category) {

                $.ajax({

                    url: "{{ route('categories.fields') }}",
                    data: {category: category},
                    dataType: 'json',
                    method: 'get',

                    success: function (data) {
                        if (data['categoryFields'].length === 0)
                            return;

                        for (let categoryField of data['categoryFields']) {
                            console.log(categoryField);

                            switch (categoryField.type) {
                                case 'text' : createTextInput(categoryField); break;
                                case 'select' : createSelectInput(categoryField); break;
                                default: alert('xz');
                            }
                        }
                    }

                });

            }

            function createTextInput(categoryField) {
                let inputField = `
                    <div class="form-group">
                        <label for="exampleInputTitle">${categoryField.title}</label>
                        <input type="text" name="${categoryField.name}" class="form-control" id="exampleInputTitleEnglish" placeholder="${categoryField.placeholder}">
                    </div>`;

                additionalFields.before($('<input>').attr({type: 'hidden', name: 'additional_fields[]', value: categoryField.name}) );
                additionalFields.after(inputField);
            }

            function createSelectInput(categoryField) {
                let formGroup = $('<div>').addClass('form-group');
                let label = $('<label>').text(categoryField.title);
                let select = $('<select>').addClass('form-control').attr('name', categoryField.name);

                for (let singleValue of JSON.parse(categoryField.value))
                    select.append($('<option>').attr('value', singleValue).text(singleValue));

                additionalFields.before($('<input>').attr({type: 'hidden', name: 'additional_fields[]', value: categoryField.name}) );
                additionalFields.after(formGroup.append(label).append(select));
            }



        });
    </script>


{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            let filesArray;--}}

{{--            if (window.File && window.FileList && window.FileReader) {--}}
{{--                $("#files").on("change", function(e) {--}}
{{--                    var files = e.target.files,--}}
{{--                        filesLength = files.length;--}}

{{--                    for (var i = 0; i < filesLength; i++) {--}}
{{--                        var f = files[i];--}}
{{--                        var fileReader = new FileReader();--}}

{{--                        fileReader.onload = (function(e) {--}}
{{--                            var file = e.target;--}}
{{--                            $("<span class=\"pip\">" +--}}
{{--                                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +--}}
{{--                                "<br/><span class=\"remove\">Remove image</span>" +--}}
{{--                                "</span>").insertAfter("#files");--}}
{{--                            $(".remove").click(function(){--}}
{{--                                $(this).parent(".pip").remove();--}}
{{--                            });--}}

{{--                            // Old code here--}}
{{--                            /*$("<img></img>", {--}}
{{--                              class: "imageThumb",--}}
{{--                              src: e.target.result,--}}
{{--                              title: file.name + " | Click to remove"--}}
{{--                            }).insertAfter("#files").click(function(){$(this).remove();});*/--}}
{{--                            filesArray = $('#files')[0].files;--}}
{{--                            // console.log(filesArray);--}}


{{--                        });--}}
{{--                        fileReader.readAsDataURL(f);--}}
{{--                    }--}}
{{--                });--}}

{{--                // let filesArray = $('input:file#upload')[0].files--}}


{{--            } else {--}}
{{--                alert("Your browser doesn't support to File API")--}}
{{--            }--}}


{{--            $(document).on('click', '.remove', function (e) {--}}
{{--                // filesArray.splice(1,1);--}}
{{--                console.log(filesArray);--}}
{{--                delete(filesArray.1)--}}
{{--            });--}}

{{--        });--}}

{{--    </script>--}}
@endpush