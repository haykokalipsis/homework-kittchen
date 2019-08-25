@extends('admin.layouts.main')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">Edit Field {{ $field->title }}</h3>
                    @include('admin.partials.flash-messages')
                </div>

                <form id="myForm" role="form" action="{{ route('fields.update', $field->id) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('put')

                    <div class="box-body">

                        <div class="form-group row">
                            <label for="select" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                            <div class="col-md-6" id="selectField">
                                <select class="form-control" name="type" id="type-selector">
                                    <option value="text" {{$field->type === 'text' ? 'selected' : '' }}>Text</option>
                                    <option value="select" {{$field->type === 'select' ? 'selected' : '' }}>Select</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" id="titleBlock">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6" id="textField">
                                <input id="textValue"
                                       type="text"
                                       class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                       name="title"
                                       value="{{$field->title }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row" id="placeholderBlock">
                            <label for="placeholder" class="col-md-4 col-form-label text-md-right">{{ __('Placeholder') }}</label>

                            <div class="col-md-6">
                                <input id="placeholderField"
                                       type="text"
                                       class="form-control{{ $errors->has('placeholder') ? ' is-invalid' : '' }}"
                                       name="placeholder"
                                       value="{{$field->placeholder }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name"
                                       type="text"
                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       name="name"
                                       value="{{$field->name }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row" id="selectBlock">
                            <label for="select-values" class="col-md-4 col-form-label text-md-right">{{ __('Select values') }}</label>

                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <span id="result"></span>
                                    <table class="table table-bordered table-striped" id="user_table">
                                        <thead>
                                            <tr>
                                                <th width="35%">Title</th>
                                                <th width="30%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                    </div>

                    <div class="box-footer">
                        <input type="submit" id="btn" class="btn btn-primary" value="Submit">
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        #selectBlock {
            display: none;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function(){

            if ($('#type-selector').val() === 'select')
                $('#selectBlock').show();
            else
                $('#selectBlock').hide();

            var count = 1;

            // dynamic_field(count);

            function dynamic_field(number = 0)
            {
                html = '<tr>';
                html += '<td><input type="text" name="selectValues[]" class="form-control" /></td>';
                if(number > 1)
                {
                    html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                    $('tbody').append(html);
                }
                else
                {
                    html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                    $('tbody').html(html);
                }
            }

            $(document).on('click', '#add', function(){
                count++;
                dynamic_field(count);
            });

            $(document).on('click', '.remove', function(){
                count--;
                $(this).closest("tr").remove();
            });

            let textInput = `<input id="title" type="text"
                                       class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="textValue"
                                       value="{{$field->title }}" required autofocus>`;

            $(document).on('change', '#type-selector', function() {
                if($(this).val() === 'select') {
                    // $("#textField").empty();
                    $("#selectBlock").show();
                    // $("#textField").parent().hide();
                    $("#placeholderField").val('').attr('disabled', 'disabled');
                    dynamic_field();
                } else {
                    $("tbody").empty();
                    $("#selectBlock").hide();
                    $("#placeholderField").val('').attr('disabled', false);
                    // $("#textField").parent().show();
                    $("#textField").html(textInput);
                }
            });

        });
    </script>
@endpush