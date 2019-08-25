@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-xs-12">

            @include('admin.partials.flash-messages')

            <div class="panel panel-primary">
                <div class="panel-heading">Panel heading</div>
                <!-- Table -->
                <table id="datatable" class="table table-condensed table-striped">
                    <thead>
                    <tr>
                        {{--                                <th>id</th>--}}
                        <th>Image</th>
                        <th>Title AM</th>
                        <th>Title RU</th>
                        <th>Title EN</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th width="15%" class="text-center">Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td><a href="{{ route('admin.category-sections', $category->id) }}"><img height="40px" width="40px" src="{{ asset('img/categories/' . $category->image) }}" alt=""></a></td>
                            <td><a href="{{ route('admin.category-sections', $category->id) }}">{{ $category->title_am }}</a></td>
                            <td><a href="{{ route('admin.category-sections', $category->id) }}">{{ $category->title_ru }}</a></td>
                            <td><a href="{{ route('admin.category-sections', $category->id) }}">{{ $category->title_en }}</a></td>
                            <td>{{ $category->created_at }}</td>
                            <td>{{ $category->updated_at }}</td>
                            <td style="text-align: center;">

                                <form action="{{ route('categories.destroy', $category->id) }} " method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('categories.edit', $category->id)}}" class="btn btn-primary btn-sm">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>

                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn-sm btn btn-danger">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </form>
                                {{--                                    <a href="{{ route('categories.destroy', $category->id) }}"  class="btn btn-danger btn-xs">--}}
                                {{--                                        <span class="glyphicon glyphicon-trash"></span>--}}
                                {{--                                    </a>--}}
                            </td>
                        </tr>
                    @empty
                        <td>No categories</td>
                    @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>
@endsection

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

    <style>
        td a {
            color: #000000;
            /*text-decoration: none;*/
        }
    </style>
@endpush

@push('scripts')
    <!-- DataTables -->
    <script src="{{ asset('assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/adminlte/bower_components/fastclick/lib/fastclick.js') }}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/adminlte/dist/js/demo.js') }}"></script>
@endpush