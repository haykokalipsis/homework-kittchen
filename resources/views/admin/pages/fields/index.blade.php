@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-xs-12">

            @include('admin.partials.flash-messages')

            <div class="panel panel-primary">
                <div class="panel-heading">Panel heading</div>

                <!-- Table -->
                <table id="datatable" class="table table-condensed table-bordered table-striped">
                    <thead>
                    <tr>
                        {{--                                <th>id</th>--}}
                        <th>Name</th>
                        <th>Placeholder</th>
                        <th>Type</th>
                        <th>Values</th>
                        {{--                                <th>Created_at</th>--}}
                        {{--                                <th>Updated_at</th>--}}
                        <th width="15%">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($fields as $field)
                        <tr>
                            <td>{{ $field->name }}</td>
                            <td>{{ $field->placeholder }}</td>
                            <td>{{ $field->type }}</td>
                            {{--                                        <td>{!! json_decode($field->value) or '' !!}</td>--}}
                            {{--                                        {{ dd(implode(', ', json_decode($field->value)) ) }}--}}
                            @if($field->type === 'select')
                                <td>{{ implode(', ', json_decode($field->value) ) ?? ''}}</td>
                            @else
                                <td></td>
                            @endif
                            <td style="text-align: center;">
                                <a href="{{ route('fields.edit', $field->id)}}" class="btn btn-primary btn-xs">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>

                                <a href="{{ route('fields.destroy', $field->id) }}"  class="btn btn-danger btn-xs">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <td>No fields</td>
                    @endforelse
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                    </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
@endsection

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

    <style>

        #datatable_wrapper {
            margin-top: 15px;
        }

        ul.nav.nav-tabs li:not(.active) a {
            background-color: #eeeeee;
            color: grey;
        }

        ul.nav.nav-tabs li.active a {
            border-top: 3px solid #16a765;
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