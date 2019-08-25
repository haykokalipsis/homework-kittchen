@extends('admin.layouts.main')

@section('content')
    {{--    {{dd($fields)}}--}}
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Table With Full Features</h3>
                                    @include('admin.partials.flash-messages')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                        <div class="panel with-nav-tabs panel-default">
                            <div class="panel-heading">
                                <ul class="nav nav-tabs nav-justified">
                                    <li class="active">
                                        <a href="#details" data-toggle="tab"><i class="fa fa-user"></i>&nbsp;Details</a>
                                    </li>

                                    <li>
                                        <a href="#password" data-toggle="tab"><i class="fa fa-lock"></i>&nbsp;Password</a>
                                    </li>

{{--                                    <li>--}}
{{--                                        <a href="#email" data-toggle="tab"><i class="fa fa-envelope"></i>Email</a>--}}
{{--                                    </li>--}}
                                </ul>
                            </div>

                            <div class="panel-body">
                                <div class="tab-content">
                                    <div id="details" class="tab-pane fade in active">
                                        <div class="col-md-7">
                                            <form role="form" action="{{ route('profile.update-data') }}"
                                                  enctype="multipart/form-data"
                                                  method="post">
                                                @csrf
                                                @method('put')

                                                <div class="form-group">
                                                    <label for="exampleInputTitleArmenian">Name</label>
                                                    <input type="text" name="name" class="form-control" id="exampleInputTitleArmenian" placeholder="Enter Name" value="{{ $user->name }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputTitleArmenian">Surname</label>
                                                    <input type="text" name="surname" class="form-control" id="exampleInputTitleArmenian" placeholder="Enter Surname" value="{{ $user->surname }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputTitleArmenian">Email</label>
                                                    <input type="email" name="email" class="form-control" id="exampleInputTitleArmenian" placeholder="Enter Email" value="{{ $user->email }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputTitleArmenian">Current Password</label>
                                                    <input type="password" name="password" class="form-control" id="exampleInputTitleArmenian" placeholder="Enter Current Password">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputFile">Image</label>
                                                    <input type="file" name="image" id="exampleInputFile">
                                                </div>

                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>


                                            </form>
                                        </div>

                                        <div class="col-md-4 col-md-offset-1">
                                            <img class="img-responsive img-circle" src="{{ $user->getImage() }}" style="width: 250px; height: 250px;">
                                        </div>
                                    </div>

                                    <div id="password" class="tab-pane fade">
                                        <div class="col-md-7">
                                            <form role="form" action="{{ route('profile.update-password') }}"
                                                  enctype="multipart/form-data"
                                                  method="post">
                                                @csrf
                                                @method('put')

                                                <div class="form-group">
                                                    <label for="exampleInputTitleArmenian">Current Password</label>
                                                    <input type="password" name="old_password" class="form-control" id="exampleInputTitleArmenian" placeholder="Enter Current Password">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputTitleArmenian">New Password</label>
                                                    <input type="password" name="password" class="form-control" id="exampleInputTitleArmenian" placeholder="Enter New Password">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputTitleArmenian">Confirm Password</label>
                                                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputTitleArmenian" placeholder="Confirm New Password">
                                                </div>

                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>


                                            </form>
                                        </div>

                                        <div class="col-md-4 col-md-offset-1">
                                            <img class="img-responsive img-circle" src="{{ $user->getImage() }}" style="width: 250px; height: 250px;">
                                        </div>
                                    </div>

                                    <div id="email" class="tab-pane fade">

                                    </div>

                                </div>
                            </div>
                        </div>


                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>

@endsection

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

    <style>

        #datatable_wrapper {
            margin-top: 15px;
        }

        .panel.with-nav-tabs .panel-heading{
            padding: 5px 5px 0 5px;
        }
        .panel.with-nav-tabs .nav-tabs{
            border-bottom: none;
        }
        .panel.with-nav-tabs .nav-justified{
            margin-bottom: -1px;
        }
        /********************************************************************/
        /*** PANEL DEFAULT ***/
        .with-nav-tabs.panel-default .nav-tabs > li > a,
        .with-nav-tabs.panel-default .nav-tabs > li > a:hover,
        .with-nav-tabs.panel-default .nav-tabs > li > a:focus {
            color: #777;
        }
        .with-nav-tabs.panel-default .nav-tabs > .open > a,
        .with-nav-tabs.panel-default .nav-tabs > .open > a:hover,
        .with-nav-tabs.panel-default .nav-tabs > .open > a:focus,
        .with-nav-tabs.panel-default .nav-tabs > li > a:hover,
        .with-nav-tabs.panel-default .nav-tabs > li > a:focus {
            color: #777;
            background-color: #ddd;
            border-color: transparent;
        }
        .with-nav-tabs.panel-default .nav-tabs > li.active > a,
        .with-nav-tabs.panel-default .nav-tabs > li.active > a:hover,
        .with-nav-tabs.panel-default .nav-tabs > li.active > a:focus {
            color: #555;
            background-color: #fff;
            border-color: #ddd;
            border-bottom-color: transparent;
        }
        .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu {
            background-color: #f5f5f5;
            border-color: #ddd;
        }
        .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a {
            color: #777;
        }
        .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
        .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
            background-color: #ddd;
        }
        .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a,
        .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
        .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
            color: #fff;
            background-color: #555;
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