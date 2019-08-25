@extends('admin.layouts.main')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">New Field</h3>
                    @include('admin.partials.flash-messages')
                </div>

                <form id="myForm" role="form" action="{{ route('fields.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="box-body">

                        <div class="form-group row">
                            <label for="select" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                            <div class="col-md-6" id="selectField">
                                <select class="form-control" name="type" id="type-selector">
                                    <option value="text" {{ old('type') === 'text' ? 'selected' : '' }}>Text</option>
                                    <option value="select" {{ old('type') === 'select' ? 'selected' : '' }}>Select</option>
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
                                       value="{{ old('title') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row" id="placeholderBlock">
                            <label for="placeholder" class="col-md-4 col-form-label text-md-right">{{ __('Placeholder') }}</label>

                            <div class="col-md-6">
                                <input id="placeholderField"
                                       type="text"
                                       class="form-control{{ $errors->has('placeholder') ? ' is-invalid' : '' }}"
                                       name="placeholder"
                                       value="{{ old('placeholder') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name"
                                       type="text"
                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       name="name"
                                       value="{{ old('name') }}" required autofocus>
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
            let count = 1;
            let selectedType = $('#type-selector').val();
            let button, daField;

            switch (selectedType) {
                case 'select' :
                    $('#selectBlock').show();
                    break;

                case 'text' :
                    $('#selectBlock').hide();
                    break;
            }

            // dynamic_field(count);

            function dynamic_field(number = 0) {

                if(number > 1)
                    button = '<button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button>';
                else
                    button = '<button type="button" name="add" id="add" class="btn btn-success">Add</button>';

                daField = $('<tr>')
                                .append($('<td>')
                                    .append($("<input name='selectValues[]' class='form-control'>")))

                                .append($('<td>')
                                    .append(button));

                $('tbody').append(daField);
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
                                       value="{{ old('title') }}" required autofocus>`;

            $(document).on('change', '#type-selector', function() {
                count = 1;
                let fieldType = $(this).val();

                switch (fieldType) {
                    case 'select' :
                        $("#selectBlock").show();
                        $("#placeholderField").val('').attr('disabled', 'disabled');
                        dynamic_field();
                        break;

                    case 'text' :
                        $("tbody").empty();
                        $("#selectBlock").hide();
                        $("#placeholderField").val('').attr('disabled', false);
                        // $("#textField").parent().show();
                        $("#textField").html(textInput);
                        break;

                    default : alert('XZ');
                }

            });

        });
    </script>
@endpush