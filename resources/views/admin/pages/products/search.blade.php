@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Table With Full Features</h3>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Open modal</button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <table id="example2" class="table ">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>image</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                            </tr>
                        </thead>

                        <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->title}}</td>
                                        <td>{{$product->category->title_en}}</td>
                                        <td>
{{--                                            <img src="{{ asset('/storage/uploads/' . $product->img->resized_name) }}">--}}
{{--                                            <img src="{{ asset('/storage/uploads/' . $product->images->resized_name) }}">--}}
{{--                                            <img src="{{ asset('/storage/uploads/' . $product->img->resized_name) }}">--}}
                                        </td>
                                        <td>{{$product->created_at}}</td>
                                        <td>{{$product->updated_at}}</td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>

                    {{ $products->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Title Armenian</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Title Russian</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Title English</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Price</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="name">
                                @foreach($categories as $category)
                                  <option value="{{ $category->id}}">{{ $category->title_AM }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="images" class="col-form-label">images</label>
                            <input type="file" class="form-control" multiple name="images[]" id="images">
                        </div>


                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </div>
        </div>
    </div>

@endsection


@push('styles')
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
@endpush