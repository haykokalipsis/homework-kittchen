@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">Edit Category</h3>
                </div>

                @include('admin.partials.flash-messages')

                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('categories.update', $current_category->id) }}" enctype="multipart/form-data" method="post">
                    @method('PUT')
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputTitleArmenian">Title Armenian</label>
                            <input type="text" name="title_am" class="form-control" id="exampleInputTitleArmenian" placeholder="Enter Title" value="{{ $current_category->title_am }}">
                            <span class="text-danger">{{$errors->first('title_am')}}</span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputTitleRussian">Title Russian</label>
                            <input type="text" name="title_ru" class="form-control" id="exampleInputTitleRussian" placeholder="Enter Title" value="{{ $current_category->title_ru }}">
                            <span class="text-danger">{{$errors->first('title_ru')}}</span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputTitleEnglish">Title English</label>
                            <input type="text" name="title_en" class="form-control" id="exampleInputTitleEnglish" placeholder="Enter Title" value="{{ $current_category->title_en }}">
                            <span class="text-danger">{{$errors->first('title_en')}}</span>
                        </div>

{{--                        {{ dd($current_category->parent->title_en) }}--}}

                        <div class="form-group">
                            <label>Parent Category</label>
                            <select class="form-control" name="parent_id">
                                <option value="">Root</option>
{{--                                <option value="" {{ $current_category->parent_id == null ? 'selected' : '' }}>Root</option>--}}
                                @foreach($categories as $category)
                                    {{ $category->parent_id }}
                                    <option value="{{ $category->id }}" {{ $current_category->parent_id == $category->id ? 'selected' : '' }}>{{ $category->title_en }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="control-group">
                            <label class="control-label">Image upload</label>
                            <div class="controls">
                                <input type="file" name="image" id="image"/>
                                <span class="text-danger">{{$errors->first('image')}}</span>
{{--                                @if($current_category->img != '')--}}
                                    &nbsp;&nbsp;&nbsp;
{{--<!--                                    <a href="javascript:" rel="{{$current_category->id}}" rel1="delete-image" class="btn btn-danger btn-mini deleteRecord">Delete Old Image</a>-->--}}
                                    <img src="{{asset('img/categories/' . $current_category->image)}}" width="35" alt="">
{{--                                @endif--}}
                            </div>
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <label for="exampleInputFile">Icon</label>--}}
{{--                            <input type="file" name="image" id="exampleInputFile">--}}

{{--                            <p class="help-block">Example block-level help text here.</p>--}}
{{--                        </div>--}}
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <a href="{{ route('categories.index') }}" class="btn btn-default">Back</a>
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
@endpush