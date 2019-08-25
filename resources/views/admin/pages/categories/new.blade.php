@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">New Category</h3>
                </div>

                @include('admin.partials.flash-messages')
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('categories.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputTitleArmenian">Title Armenian</label>
                            <input type="text" name="title_am" class="form-control" id="exampleInputTitleArmenian" placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputTitleRussian">Title Russian</label>
                            <input type="text" name="title_ru" class="form-control" id="exampleInputTitleRussian" placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputTitleEnglish">Title English</label>
                            <input type="text" name="title_en" class="form-control" id="exampleInputTitleEnglish" placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label>Parent Category</label>
                            <select class="form-control" name="parent_id">
                                <option value="">None</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('parent_id') == $category->title_en ? 'selected' : '' }}>{{ $category->title_en }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Icon</label>
                            <input type="file" name="image" id="exampleInputFile">

                            <p class="help-block">Example block-level help text here.</p>
                        </div>

                        <hr>
                        <p><strong>Additional Fields</strong></p>
                        <a href="#" class="btn btn-sm btn-info btn-add-more-fields">Add more fields</a>

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

@endpush

@push('scripts')
    <!-- SlimScroll -->
    <script src="{{ asset('assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/adminlte/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/adminlte/dist/js/demo.js') }}"></script>


    <script>
        let field = `<div class="input-group col-md-4 field-select-container margin-bottom">
                            <select class="form-control" name="additional_fields[]">
                                @foreach($fields as $field)
                                    <option value="{{ $field->id }}">{{ $field->title }}</option>
                                @endforeach
                            </select>

                            <a href="#" class="btn input-group-addon btn-sm btn-danger btn-remove" type="button">Remove</a>
                        </div>`;



        $('.btn-add-more-fields').on('click', function (e) {
            e.preventDefault();
            $(this).before(field);
        });

        $(document).on('click', '.btn-remove', function (e) {
            e.preventDefault();
            $(this).parents('.field-select-container').remove();
        });
    </script>
@endpush