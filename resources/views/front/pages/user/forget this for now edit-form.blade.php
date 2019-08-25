@extends('front.layouts.main')

@section('content')

{{--        <div class="container">--}}

{{--            <form id="form" action="{{ route('test') }}" method="post" enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                <fieldset class="form-group">--}}
{{--                    <a href="javascript:void(0)" onclick="$('#pro-image').click()">Upload Image</a>--}}
{{--                    <input type="file" id="pro-image" name="file[]" style="display: none;" class="form-control" multiple>--}}
{{--                    <input type="file" id="pro-image" name="file" style="display: none;" class="form-control">--}}
{{--                </fieldset>--}}

{{--                <form action="{{ route('images.upload') }}" method="post" enctype="multipart/form-data">--}}

{{--                    {{ csrf_field() }}--}}

{{--                    <input type="file" id="uploadFile" name="uploadFile[]" multiple/>--}}

{{--                    <input type="submit" class="btn btn-success" name='submitImage' value="Upload Image"/>--}}

{{--                </form>--}}

{{--                <div id="hiddens">--}}

{{--                </div>--}}

{{--                <div class="preview-images-zone">--}}
{{--                    <div class="preview-image preview-show-1">--}}
{{--                        <div class="image-cancel" data-no="1">x</div>--}}
{{--                        <div class="image-zone"><img id="pro-img-1" src="https://img.purch.com/w/660/aHR0cDovL3d3dy5saXZlc2NpZW5jZS5jb20vaW1hZ2VzL2kvMDAwLzA5Ny85NTkvb3JpZ2luYWwvc2h1dHRlcnN0b2NrXzYzOTcxNjY1LmpwZw=="></div>--}}
{{--                        <div class="tools-edit-image"><a href="javascript:void(0)" data-no="1" class="btn btn-light btn-edit-image">edit</a></div>--}}
{{--                    </div>--}}
{{--                    <div class="preview-image preview-show-2">--}}
{{--                        <div class="image-cancel" data-no="2">x</div>--}}
{{--                        <div class="image-zone"><img id="pro-img-2" src="https://www.codeproject.com/KB/GDI-plus/ImageProcessing2/flip.jpg"></div>--}}
{{--                        <div class="tools-edit-image"><a href="javascript:void(0)" data-no="2" class="btn btn-light btn-edit-image">edit</a></div>--}}
{{--                    </div>--}}
{{--                    <div class="preview-image preview-show-3">--}}
{{--                        <div class="image-cancel" data-no="3">x</div>--}}
{{--                        <div class="image-zone"><img id="pro-img-3" src="http://i.stack.imgur.com/WCveg.jpg"></div>--}}
{{--                        <div class="tools-edit-image"><a href="javascript:void(0)" data-no="3" class="btn btn-light btn-edit-image">edit</a></div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    <label for="">--}}
{{--                        <input type="submit" name="" id="" value="Send">--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}


<form id="form" enctype="multipart/form-data" method="post">
    <input id="image-upload" name="images[]" type="file"  multiple/>

    <input type="text" name="name" id="">
    <input type="checkbox" name="check" id="" value="one">
    <input type="checkbox" name="check" id="" value="two">
    <input class="update btn btn-purple" type="submit" value="Upload Gallery" />
</form>

@endsection

@push('styles')
    <style>
        .preview-images-zone {
            width: 100%;
            border: 1px solid #ddd;
            min-height: 180px;
            /* display: flex; */
            padding: 5px 5px 0px 5px;
            position: relative;
            overflow:auto;
        }
        .preview-images-zone > .preview-image:first-child {
            height: 185px;
            width: 185px;
            position: relative;
            margin-right: 5px;
        }
        .preview-images-zone > .preview-image {
            height: 90px;
            width: 90px;
            position: relative;
            margin-right: 5px;
            float: left;
            margin-bottom: 5px;
        }
        .preview-images-zone > .preview-image > .image-zone {
            width: 100%;
            height: 100%;
        }
        .preview-images-zone > .preview-image > .image-zone > img {
            width: 100%;
            height: 100%;
        }
        .preview-images-zone > .preview-image > .tools-edit-image {
            position: absolute;
            z-index: 100;
            color: #fff;
            bottom: 0;
            width: 100%;
            text-align: center;
            margin-bottom: 10px;
            display: none;
        }
        .preview-images-zone > .preview-image > .image-cancel {
            font-size: 18px;
            position: absolute;
            top: 0;
            right: 0;
            font-weight: bold;
            margin-right: 10px;
            cursor: pointer;
            display: none;
            z-index: 100;
        }
        .preview-image:hover > .image-zone {
            cursor: move;
            opacity: .5;
        }
        .preview-image:hover > .tools-edit-image,
        .preview-image:hover > .image-cancel {
            display: block;
        }
        .ui-sortable-helper {
            width: 90px !important;
            height: 90px !important;
        }

        .container {
            padding-top: 50px;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            document.getElementById('pro-image').addEventListener('change', readImage, false);--}}

{{--            $( ".preview-images-zone" ).sortable();--}}

{{--            $(document).on('click', '.image-cancel', function() {--}}
{{--                let no = $(this).data('no');--}}
{{--                $(".preview-image.preview-show-"+no).remove();--}}
{{--            });--}}


{{--        });--}}

{{--        let arr = [];--}}
{{--        let number = 4;--}}

{{--        function readImage() {--}}
{{--            if (window.File && window.FileList && window.FileReader) {--}}
{{--                var files = event.target.files; //FileList object--}}
{{--                console.log(files);--}}
{{--                var output = $(".preview-images-zone");--}}

{{--                for (let i = 0; i < files.length; i++) {--}}
{{--                    var file = files[i];--}}
{{--                    $('#hiddens').append(`<input class="flo" style="display: none;" type='file' name="files[]" value='${file}'>`);--}}
{{--                    arr.push(file);--}}
{{--                    console.log(file);--}}

{{--                    if (!file.type.match('image')) continue;--}}

{{--                    var picReader = new FileReader();--}}

{{--                    picReader.addEventListener('load', function (event) {--}}
{{--                        var picFile = event.target;--}}
{{--                        var html =  '<div class="preview-image preview-show-' + number + '">' +--}}
{{--                            '<div class="image-cancel" data-no="' + number + '">x</div>' +--}}
{{--                            '<div class="image-zone"><img id="pro-img-' + number + '" src="' + picFile.result + '"></div>' +--}}
{{--                            '<div class="tools-edit-image"><a href="javascript:void(0)" data-no="' + number + '" class="btn btn-light btn-edit-image">edit</a></div>' +--}}
{{--                            '</div>';--}}

{{--                        output.append(html);--}}
{{--                        number = number + 1;--}}
{{--                    });--}}

{{--                    picReader.readAsDataURL(file);--}}
{{--                }--}}

{{--            } else {--}}
{{--                console.log('Browser not support');--}}
{{--            }--}}
{{--        }--}}


{{--        $('form').submit(function (e) {--}}
{{--            e.preventDefault();--}}

{{--            // console.log(arr);--}}

{{--            var formData = new FormData($(this)[0]);     // создаем новый экземпляр объекта и передаем ему нашу форму (*)--}}
{{--            formData.append('file', $('#pro-image').files[0]);--}}

{{--            $.ajax({--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                },--}}
{{--                type : 'post',// Тип, get или post записан в параметре method формы--}}
{{--                url : "{{ route('test') }}", // url записан в параметре action формы--}}
{{--                data : formData,--}}
{{--                dataType: 'json',--}}
{{--                contentType: false, // важно - убираем форматирование данных по умолчанию--}}
{{--                processData: false, // важно - убираем преобразование строк по умолчанию--}}
{{--                success: function(data) {--}}
{{--                    console.log(data);--}}
{{--                    // console.log(JSON.parse(data));--}}
{{--                }--}}
{{--            });--}}

{{--            return false; // отменяем отправку формы, т.е. перезагрузку страницы--}}
{{--        });--}}

{{--    </script>--}}


{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>--}}
{{--    <script>--}}
{{--        $(function() {--}}

{{--            $(".update").click(function(e) {--}}
{{--                // Stops the form from reloading--}}
{{--                e.preventDefault();--}}
{{--                $.ajaxSetup({--}}
{{--                    headers: {--}}
{{--                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                    }--}}
{{--                });--}}
{{--                let image_upload = new FormData();--}}
{{--                let TotalImages = $('#image-upload')[0].files.length;  //Total Images--}}
{{--                let images = $('#image-upload')[0];--}}
{{--                for (let i = 0; i < TotalImages; i++) {--}}
{{--                    image_upload.append('images' + i, images.files[i]);--}}
{{--                }--}}
{{--                image_upload.append('TotalImages', TotalImages);--}}

{{--                $.ajax({--}}
{{--                    url: "{{ route('test') }}",--}}
{{--                    type: 'POST',--}}
{{--                    contentType:false,--}}
{{--                    processData: false,--}}
{{--                    data:image_upload,--}}
{{--                    success: function(result) {--}}
{{--                        // alert(result.message);--}}
{{--                        console.log(result.message);--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--            /*Upload file::*/--}}
//         });






{{--    </script>--}}

    <script>
        $(function() {

            $("#form").submit(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Создание формдаты и подключение к ней инпутов--------------------------------------------------------
                // Вариант 1. Коротко, ясно, без выебонов
                let formData = new FormData(this); // Возьмёт все инпуты, включая файлы (файлы работают)

                // Вариант 2
                // Проиграется два цикла: для обычных инпутов и для файлов. Можно добавить какую нить простенькую валидацию
                /*formData = new FormData();
                $(this).find('input').each(function(){       // пробегаем по всем инпутам формы и для каждого
                    if ($(this).attr('type') != 'file') {    // а кромя тех у кого тип файл
                        formData.append($(this).attr('name'), $(this).val()); // помещаем все значения полей в объект
                    }
                });

                let files = $('#image-upload')[0].files;

                for (let i = 0; i < files.length; i++) {
                    // Check the file type.
                    var file = files[i];
                    if ( ! file.type.match('image.*')) {
                        formData.append('images[]', files[i]);
                    }
                }*/
                // Конец созданию формдатыи и подключению инпутов-------------------------------------------------------

                $.ajax({
                    // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, Уже установлены сверху
                    url : $(this).attr('action'), // url записан в параметре action формы
                    type : $(this).attr('method'),// Тип, get или post записан в параметре method формы
                    // method: 'delete', Вроде работает, вместо type, и применимо для роутов ларавеля
                    contentType:false,  // важно - убираем форматирование данных по умолчанию
                    processData: false, // важно - убираем преобразование строк по умолчанию
                    // dataType: 'JSON', Вроде не объязательно, хз
                    data: formData,

                    success: function(result) {
                        console.log(result.message);
                        // console.log(result.message);
                    }
                });

                return false; // отменяем отправку формы, т.е. перезагрузку страницы
            });

        });
    </script>
@endpush



{{--@section('publish')--}}
{{--    <script src="{{asset('asset/js/postPublish.js')}}"></script>--}}
{{--@endsection--}}
