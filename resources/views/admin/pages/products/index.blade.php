@extends('admin.layouts.main')

@section('content')


    <div class="row form-group">
        <div class="col-xs-4">

            <form action="" method="GET" role="search">
                <div class="input-group custom-search-form">
                    <input type="search" class="form-control" name="q" placeholder="Search...">

                    <span class="input-group-btn">
                        <button class="btn btn-default-sm" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">

            @include('admin.partials.flash-messages')

            <div class="panel panel-primary">
                <div class="panel-heading">
                    Panel heading
                </div>

                <!-- Table -->
                <table id="datatable" class="table table-condensed table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>image</th>
                        <th>Attributes</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->title}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->category->title_en}}</td>
                            <td><img width="40" src="{{ asset('img/products/' . $product->mainImage->resized_path ?? '') }}"></td>
                            <td>
                                @if( count($product->fields) > 0)
                                    <div class="btn btn-primary btn_expander" style="width: 100%">Expand</div>

                                    <div class="additional_fields" style="display: none">
                                        <table class="table table-condensed table-bordered table-striped">
                                            @foreach($product->fields as $attribute)
                                                <tr>
                                                    <td>{{ $attribute->pivot->title }}</td>
                                                    <td>{{ $attribute->pivot->value }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                @endif
                            </td>
                            <td>{{$product->created_at}}</td>
                            <td>{{$product->updated_at}}</td>
                            <td style="text-align: center;">
                                <form action="{{ route('products.destroy', $product->id) }} " method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('products.edit', $product->id)}}" class="btn btn-primary btn-sm">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>

                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn-sm btn btn-danger">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="pages">
                    {{--                        {{ $products->appends(Request::Input())->links() }}--}}
                    {{--                        {{ $products->appends(Request::except(['page']))->render() }}--}}
                    {!! $products->render() !!}
                </div>
            </div>

        </div>
    </div>




    {{--    <div class="ajax-load text-center" style="display:none">--}}
    {{--        <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>--}}
    {{--    </div>--}}

    {{--    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
    {{--        <div class="modal-dialog" role="document">--}}
    {{--            <div class="modal-content">--}}
    {{--                <div class="modal-header">--}}
    {{--                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>--}}
    {{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
    {{--                        <span aria-hidden="true">&times;</span>--}}
    {{--                    </button>--}}
    {{--                </div>--}}
    {{--                <div class="modal-body">--}}
    {{--                    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">--}}
    {{--                        <div class="form-group">--}}
    {{--                            <label for="recipient-name" class="col-form-label">Title Armenian</label>--}}
    {{--                            <input type="text" class="form-control" id="recipient-name">--}}
    {{--                        </div>--}}

    {{--                        <div class="form-group">--}}
    {{--                            <label for="recipient-name" class="col-form-label">Title Russian</label>--}}
    {{--                            <input type="text" class="form-control" id="recipient-name">--}}
    {{--                        </div>--}}

    {{--                        <div class="form-group">--}}
    {{--                            <label for="recipient-name" class="col-form-label">Title English</label>--}}
    {{--                            <input type="text" class="form-control" id="recipient-name">--}}
    {{--                        </div>--}}

    {{--                        <div class="form-group">--}}
    {{--                            <label for="recipient-name" class="col-form-label">Price</label>--}}
    {{--                            <input type="text" class="form-control" id="recipient-name">--}}
    {{--                        </div>--}}

    {{--                        <div class="form-group">--}}
    {{--                            <label>Category</label>--}}
    {{--                            <select class="form-control" name="name">--}}
    {{--                                @foreach($categories as $category)--}}
    {{--                                  <option value="{{ $category->id}}">{{ $category->title_AM }}</option>--}}
    {{--                                @endforeach--}}
    {{--                            </select>--}}
    {{--                        </div>--}}

    {{--                        <div class="form-group">--}}
    {{--                            <label for="images" class="col-form-label">images</label>--}}
    {{--                            <input type="file" class="form-control" multiple name="images[]" id="images">--}}
    {{--                        </div>--}}


    {{--                    </form>--}}
    {{--                </div>--}}

    {{--                <div class="modal-footer">--}}
    {{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
    {{--                    <input type="submit" class="btn btn-primary" value="Submit">--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

@endsection


@push('styles')
    <style>
        .ajax-load{
            background: #e1e1e1;
            padding: 10px 0px;
            width: 100%;
        }
    </style>
    <!-- DataTables -->
    {{--    <link rel="stylesheet" href="{{ asset('assets/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">--}}
@endpush

@push('scripts')
    <!-- DataTables -->
    {{--    <script src="{{ asset('assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>--}}
    {{--    <script src="{{ asset('assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>--}}
    {{--    <!-- SlimScroll -->--}}
    {{--    <script src="{{ asset('assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>--}}
    {{--    <!-- FastClick -->--}}
    {{--    <script src="{{ asset('assets/adminlte/bower_components/fastclick/lib/fastclick.js') }}"></script>--}}

    {{--    <!-- AdminLTE for demo purposes -->--}}
    {{--    <script src="{{ asset('assets/adminlte/dist/js/demo.js') }}"></script>--}}
    {{--    <!-- page script -->--}}
    {{--    <script>--}}
    {{--        $(function() {--}}
    {{--            $('#example2').DataTable({--}}
    {{--                processing: true,--}}
    {{--                serverSide: true,--}}
    {{--                ajax: '{!! route('datatables.data') !!}',--}}
    {{--                columns: [--}}
    {{--                    { data: 'id', name: 'id' },--}}
    {{--                    { data: 'title', name: 'title' },--}}
    {{--                    { data: 'category', name: 'category' },--}}
    {{--                    { data: 'image', name: 'image' },--}}
    {{--                    { data: 'created_at', name: 'created_at' },--}}
    {{--                    { data: 'updated_at', name: 'updated_at' }--}}
    {{--                ]--}}
    {{--            });--}}
    {{--        });--}}
    {{--    </script>--}}

    <script>
        $(document).ready(function() {

            $(document).on('click', '.btn_expander', function () {
                //getting the next element
                let toggle = $(this);
                content = toggle.next();
                content.toggle('slow', function () {
                        toggle.text(function () {
                            //change text based on condition
                            return content.is(":visible") ? "Collapse" : "Expand";
                        });
                    });

                // $('.majorpoints').click(function(){
                //     $(this).find('.hider').toggle();
                // });
            });

        });
    </script>

@endpush